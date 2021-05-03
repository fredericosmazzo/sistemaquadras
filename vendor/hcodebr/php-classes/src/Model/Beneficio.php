<?php
namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\DB\Sql2;
use \Hcode\Model;
use \Hcode\Mailer;

class Beneficio extends Model {

	public static function listarCadastrados(){

		$sql = new Sql;

		return $sql->select("SELECT
								FiltroCadUnicoBeneficio.CodigoFamiliar AS CodFamiliar,
								FiltroCadUnicoBeneficio.NIS AS NIS,
								FiltroCadUnicoBeneficio.Nome AS Nome,
								FiltroCadUnicoBeneficio.CPF AS CPF,
								FiltroCadUnicoBeneficio.RendaPerCapita AS RendaPercapita,
								DATE_FORMAT(FiltroCadUnicoBeneficio.DataNascimento,'%d/%m/%Y') AS Nascimento,
								FLOOR((PERIOD_DIFF(DATE_FORMAT(now(),'%Y%m'),DATE_FORMAT(FiltroCadUnicoBeneficio.DataNascimento,'%Y%m')))/12) AS IDADE,
								FiltroCadUnicoBeneficio.Bairro AS Bairro
								FROM `FiltroCadUnicoBeneficio`
								ORDER BY Nome ASC");
	}

	public static function listarFamiliares(){

		$sql = new Sql;

		return $sql->select("SELECT
								CAST(AES_DECRYPT(`nis`,'semas2021') AS char(255)) AS NIS,
								CAST(AES_DECRYPT(`nome`,'semas2021') AS char(255)) AS NOME,
								CAST(AES_DECRYPT(`cpf`,'semas2021') AS char(255)) AS CPF,
								CAST(AES_DECRYPT(`email`,'semas2021') AS char(255)) AS EMAIL,
								CAST(AES_DECRYPT(`telefone`,'semas2021') AS char(255)) AS TELEFONE,
								DATE_FORMAT(`cadastro`,'%d/%m/%Y') AS Dia,
								DATE_FORMAT(`cadastro`,'%H:%i') AS Hora,
								`cep`,
								`endereco`,
								`bairro`,
								`cidade`,
								`pessoas`,
								`renda`,
								`termo`
								FROM `beneficio_municipal`
								ORDER BY NOME ASC");
	}


	public function dadosBeneficiario($documento){

		$sql = new Sql;

		$results = $sql->select("SELECT
								CAST(AES_DECRYPT(`nis`,'semas2021') AS char(255)) AS NIS,
								CAST(AES_DECRYPT(`nome`,'semas2021') AS char(255)) AS NOME,
								CAST(AES_DECRYPT(`cpf`,'semas2021') AS char(255)) AS CPF,
								CAST(AES_DECRYPT(`email`,'semas2021') AS char(255)) AS EMAIL,
								CAST(AES_DECRYPT(`telefone`,'semas2021') AS char(255)) AS TELEFONE,
								DATE_FORMAT(`cadastro`,'%d/%m/%Y') AS Dia,
								DATE_FORMAT(`cadastro`,'%H:%i') AS Hora,
								`cep`,
								`endereco`,
								`bairro`,
								`cidade`,
								`pessoas`,
								`renda`,
								`termo`
								FROM `beneficio_municipal`
                                WHERE CAST(AES_DECRYPT(`nis`,'semas2021') AS char(255)) = :documento
								", array(":documento"=>$documento));

							$this->setData(filter_var_array($results[0],FILTER_SANITIZE_STRING));
	}

	public static function listarInelegiveis(){

		$sql = new Sql;

		return $sql->select("SELECT *, DATE_FORMAT(`datacadastro`,'%d/%m/%Y') AS Dia, DATE_FORMAT(`datacadastro`,'%H:%i') AS Hora FROM `beneficio_negado` ORDER BY nome ASC");
	}


// NOVO CADASTRO

	public function incluirBeneficio(){

		$sql = new Sql();
		$results = $sql->select("CALL sp_cadastro_beneficio(:nis, :nome, :datanascimento, :cpf, :email, :telefone, :cep, :endereco, :numero, :complemento, :bairro, :termo)",
			array(
				":nis"=>$this->getnis(),
				":nome"=>$this->getnome(),
				":datanascimento"=>$this->getdatanascimento(),
				":cpf"=>$this->getcpf(),
				":email"=>$this->getemail(),
				":telefone"=>$this->gettelefone(),
				":cep"=>$this->getcep(),
				":endereco"=>$this->getendereco(),
				":numero"=>$this->getnumero(),
				":complemento"=>$this->getcomplemento(),
				":bairro"=>$this->getbairro(),
				":termo"=>$this->gettermo()
				));
		if (count($results) > 0) {
			$this->setData(filter_var_array($results[0],FILTER_SANITIZE_STRING));
		}

		}

	public function incluirFamiliar(){

		$sql = new Sql();
		$results = $sql->select("CALL sp_cadastro_familiar(:nis_beneficiario, :nome, :datanascimento, :cpf, :nis, :renda, :bolsafamilia, :bpc)",
			array(
				":nis_beneficiario"=>$this->getnis_beneficiario(),
				":nome"=>$this->getnome(),
				":datanascimento"=>$this->getdatanascimento(),
				":cpf"=>$this->getcpf(),
				":nis"=>$this->getnis(),
				":renda"=>$this->getrenda(),
				":bolsafamilia"=>$this->getbolsafamilia(),
				":bpc"=>$this->getbpc()
				));
		if (count($results) > 0) {
			$this->setData(filter_var_array($results[0],FILTER_SANITIZE_STRING));
		}

		}

	public static function dadosBairro(){

		$sql = new Sql;

		return $sql->select("SELECT `Bairro`, COUNT(`idRegistro`) AS Total FROM `FiltroCadUnicoBeneficio` GROUP BY `Bairro` ORDER BY `Total`  DESC LIMIT 60");
	}



}

/*
SELECT
CAST(AES_DECRYPT(`nis`,'semas2021') AS char(255)) AS NIS,
CAST(AES_DECRYPT(`nome`,'semas2021') AS char(255)) AS NOME,
CAST(AES_DECRYPT(`cpf`,'semas2021') AS char(255)) AS CPF,
CAST(AES_DECRYPT(`email`,'semas2021') AS char(255)) AS EMAIL,
CAST(AES_DECRYPT(`telefone`,'semas2021') AS char(255)) AS TELEFONE,
`cep`,
`endereco`,
`bairro`,
`cidade`,
`pessoas`,
`renda`,
`cadastro`,`termo`
FROM `beneficio_municipal`
 */
?>

