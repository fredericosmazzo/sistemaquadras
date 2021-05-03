<?php
namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;

class Protocolo extends Model {

	public static function listarDocumentos() {

		$sql = new Sql;

		return $sql->select("SELECT
								documentos_protocolo.documento_id AS ID,
								documentos_protocolo.num_documento AS Documento,
								entrada_protocolo.entrada_id AS IDEntrada,
								tipo_doc_protocolo.tipodocumento AS Tipo,
								DATE_FORMAT(entrada_protocolo.data_entrada,'%d/%m/%Y') AS Entrada,
								DATE_FORMAT(entrada_protocolo.data_entrada,'%Y') AS Ano,
								locais_origem.origem AS Origem,
								locais_protocolo.destino AS Destino,
								documentos_protocolo.referencia AS Referencia
								FROM `documentos_protocolo`
								INNER JOIN entrada_protocolo ON documentos_protocolo.documento_id=entrada_protocolo.documento_id
								LEFT JOIN saida_protocolo ON entrada_protocolo.documento_id=saida_protocolo.documento_id
								INNER JOIN 	tipo_doc_protocolo ON documentos_protocolo.tipo_documento=tipo_doc_protocolo.idtipodocumento
								INNER JOIN locais_origem ON entrada_protocolo.local_origem=locais_origem.idorigem
								INNER JOIN locais_protocolo ON entrada_protocolo.local_destino=locais_protocolo.iddestino
								WHERE saida_protocolo.saida_id IS NULL
								ORDER BY documentos_protocolo.data_cadastro DESC");
	}

	public static function listarProtocolos() {

		$sql = new Sql;

		return $sql->select("SELECT
								documentos_protocolo.documento_id AS ID,
								entrada_protocolo.entrada_id AS IDEntrada,
								documentos_protocolo.num_documento AS Documento,
								tipo_doc_protocolo.tipodocumento AS Tipo,
								DATE_FORMAT(entrada_protocolo.data_entrada,'%d/%m/%Y') AS Entrada,
								DATE_FORMAT(entrada_protocolo.data_entrada,'%Y') AS Ano,
								locais_origem.origem AS Origem,
								DATE_FORMAT(saida_protocolo.data_saida,'%d/%m/%Y') AS Protocolo,
								locais_protocolo.destino AS Destino,
								documentos_protocolo.referencia AS Referencia
								FROM `documentos_protocolo`
								INNER JOIN entrada_protocolo ON documentos_protocolo.documento_id=entrada_protocolo.documento_id
								INNER JOIN saida_protocolo ON entrada_protocolo.documento_id=saida_protocolo.documento_id
								INNER JOIN 	tipo_doc_protocolo ON documentos_protocolo.tipo_documento=tipo_doc_protocolo.idtipodocumento
								INNER JOIN locais_origem ON entrada_protocolo.local_origem=locais_origem.idorigem
								INNER JOIN locais_protocolo ON saida_protocolo.local_destino=locais_protocolo.iddestino
                                WHERE saida_protocolo.id_entrada = entrada_protocolo.entrada_id
                                AND saida_protocolo.saida_status=1
								ORDER BY saida_protocolo.data_saida DESC");
	}

	public static function protocolosDocumento() {
		$sql = new Sql();
		return $sql->select("SELECT *,
									documentos_protocolo.documento_id AS id,
									documentos_protocolo.num_documento AS DOC,
									DATE_FORMAT(documentos_protocolo.data_cadastro,'%Y') AS Ano,
									DATE_FORMAT(documentos_protocolo.data_cadastro,'%d/%m/%Y') AS Entrada,
                                    DATE_FORMAT(entrada_protocolo.data_entrada,'%d/%m/%Y') AS Protocolo,
									tipo_doc_protocolo.tipodocumento AS Tipo,
									locais_origem.origem AS Origem,
                                    locais_protocolo.origem AS Destino,
									documentos_protocolo.referencia AS Referencia,
									entrada_protocolo.nota AS Nota
									FROM `documentos_protocolo`
									INNER JOIN 	tipo_doc_protocolo ON documentos_protocolo.tipo_documento=tipo_doc_protocolo.idtipodocumento
									INNER JOIN locais_origem ON documentos_protocolo.local_origem=locais_origem.idorigem
                                    INNER JOIN entrada_protocolo ON documentos_protocolo.documento_id=entrada_protocolo.documento_id
                                    INNER JOIN locais_protocolo ON entrada_protocolo.local_encaminhado=locais_protocolo.idorigem
                                    ORDER BY entrada_protocolo.documento_id");
	} // FECHAMANETO DO MÉTODO

	public static function protocolosRelatorio($documento) {
		$sql = new Sql();
		return $sql->select("SELECT
								entrada_protocolo.cadastrante AS Cadastrante,
								tipo_doc_protocolo.tipodocumento AS Tipo,
								documentos_protocolo.documento_id As ID,
								entrada_protocolo.entrada_id AS IDEntrada,
								documentos_protocolo.num_documento As Documento,
								DATE_FORMAT(entrada_protocolo.data_entrada,'%Y') AS Ano,
								DATE_FORMAT(entrada_protocolo.data_entrada,'%d/%m/%Y') AS Entrada,
								locais_origem.origem AS Origem,
								DATE_FORMAT(saida_protocolo.data_saida,'%d/%m/%Y') AS Saida,
								documentos_protocolo.referencia AS Referencia,
								locais_protocolo.destino AS Destino
								FROM `documentos_protocolo`
								INNER JOIN entrada_protocolo ON documentos_protocolo.documento_id=entrada_protocolo.documento_id
								INNER JOIN saida_protocolo ON entrada_protocolo.documento_id=saida_protocolo.documento_id
								INNER JOIN 	tipo_doc_protocolo ON documentos_protocolo.tipo_documento=tipo_doc_protocolo.idtipodocumento
								INNER JOIN locais_origem ON entrada_protocolo.local_origem=locais_origem.idorigem
								INNER JOIN locais_protocolo ON saida_protocolo.local_destino=locais_protocolo.iddestino
								WHERE entrada_protocolo.documento_id = :documento
								AND entrada_protocolo.entrada_id=saida_protocolo.id_entrada
								GROUP BY saida_protocolo.id_entrada
								ORDER BY entrada_protocolo.entrada_id ASC", array(":documento" => $documento));
	} // FECHAMANETO DO MÉTODO

	public function dadosDocumento($documento, $entrada) {

		$sql = new Sql;

		$results = $sql->select("SELECT
								entrada_protocolo.cadastrante AS Cadastrante,
								CAST(AES_DECRYPT(`nome`,'procon1234') AS char(255)) AS Funcionario,
                                entrada_protocolo.entrada_id AS IDEntrada,
								tipo_doc_protocolo.tipodocumento AS Tipo,
								documentos_protocolo.num_documento AS Documento,
								DATE_FORMAT(documentos_protocolo.data_cadastro,'%Y') AS Ano,
								DATE_FORMAT(entrada_protocolo.data_entrada,'%d/%m/%Y') AS Entrada,
								DATE_FORMAT(entrada_protocolo.data_entrada,'%H:%i') AS Hora,
								locais_origem.origem AS Origem,
								locais_protocolo.destino AS Destino
								FROM `entrada_protocolo`
								INNER JOIN documentos_protocolo ON entrada_protocolo.documento_id = documentos_protocolo.documento_id
								INNER JOIN tipo_doc_protocolo ON documentos_protocolo.tipo_documento=tipo_doc_protocolo.idtipodocumento
								INNER JOIN locais_origem ON entrada_protocolo.local_origem=locais_origem.idorigem
								INNER JOIN locais_protocolo ON entrada_protocolo.local_destino=locais_protocolo.iddestino
								INNER JOIN usuarios ON entrada_protocolo.cadastrante=usuarios.idusuario
								WHERE entrada_protocolo.documento_id = :documento AND entrada_protocolo.entrada_id = :entrada

								", array(":documento" => $documento, ":entrada" => $entrada));

		$this->setData(filter_var_array($results[0], FILTER_SANITIZE_STRING));

	} // FECHAMANETO DO MÉTODO

	public function dadosDocumento1($documento) {

		$sql = new Sql;

		$results = $sql->select("SELECT
								entrada_protocolo.cadastrante AS Cadastrante,
								CAST(AES_DECRYPT(`nome`,'procon1234') AS char(255)) AS Funcionario,
                                entrada_protocolo.entrada_id AS IDEntrada,
								documentos_protocolo.documento_id As ID,
								tipo_doc_protocolo.tipodocumento AS Tipo,
								documentos_protocolo.num_documento AS Documento,
								DATE_FORMAT(documentos_protocolo.data_cadastro,'%Y') AS Ano,
								DATE_FORMAT(entrada_protocolo.data_entrada,'%d/%m/%Y') AS Entrada,
								DATE_FORMAT(entrada_protocolo.data_entrada,'%H:%i') AS Hora,
								locais_origem.origem AS Origem,
								locais_protocolo.destino AS Destino
								FROM `entrada_protocolo`
								INNER JOIN documentos_protocolo ON entrada_protocolo.documento_id = documentos_protocolo.documento_id
								INNER JOIN tipo_doc_protocolo ON documentos_protocolo.tipo_documento=tipo_doc_protocolo.idtipodocumento
								INNER JOIN locais_origem ON entrada_protocolo.local_origem=locais_origem.idorigem
								INNER JOIN locais_protocolo ON entrada_protocolo.local_destino=locais_protocolo.iddestino
								INNER JOIN usuarios ON entrada_protocolo.cadastrante=usuarios.idusuario
								WHERE entrada_protocolo.documento_id = :documento
								ORDER BY `entrada_id` ASC
								LIMIT 1", array(":documento" => $documento));

		$this->setData(filter_var_array($results[0], FILTER_SANITIZE_STRING));

	} // FECHAMANETO DO MÉTODO

	public static function listarTiposDocumento() {

		$sql = new Sql;

		return $sql->select("SELECT * FROM `tipo_doc_protocolo` ORDER BY `tipodocumento` ASC");
	}

	public static function listarLocaisDocumento() {

		$sql = new Sql;

		return $sql->select("SELECT * FROM `locais_protocolo` ORDER BY `destino` ASC");
	}

	public function novoDocumento() {

		$sql = new Sql();
		$results = $sql->select("CALL sp_protocolo_entrada(:tipo_documento, :num_documento, :local_origem, :referencia, :cadastrante)", array(
			"tipo_documento" => $this->gettipo_documento(),
			"num_documento" => $this->getnum_documento(),
			"local_origem" => $this->getlocal_origem(),
			"referencia" => $this->getreferencia(),
			"cadastrante" => $this->getcadastrante(),
		));

	} // FECHAMANETO DO MÉTODO

	public function novoProtocolo() {

		$sql = new Sql();
		$results = $sql->select("CALL sp_protocolo_saida(:documento_id, :local_destino, :saida_nota, :cadastrante, :id_entrada)", array(
			"documento_id" => $this->getdocumento_id(),
			"local_destino" => $this->getlocal_destino(),
			"saida_nota" => $this->getsaida_nota(),
			"cadastrante" => $this->getcadastrante(),
			"id_entrada" => $this->getid_entrada(),

		));

	} // FECHAMANETO DO MÉTODO

	public function novoLocal() {

		$sql = new Sql();
		$results = $sql->select("CALL sp_novo_local_protocolo(:origem)", array(
			"origem" => $this->getorigem(),
		));

	} // FECHAMANETO DO MÉTODO

	public function novoTipoDocumento() {

		$sql = new Sql();
		$results = $sql->select("CALL sp_novo_documento_protocolo(:tipodocumento)", array(
			"tipodocumento" => $this->gettipodocumento(),
		));

	} // FECHAMANETO DO MÉTODO

}
?>

