<?php
namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;

class User extends Model {

	const SESSION = "User";

	public static function login($login, $password) {

		$sql = new Sql();

		$results = $sql->select("	SELECT *,
									`idusuario` AS idusuario,
									CAST(AES_DECRYPT(`nome`,'procon1234') AS char(255)) AS nome,
								    `cargo`  AS cargo,
								    `setor` AS setor,
								    CAST(AES_DECRYPT(`usuario`,'procon1234') AS char(255)) AS usuario,
								    CAST(AES_DECRYPT(`senha`,'procon1234') AS char(255)) AS senha,
    								`grupo` AS grupo,
								    `status`  AS situacao
									FROM `usuarios`
									WHERE CAST(AES_DECRYPT(`usuario`,'procon1234') AS char(255)) = :LOGIN AND `status` = 1", array(
			":LOGIN" => $login,
		));

		if (count($results) === 0) {

			throw new \Exception("Usuário inexistente ou senha inválida");
		}

		$data = $results[0];

		if ($password === $data["senha"]) {
			$user = new User();
			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;

		} else {
			throw new \Exception("Usuário inexistente ou senha inválida");
		}

	}

	public static function verifyLogin($inadmin = true) {

		if
		(
			!isset($_SESSION[User::SESSION])
			||
			!$_SESSION[User::SESSION]
			||
			!(int) $_SESSION[User::SESSION]["idusuario"] > 0
			||
			(bool) $_SESSION[User::SESSION]["grupo"] !== $inadmin

		) {
			header("Location: /admin/login");
			exit;

		}

	}

	public static function getFromSession() {

		$user = new User();

		if (isset($_SESSION[User::SESSION]) && (int) $_SESSION[User::SESSION]['idusuario'] > 0) {

			$user->setData($_SESSION[User::SESSION]);

		}

		return $user;

	}

	public static function logout() {

		$_SESSION[User::SESSION] = NULL;

	}

	public static function listarUsuarios() {

		$sql = new Sql;

		return $sql->select("SELECT
									`idusuario` AS idusuario,
									CAST(AES_DECRYPT(`nome`,'procon1234') AS char(255)) AS nome,
    								DATE_FORMAT(datanascimento,'%d/%m') AS datanascimento,
    								CAST(AES_DECRYPT(`email`,'procon1234') AS char(255)) AS email,
    								CAST(AES_DECRYPT(`documento`,'procon1234') AS char(255))  AS documento,
								    CAST(AES_DECRYPT(`celular`,'procon1234') AS char(255))  AS celular,
								    `nomecargo` AS cargo,
								    `nomesetor` AS setor,
								    CAST(AES_DECRYPT(`usuario`,'procon1234') AS char(255)) AS usuario,
								    CAST(AES_DECRYPT(`senha`,'procon1234') AS char(255)) AS senha,
    								`nomegrupo` AS grupo,
    								`grupo` AS grupoid,
    								`cargo` AS cargoid,
    								`setor` AS setorid,
								    `status`  AS status,
								    `loginsga` AS loginsga,
								    `idsga`  AS idsga
									FROM `usuarios`
									INNER JOIN grupos ON usuarios.grupo=grupos.idgrupo
									INNER JOIN cargos ON usuarios.cargo=cargos.idcargo
									INNER JOIN setores ON usuarios.setor=setores.idsetor
									WHERE `status` = 1
									ORDER BY nome ASC");
	}

	public static function listarUsuariosExcluidos() {

		$sql = new Sql;

		return $sql->select("SELECT
									`idusuario` AS idusuario,
									CAST(AES_DECRYPT(`nome`,'procon1234') AS char(255)) AS nome,
    								DATE_FORMAT(datanascimento,'%d/%m') AS datanascimento,
    								CAST(AES_DECRYPT(`email`,'procon1234') AS char(255)) AS email,
    								CAST(AES_DECRYPT(`documento`,'procon1234') AS char(255))  AS documento,
								    CAST(AES_DECRYPT(`celular`,'procon1234') AS char(255))  AS celular,
								    `nomecargo` AS cargo,
								    `nomesetor` AS setor,
								    CAST(AES_DECRYPT(`usuario`,'procon1234') AS char(255)) AS usuario,
								    CAST(AES_DECRYPT(`senha`,'procon1234') AS char(255)) AS senha,
    								`nomegrupo` AS grupo,
    								`grupo` AS grupoid,
    								`cargo` AS cargoid,
    								`setor` AS setorid,
								    `status`  AS status,
								    `loginsga` AS loginsga,
								    `idsga`  AS idsga
									FROM `usuarios`
									LEFT JOIN grupos ON usuarios.grupo=grupos.idgrupo
									LEFT JOIN cargos ON usuarios.cargo=cargos.idcargo
									LEFT JOIN setores ON usuarios.setor=setores.idsetor
									WHERE `status` = 0
									ORDER BY nome ASC");
	}

	public static function listarGrupos() {

		$sql = new Sql;

		return $sql->select("SELECT * FROM `grupos` ORDER BY nomegrupo ASC");
	}

	public static function listarCargos() {

		$sql = new Sql;

		return $sql->select("SELECT * FROM `cargos` ORDER BY nomecargo ASC");
	}

	public static function listarSetores() {

		$sql = new Sql;

		return $sql->select("SELECT * FROM `setores` ORDER BY nomesetor ASC");
	}

// MÉTODO DE INSERÇÃO
	public function novoUsuario() {

		$sql = new Sql();
		$results = $sql->select("CALL sp_inserir_novo_usuario(:nome, :datanascimento, :email, :documento, :celular, :usuario, :senha, :status)", array(
			":nome" => $this->getnome(),
			":datanascimento" => $this->getdatanascimento(),
			":email" => $this->getemail(),
			":documento" => $this->getdocumento(),
			":celular" => $this->getcelular(),
			":usuario" => $this->getusuario(),
			":senha" => $this->getsenha(),
			":status" => $this->getstatus(),
		));

	} // FECHAMANETO DO MÉTODO

// MÉTODO DE INSERÇÃO
	public function novoGrupo() {

		$sql = new Sql();
		$results = $sql->select("CALL sp_novo_grupo(:nomegrupo)", array(
			":nomegrupo" => $this->getnomegrupo(),
		));
	} // FECHAMANETO DO MÉTODO

// MÉTODO DE INSERÇÃO
	public function excluirGrupo() {

		$sql = new Sql();
		$results = $sql->select("CALL sp_excluir_grupo(:idgrupo)", array(
			":idgrupo" => $this->getidgrupo(),
		));
	} // FECHAMANETO DO MÉTODO

// MÉTODO DE INSERÇÃO
	public function excluirCargo() {

		$sql = new Sql();
		$results = $sql->select("CALL sp_excluir_cargo(:idcargo)", array(
			":idcargo" => $this->getidcargo(),
		));
	} // FECHAMANETO DO MÉTODO

// MÉTODO DE INSERÇÃO
	public function novoCargo() {

		$sql = new Sql();
		$results = $sql->select("CALL sp_novo_cargo(:nomecargo)", array(
			":nomecargo" => $this->getnomecargo(),
		));
	} // FECHAMANETO DO MÉTODO

// MÉTODO DE INSERÇÃO
	public function novaPermissao() {

		$sql = new Sql();
		$results = $sql->select("CALL sp_nova_permissao(:idgrupo, :nomegrupo, :tabela)", array(
			":idgrupo" => $this->getidgrupo(),
			":nomegrupo" => $this->getnomegrupo(),
			":tabela" => $this->gettabela(),
		));
	} // FECHAMANETO DO MÉTODO

// MÉTODO DE INSERÇÃO
	public function excluirPermissao() {

		$sql = new Sql();
		$results = $sql->select("CALL sp_excluir_permissao(:idgrupo, :nomegrupo, :tabela)", array(
			":idgrupo" => $this->getidgrupo(),
			":nomegrupo" => $this->getnomegrupo(),
			":tabela" => $this->gettabela(),
		));
	} // FECHAMANETO DO MÉTODO

// MÉTODO GET
	public function get($iduser) {

		$sql = new Sql;

		$results = $sql->select("SELECT * FROM usuarios WHERE idusuario = :iduser", array(
			":iduser" => $iduser,
		));

		$this->setData($results[0]);

	} // FECHAMANETO DO MÉTODO

// MÉTODO DE ALTERAÇÃO
	public function updateUsuario() {

		$sql = new Sql();
		$results = $sql->select("CALL sp_alterar_usuario(:idusuario, :grupo, :cargo, :setor)", array(
			":idusuario" => $this->getidusuario(),
			":grupo" => $this->getgrupo(),
			":cargo" => $this->getcargo(),
			":setor" => $this->getsetor(),

		));
	} // FECHAMANETO DO MÉTODO

// MÉTODO DE ALTERAÇÃO
	public function updateStatusUsuario() {

		$sql = new Sql();
		$results = $sql->select("CALL sp_alterar_status(:idusuario, :status)", array(
			":idusuario" => $this->getidusuario(),
			":status" => $this->getstatus(),

		));
	} // FECHAMANETO DO MÉTODO

// MÉTODO DE ALTERAÇÃO
	public function update() {

		$sql = new Sql();
		$results = $sql->select("CALL sp_funcionarios_update(:func_id, :func_nascimento, :func_nome, :func_celular, :func_cargo, :func_rg, :func_senha, :func_loginsga, :func_grupo)", array(
			":func_id" => $this->getfunc_id(),
			":func_nascimento" => $this->getfunc_nascimento(),
			":func_nome" => $this->getfunc_nome(),
			":func_celular" => $this->getfunc_celular(),
			":func_cargo" => $this->getfunc_cargo(),
			":func_rg" => $this->getfunc_rg(),
			":func_senha" => $this->getfunc_senha(),
			":func_loginsga" => $this->getfunc_loginsga(),
			":func_grupo" => $this->getfunc_grupo(),

		));
	} // FECHAMANETO DO MÉTODO

// MÉTODO DE ALTERAÇÃO
	public function delete() {

		$sql = new Sql();

		$sql->query("CALL sp_funcionarios_delete(:func_id)", array(
			":func_id" => $this->getfunc_id(),
		));

	} // FECHAMANETO DO MÉTODO

}
?>