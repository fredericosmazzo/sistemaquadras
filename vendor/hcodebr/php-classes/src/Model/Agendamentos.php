<?php
namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;

class Agendamentos extends Model {

// FUNÇÕES DE CADASTRO
	public function novoCliente() {

		$sql = new Sql();
		$results = $sql->select("CALL sp_clientes_novo(:nome, :email, :telefone, :dataNascimento, :cadastrante)", array(
			"nome" => $this->getnome(),
			"email" => $this->getemail(),
			"telefone" => $this->gettelefone(),
			"dataNascimento" => $this->getdataNascimento(),
			"cadastrante" => $this->getcadastrante(),

		));

	} // FECHAMANETO DO MÉTODO

	public static function listarClientes() {

		$sql = new Sql;

		return $sql->select("SELECT `idCliente` AS idCliente, CAST(AES_DECRYPT(`nome`,'Aren@1027') AS char(255)) AS nome, DATE_FORMAT(dataNascimento,'%d/%m/%Y') AS dataNascimento, CAST(AES_DECRYPT(`email`,'Aren@1027') AS char(255)) AS email, CAST(AES_DECRYPT(`telefone`,'Aren@1027') AS char(255))  AS telefone FROM `clientesQuadra` ORDER BY nome ASC");
	}

}
?>

