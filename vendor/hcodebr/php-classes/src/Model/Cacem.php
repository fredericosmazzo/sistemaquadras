<?php
namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;
use \Hcode\Mailer;
use \Hcode\PDF;
use Dompdf\Dompdf;
use \Hcode\PagePrint;
class Cacem extends Model {


	public static function listarTotalLigaçõesNumero(){

		$sql = new Sql;

		return $sql->select("SELECT `numOrigem`, COUNT(`idRegistro`) AS total FROM `cacem` GROUP BY `numOrigem` ORDER BY total DESC");
	}

	public static function listarTotalLigaçõesNumeroAtendida(){

		$sql = new Sql;

		return $sql->select("SELECT rl.numero, totalLigacoes, totalAtendido
								FROM (SELECT cacem.numOrigem AS numero,
								   COUNT(`idRegistro`) AS totalLigacoes
								   FROM cacem
								   GROUP BY cacem.numOrigem
								) rl
								INNER JOIN (SELECT cacem2.numOrigem AS numero,
								   COUNT(`idRegistro`) AS totalAtendido
								   FROM cacem2
								   WHERE cacem2.statusChamada LIKE 'OK'
								   GROUP BY cacem2.numOrigem
								) rf ON rf.numero = rl.numero
								GROUP BY rl.numero
								ORDER BY rl.totalLigacoes  DESC");
	}

	public static function listarTotalLigaçõesNumeroNaoAtendida(){
		$sql = new Sql();
		return $sql->select("SELECT
								`numOrigem` AS Numero,
								COUNT(`idRegistro`) AS TOTAL
								FROM `cacem`
								WHERE `numOrigem` NOT IN (SELECT `numOrigem` FROM `cacem` WHERE `statusChamada` LIKE 'OK' GROUP BY `numOrigem`)
								GROUP BY `numOrigem`
								ORDER BY TOTAL DESC");
	}// FECHAMANETO DO MÉTODO


	public static function listarDatas(){
		$sql = new Sql();
		return $sql->select("SELECT DATE(`dataChamada`) AS data, DATE_FORMAT(DATE(`dataChamada`),'%d/%m/%Y') AS Dia FROM `cacem` WHERE WEEKDAY(DATE(`dataChamada`)) not in(5,6)  GROUP BY DATE(`dataChamada`) ORDER BY DATE(`dataChamada`) ASC");

	}// FECHAMANETO DO MÉTODO

	public static function relatorioNaoAtendidas($data){
		$sql = new Sql();
		return $sql->select("SELECT `Numero`, DATE(`Dia`) AS data, DATE_FORMAT(DATE(`Dia`),'%d/%m/%Y') AS Day, DATE_FORMAT(`Dia`,'%H:%i:%s') AS Hora, `TOTAL` AS TOTAL, `SOMA` AS SOMA FROM `cacemNaoTotal` WHERE DATE(`Dia`)= :data ORDER BY `idRegistro` ASC", array(":data"=>$data));

	}// FECHAMANETO DO MÉTODO


	public static function periodoEstudo(){
		$sql = new Sql();
		return $sql->select("SELECT DATE_FORMAT(MAX(DATE(`dataChamada`)),'%d/%m/%Y') AS final, DATE_FORMAT(MIN(DATE(`dataChamada`)),'%d/%m/%Y') AS inicial FROM `cacem`");
	}// FECHAMANETO DO MÉTODO

	public static function totalNumerosNaoAtendidos(){

		$sql = new Sql;

		return $sql->select("SELECT COUNT(DISTINCT `numOrigem`) AS totalNumerosNaoAtendidos FROM `cacem` WHERE `numOrigem` NOT IN (SELECT `numOrigem` FROM `cacem` WHERE `statusChamada` LIKE 'OK' GROUP BY `numOrigem`)");
	}


	public static function totalNumerosAtendidos(){

		$sql = new Sql;

		return $sql->select("SELECT COUNT(DISTINCT `numOrigem`) AS totalNumerosAtendidos FROM `cacem` WHERE `statusChamada` LIKE 'OK' ");

	}

		public static function totalNumerosAtendidosData(){

		$sql = new Sql;

		return $sql->select("SELECT DATE_FORMAT(DATE(`dataChamada`),'%d/%m/%Y') AS dia, COUNT(DISTINCT `numOrigem`) AS total FROM `cacem` WHERE `statusChamada` LIKE 'OK' GROUP BY DATE(`dataChamada`) ");

	}

	public static function totalNumerosNaoAtendidosData(){

		$sql = new Sql;

		return $sql->select("SELECT DATE_FORMAT(DATE(`dataChamada`),'%d/%m/%Y') AS dia, COUNT(DISTINCT `numOrigem`) AS total FROM `cacem` WHERE `numOrigem` NOT IN (SELECT `numOrigem` FROM `cacem` WHERE `statusChamada` LIKE 'OK' GROUP BY `numOrigem`)  GROUP BY DATE(`dataChamada`)");

	}

	public static function totalLigacoesData(){

		$sql = new Sql;

		return $sql->select("SELECT DATE_FORMAT(DATE(`dataChamada`),'%d/%m/%Y') AS dia, COUNT(DISTINCT `idRegistro`) AS total FROM `cacem` GROUP BY DATE(`dataChamada`)");

	}


	public static function totalNumerosLigaram(){

		$sql = new Sql;

		return $sql->select("SELECT COUNT(DISTINCT `numOrigem`) AS totalNumerosLigaram FROM `cacem`");

	}

	public static function totalLigacoes(){

		$sql = new Sql;

		return $sql->select("SELECT COUNT(`numOrigem`) AS totalLigacoes FROM `cacem`");

	}

	public static function totalLigacoesNaoAtendidos(){

		$sql = new Sql;

		return $sql->select("SELECT COUNT(`numOrigem`) AS totalLigacoesNaoAtendidos FROM `cacem` WHERE `numOrigem` NOT IN (SELECT `numOrigem` FROM `cacem` WHERE `statusChamada` LIKE 'OK' GROUP BY `numOrigem`)");

	}

	public static function totalLigacoesAtendidos(){

		$sql = new Sql;

		return $sql->select("SELECT COUNT(`numOrigem`) AS totalLigacoesAtendidos FROM `cacem` WHERE `statusChamada` LIKE 'OK' ");

	}


}
?>

