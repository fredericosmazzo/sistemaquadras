<?php
use \Hcode\PageAdmin;
use \Hcode\PagePrint;
use \Hcode\PDF;
use Dompdf\Dompdf;
use \Hcode\Model\User;
use \Hcode\Model\Cacem;

//ROTAS LINKS USUARIOS


$app->get('/admin/cacem/inicio', function() { // PÁGINA INICIAL

	User::verifyLogin();

	$listarTotalLigaçõesNumero = Cacem::listarTotalLigaçõesNumero();

	$listarTotalLigaçõesNumeroAtendida = Cacem::listarTotalLigaçõesNumeroAtendida();

	$listarTotalLigaçõesNumeroNaoAtendida = Cacem::listarTotalLigaçõesNumeroNaoAtendida();

	$totalNumerosLigaram = Cacem::totalNumerosLigaram();

	$totalNumerosNaoAtendidos = Cacem::totalNumerosNaoAtendidos();

	$totalNumerosAtendidos = Cacem::totalNumerosAtendidos();

	$totalNumerosAtendidosData = Cacem::totalNumerosAtendidosData();

	$totalNumerosNaoAtendidosData = Cacem::totalNumerosNaoAtendidosData();

	$totalLigacoes = Cacem::totalLigacoes();

	$totalLigacoesNaoAtendidos = Cacem::totalLigacoesNaoAtendidos();

	$totalLigacoesAtendidos = Cacem::totalLigacoesAtendidos();

	$periodoEstudo = Cacem::periodoEstudo();

	$totalLigacoesData = Cacem::totalLigacoesData();

	$page = new Hcode\PageAdmin();

	$page->setTpl("cacem-inicio", array(

			"listarTotalLigaçõesNumero"=>$listarTotalLigaçõesNumero,
			"listarTotalLigaçõesNumeroAtendida"=>$listarTotalLigaçõesNumeroAtendida,
			"listarTotalLigaçõesNumeroNaoAtendida"=>$listarTotalLigaçõesNumeroNaoAtendida,
			"totalNumerosNaoAtendidos"=>$totalNumerosNaoAtendidos,
			"totalNumerosAtendidos"=>$totalNumerosAtendidos,
			"totalNumerosAtendidosData"=>$totalNumerosAtendidosData,
			"totalNumerosNaoAtendidosData"=>$totalNumerosNaoAtendidosData,
			"totalNumerosLigaram"=>$totalNumerosLigaram,
			"totalLigacoes"=>$totalLigacoes,
			"totalLigacoesNaoAtendidos"=>$totalLigacoesNaoAtendidos,
			"totalLigacoesAtendidos"=>$totalLigacoesAtendidos,
			"periodoEstudo"=>$periodoEstudo,
			"totalLigacoesData"=>$totalLigacoesData


	));


});

$app->get('/admin/cacem/relatorios', function() { // PÁGINA INICIAL

	User::verifyLogin();

	$listarTotalLigaçõesNumero = Cacem::listarTotalLigaçõesNumero();

	$listarTotalLigaçõesNumeroAtendida = Cacem::listarTotalLigaçõesNumeroAtendida();

	$listarTotalLigaçõesNumeroNaoAtendida = Cacem::listarTotalLigaçõesNumeroNaoAtendida();

	$totalNumerosLigaram = Cacem::totalNumerosLigaram();

	$totalNumerosNaoAtendidos = Cacem::totalNumerosNaoAtendidos();

	$totalNumerosAtendidos = Cacem::totalNumerosAtendidos();

	$totalNumerosAtendidosData = Cacem::totalNumerosAtendidosData();

	$totalNumerosNaoAtendidosData = Cacem::totalNumerosNaoAtendidosData();

	$totalLigacoes = Cacem::totalLigacoes();

	$listarDatas = Cacem::listarDatas();

	$totalLigacoesNaoAtendidos = Cacem::totalLigacoesNaoAtendidos();

	$totalLigacoesAtendidos = Cacem::totalLigacoesAtendidos();

	$periodoEstudo = Cacem::periodoEstudo();

	$totalLigacoesData = Cacem::totalLigacoesData();

	$page = new Hcode\PageAdmin();

	$page->setTpl("cacem-relatorios", array(

			"listarTotalLigaçõesNumero"=>$listarTotalLigaçõesNumero,
			"listarTotalLigaçõesNumeroAtendida"=>$listarTotalLigaçõesNumeroAtendida,
			"listarTotalLigaçõesNumeroNaoAtendida"=>$listarTotalLigaçõesNumeroNaoAtendida,
			"totalNumerosNaoAtendidos"=>$totalNumerosNaoAtendidos,
			"totalNumerosAtendidos"=>$totalNumerosAtendidos,
			"totalNumerosAtendidosData"=>$totalNumerosAtendidosData,
			"totalNumerosNaoAtendidosData"=>$totalNumerosNaoAtendidosData,
			"totalNumerosLigaram"=>$totalNumerosLigaram,
			"totalLigacoes"=>$totalLigacoes,
			"listarDatas"=>$listarDatas,
			"totalLigacoesNaoAtendidos"=>$totalLigacoesNaoAtendidos,
			"totalLigacoesAtendidos"=>$totalLigacoesAtendidos,
			"periodoEstudo"=>$periodoEstudo,
			"totalLigacoesData"=>$totalLigacoesData


	));


});

$app->get('/impressoes/cacem/relatorio/dia/:data', function($data) { // TELA LOGIN

	$relatorioNaoAtendidas = Cacem::relatorioNaoAtendidas($data);
	$page = new PagePrint();
	$page->setTpl("relatorio-cacem-data", array("relatorioNaoAtendidas"=>$relatorioNaoAtendidas, "data"=>$data));

});
?>