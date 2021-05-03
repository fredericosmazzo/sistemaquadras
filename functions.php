<?php
use \Hcode\Model\User;

function getAgenteID() {

	$agente = User::getFromSession();
	return $agente->getidusuario();
}

function getAgenteNome() {

	$agente = User::getFromSession();
	return $agente->getnome();
}

function getAgenteLogin() {

	$login = User::getFromSession();
	return $login->getusuario();
}

function getAgenteSetor() {

	$setor = User::getFromSession();
	return $setor->getsetor();
}

function getAgenteGrupo() {

	$grupo = User::getFromSession();
	return $grupo->getgrupo();
}

function getAgenteCargo() {

	$cargo = User::getFromSession();
	return $cargo->getcargo();
}

function grupoSistema($grupo) {

	switch ($grupo) {

	case 1:return "Gestão";
		break;
	case 2:return "Moderador";
		break;
	case 3:return "Fiscalização";
		break;
	case 4:return "Atendimento";
		break;
	case 5:return "Estagiário";
		break;
	case 6:return "Consultas";
		break;
	case 7:return "Fornecedor";
		break;
	case 8:return "Administrativo";
		break;
	}

}

function retornoEmergencial($retorno) {

	switch ($retorno) {

	case 1:return 'de acordo com os critérios de elegibilidade do Benefício Municipal você não atende aos requisitos necessários para receber o benefício';
		break;
	case 2:return "já realizou a consulta e não é elegível para receber o benefício";
		break;
	case 3:return "consta na lista de beneficiários contemplados com o benefício e na data de 01/05/2021 terá seu benefício disponibilizado";
		break;
	case 4:return 'já realizou a consulta e está contemplado. O benefício será disponibilizado em 01/05/2021.';
		break;

	}

}

function emergencialBOX($retorno) {

	switch ($retorno) {

	case 1:return '<div class="alert alert-danger alert-dismissible">';
		break;
	case 2:return '<div class="alert alert-warning alert-dismissible">';
		break;
	case 3:return '<div class="alert alert-success alert-dismissible">';
		break;
	case 4:return '<div class="alert alert-info alert-dismissible">';
		break;
	}

}

function generoAdolescente($sexo) {

	switch ($sexo) {

	case 1:return "Feminino";
		break;
	case 2:return "Masculino";
		break;
	}

}

function textoCadastro($codigo) {

	switch ($codigo) {

	case 1:return "1";
		break;
	case 2:return "1";
		break;
	case 3:return "2";
		break;
	case 4:return "2";
		break;
	}

}

function formatarMoeda($valor) {

	echo "R$ " . number_format($valor, 2, ",", ".");

}

function calculoPercapita($valor, $pessoas) {

	$percapita = ($valor / $pessoas);

	echo "R$ " . number_format($percapita, 2, ",", ".");

}

function formataDataBR($data) {

	return date('d/m/Y', strtotime($data));
}

function dateEmMysql($dateSql) {
	$ano = substr($dateSql, 6);
	$mes = substr($dateSql, 3, -5);
	$dia = substr($dateSql, 0, -8);
	return $ano . "-" . $mes . "-" . $dia;
}

function get_client_ip() {
	$ipaddress = '';
	if (isset($_SERVER['HTTP_CLIENT_IP'])) {
		$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	} else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
		$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	} else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
		$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	} else if (isset($_SERVER['HTTP_FORWARDED'])) {
		$ipaddress = $_SERVER['HTTP_FORWARDED'];
	} else if (isset($_SERVER['REMOTE_ADDR'])) {
		$ipaddress = $_SERVER['REMOTE_ADDR'];
	} else {
		$ipaddress = 'UNKNOWN';
	}

	return $ipaddress;
}

function mostraMes($mes) {
	switch ($mes) {
	case 1:return "Janeiro";
		break;case 2:return "Fevereiro";
		break;case 3:return "Março";
		break;case 4:return "Abril";
		break;case 5:return "Maio";
		break;case 6:return "Junho";
		break;case 7:return "Julho";
		break;case 8:return "Agosto";
		break;case 9:return "Setembro";
		break;case 10:return "Outubro";
		break;case 11:return "Novembro";
		break;case 12:return "Dezembro";
		break;}}

function today() {
	$today = date('d');
	$mes = mostraMes(date('m'));
	$ano = date('Y');

	return 'Ribeirão Preto, ' . $today . ' de ' . $mes . ' de ' . $ano;
}

function todayBanco($data) {
	$today = date('d', strtotime($data));
	$mes = mostraMes(date('m', strtotime($data)));
	$ano = date('Y', strtotime($data));

	return 'Ribeirão Preto, ' . $today . ' de ' . $mes . ' de ' . $ano;
}

function get_content($URL) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $URL);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

function formatPercent($percent) {

	if (!$percent > 0) {
		$percent = 0;
	}

	return number_format($percent, 2, ",", ".");

}

function calculoPorcentagem($valor1, $valor2) {

	$result = ($valor1 / $valor2) * 100;
	return formatPercent($result);

}
////////////////////////////////////////////////////////////////////////

function getConnection() {

	$dsn = 'mysql:host=localhost;dbname=semas';
	$username = 'semas';
	$password = 'semas2021';

	try {

		$pdo = new PDO($dsn, $username, $password);
		$pdo->exec("set names utf8");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $pdo;
	} catch (PDOException $ex) {

		echo 'Erro: ' . $ex->getMessage();
	}
}

function menu($grupo, $dado, $menu) {

	$conn = getConnection();
	$sql = "
    SELECT COUNT(`idpermisao`) AS controle FROM  $dado  WHERE `grupoidpermissao` = :grupo AND grupopermisao = :menu ";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":grupo", $grupo);
	$stmt->bindParam(":menu", $menu);
	$stmt->execute();
	$result = $stmt->fetchAll();
	foreach ($result as $value) {
		return $value['controle'];

	}
}

function tabelaGrupo($grupo) {

	$conn = getConnection();
	$sql = "SELECT LOWER(nomegrupo) AS tabela FROM `grupos` WHERE `idgrupo` = :grupo";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":grupo", $grupo);
	$stmt->execute();
	$result = $stmt->fetchAll();
	foreach ($result as $value) {
		return $value['tabela'];

	}
}

/*
function menuGestao($grupo){

$conn = getConnection();
$sql = "SELECT COUNT(`idpermisao`) AS controle FROM `permissao_gestao` WHERE `grupoidpermissao` = :grupo";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":grupo", $grupo);
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $value) {
return $value['controle'];

}
}

function menuAtendimento($grupo){

$conn = getConnection();
$sql = "SELECT COUNT(`idpermisao`) AS controle FROM `permissao_atendimento` WHERE `grupoidpermissao` = :grupo";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":grupo", $grupo);
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $value) {
return $value['controle'];

}
}

function menuFiscalizacao($grupo){

$conn = getConnection();
$sql = "SELECT COUNT(`idpermisao`) AS controle FROM `permissao_fiscalizacao` WHERE `grupoidpermissao` = :grupo";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":grupo", $grupo);
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $value) {
return $value['controle'];

}
}

function menuAdministrativo($grupo){

$conn = getConnection();
$sql = "SELECT COUNT(`idpermisao`) AS controle FROM `permissao_administrativo` WHERE `grupoidpermissao` = :grupo";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":grupo", $grupo);
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $value) {
return $value['controle'];

}
}

function menuAudiencia($grupo){

$conn = getConnection();
$sql = "SELECT COUNT(`idpermisao`) AS controle FROM `permissao_audiencia` WHERE `grupoidpermissao` = :grupo";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":grupo", $grupo);
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $value) {
return $value['controle'];

}
}

function menuCoordenacao($grupo){

$conn = getConnection();
$sql = "SELECT COUNT(`idpermisao`) AS controle FROM `permissao_coordenacao` WHERE `grupoidpermissao` = :grupo";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":grupo", $grupo);
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $value) {
return $value['controle'];

}
}
 */
function cadastrante($usuario) {

	$conn = getConnection();
	$sql = "SELECT CAST(AES_DECRYPT(`nome`,'procon1234') AS char(255)) AS nome FROM usuarios WHERE idusuario = :usuario";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":usuario", $usuario);
	$stmt->execute();
	$result = $stmt->fetchAll();
	foreach ($result as $value) {
		return $value['nome'];

	}
}

function rendaBairroTotal($usuario) {

	$conn = getConnection();
	$sql = "SELECT `RendaPerCapita`, COUNT(`RendaPerCapita`) AS Total FROM `FiltroCadUnicoBeneficio` WHERE Bairro = :usuario GROUP BY `RendaPerCapita` ORDER BY Total  DESC LIMIT 1";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":usuario", $usuario);
	$stmt->execute();
	$result = $stmt->fetchAll();
	foreach ($result as $value) {
		return $value['Total'];

	}
}

function valorBairro($usuario) {

	$conn = getConnection();
	$sql = "SELECT `RendaPerCapita`, COUNT(`RendaPerCapita`) AS Total FROM `FiltroCadUnicoBeneficio` WHERE Bairro = :usuario GROUP BY `RendaPerCapita` ORDER BY Total  DESC LIMIT 1";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":usuario", $usuario);
	$stmt->execute();
	$result = $stmt->fetchAll();
	foreach ($result as $value) {
		return $value['RendaPerCapita'];

	}
}

function telefonesNData($data) {

	$conn = getConnection();
	$sql = "SELECT COUNT(DISTINCT `numOrigem`) AS TOTAL FROM `cacem` WHERE `numOrigem` NOT IN (SELECT `numOrigem` FROM `cacem` WHERE `statusChamada` LIKE 'OK' GROUP BY `numOrigem`) AND DATE(`dataChamada`)= :data AND DATE_FORMAT(`dataChamada`,'%H:%i:%s') BETWEEN '07:30:00' AND '16:30:00' GROUP BY DATE(`dataChamada`) ORDER BY TOTAL  DESC";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":data", $data);
	$stmt->execute();
	$result = $stmt->fetchAll();
	foreach ($result as $value) {
		return $value['TOTAL'];

	}
}

function ligacoesNData($data) {

	$conn = getConnection();
	$sql = "SELECT COUNT(`idRegistro`) AS TOTAL FROM `cacem` WHERE `numOrigem` NOT IN (SELECT `numOrigem` FROM `cacem` WHERE `statusChamada` LIKE 'OK' GROUP BY `numOrigem`) AND DATE(`dataChamada`)= :data AND DATE_FORMAT(`dataChamada`,'%H:%i:%s') BETWEEN '07:30:00' AND '16:30:00' GROUP BY DATE(`dataChamada`) ORDER BY TOTAL  DESC";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":data", $data);
	$stmt->execute();
	$result = $stmt->fetchAll();
	foreach ($result as $value) {
		return $value['TOTAL'];

	}
}

function rendimentoBuscaAtiva($valor1, $valor2) {

	calculoPorcentagem($valor1, $valor2);
}

function registraCadu() {

	ini_set('max_execution_time', 0);

	$filename = "/var/www/html/views/admin/dados/cadu.csv";
	if (file_exists($filename)) {
		$filename = "/var/www/html/views/admin/dados/cadu.csv";
		$conn = getConnection();
		$sql = "TRUNCATE TABLE cacem;
            ALTER TABLE `cacem` DROP `idRegistro`;
            LOAD DATA INFILE :filename INTO TABLE cacem
            FIELDS TERMINATED BY ','
            LINES TERMINATED BY '\r\n'
            IGNORE 1 LINES;
            ALTER TABLE `cacem`  ADD `idRegistro` INT NOT NULL AUTO_INCREMENT  FIRST,  ADD   PRIMARY KEY  (`idRegistro`)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(":filename", $filename);
		if ($stmt->execute()) {
			echo "Carregado com Sucesso";
		} else {
			echo "Não consegui carregar o Arquivo";
		}
	} else {echo "Arquivo não existe!";}
}

function registraCacem() {

	ini_set('max_execution_time', 0);

	$filename = "/var/www/html/views/admin/dados/cadu.csv";
	if (file_exists($filename)) {
		$filename = "/var/www/html/views/admin/dados/cadu.csv";
		$conn = getConnection();
		$sql = "ALTER TABLE `cacem` DROP `idRegistro`;
            LOAD DATA INFILE :filename INTO TABLE cacem
            FIELDS TERMINATED BY ','
            LINES TERMINATED BY '\r\n'
            IGNORE 1 LINES;
            ALTER TABLE `cacem`  ADD `idRegistro` INT NOT NULL AUTO_INCREMENT  FIRST,  ADD   PRIMARY KEY  (`idRegistro`)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(":filename", $filename);
		if ($stmt->execute()) {
			echo "Carregado com Sucesso";
		} else {
			echo "Não consegui carregar o Arquivo";
		}
	} else {echo "Arquivo não existe!";}
}

function registraCacem2() {

	ini_set('max_execution_time', 0);

	$filename = "/var/www/html/views/admin/dados/cadu.csv";
	if (file_exists($filename)) {
		$filename = "/var/www/html/views/admin/dados/cadu.csv";
		$conn = getConnection();
		$sql = "ALTER TABLE `cacem2` DROP `idRegistro`;
            LOAD DATA INFILE :filename INTO TABLE cacem2
            FIELDS TERMINATED BY ','
            LINES TERMINATED BY '\r\n'
            IGNORE 1 LINES;
            ALTER TABLE `cacem2`  ADD `idRegistro` INT NOT NULL AUTO_INCREMENT  FIRST,  ADD   PRIMARY KEY  (`idRegistro`)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(":filename", $filename);
		if ($stmt->execute()) {
			echo "Carregado com Sucesso";
		} else {
			echo "Não consegui carregar o Arquivo";
		}
	} else {echo "Arquivo não existe!";}
}

function registraLocaisProtocolo() {

	ini_set('max_execution_time', 0);

	$filename = "/var/www/html/views/admin/dados/locais_protocolo.csv";
	if (file_exists($filename)) {
		$filename = "/var/www/html/views/admin/dados/locais_protocolo.csv";
		$conn = getConnection();
		$sql = "TRUNCATE TABLE locaisTeste;
            LOAD DATA INFILE :filename INTO TABLE locaisTeste
            FIELDS TERMINATED BY ','
            LINES TERMINATED BY '\r\n'
            IGNORE 1 LINES";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(":filename", $filename);
		if ($stmt->execute()) {
			echo "Carregado com Sucesso";
		} else {
			echo "Não consegui carregar o Arquivo";
		}
	} else {echo "Arquivo não existe!";}
}

function uploadCSV() {

	$file = $_FILES['fileUpload'];
	$path = $_POST['path'];
	$for = $_POST['controle_fap'];

	if ($file["error"]) {

		throw new Exception("Error: " . $file["error"]);
	}

	$diretorio = "views/respostasfap" . DIRECTORY_SEPARATOR . $path;

	if (!is_dir($diretorio)) {

		mkdir($diretorio);
	}

	$destino = $diretorio . DIRECTORY_SEPARATOR . $for . agora() . ".csv";
	$nome = $file['name'];
	$extensao = explode(".", $nome);
	$extensao = end($extensao);

	if ($extensao === "pdf") {

		if (move_uploaded_file($file['tmp_name'], $diretorio . DIRECTORY_SEPARATOR . $for . agora() . ".pdf")) {

		} else {

			throw new Exception("Não foi possível realizar o Upload do Arquivo!");
		}

	} else {
		echo "Extensão não Permitida. Use apenas PDF";
	}
}
?>



