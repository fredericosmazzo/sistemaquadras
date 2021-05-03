<?php
use \Hcode\PageAdmin;
use \Hcode\PagePrint;
use \Hcode\PDF;
use Dompdf\Dompdf;
use \Hcode\Model\User;
use \Hcode\Model\Protocolo;
use \Hcode\Model\Beneficio;

//ROTAS LINKS USUARIOS


$app->get('/admin/beneficio/inicio', function() { // PÁGINA INICIAL

	User::verifyLogin();

	$listarCadastrados = Beneficio::listarCadastrados();
	$listarInelegiveis = Beneficio::listarInelegiveis();


	$page = new Hcode\PageAdmin();

	$page->setTpl("beneficio-inicio", array(

			"listarCadastrados"=>$listarCadastrados,
			"listarInelegiveis"=>$listarInelegiveis

	));


});


$app->get('/admin/beneficio/relatorios', function() { // PÁGINA INICIAL

	User::verifyLogin();

	$dadosBairro = Beneficio::dadosBairro();


	$page = new Hcode\PageAdmin();

	$page->setTpl("beneficio-relatorios", array(

			"dadosBairro"=>$dadosBairro
	));


});



$app->get('/admin/protocolo/configuracoes', function() { // PÁGINA INICIAL listarTiposDocumento

	User::verifyLogin();
	$tiposDocumentos = Protocolo::listarTiposDocumento();
	$locaisDocumentos = Protocolo::listarLocaisDocumento();
	$page = new Hcode\PageAdmin();

	$page->setTpl("protocolo-configuracao", array(

			"tiposDocumentos"=>$tiposDocumentos,
			"locaisDocumentos"=>$locaisDocumentos

	));

});

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
$app->get('/impressoes/recibo/:documento/:entrada', function($documento, $entrada) { // TELA LOGIN

	$dadosDocumento = new Protocolo();
	$dadosDocumento->dadosDocumento ($documento, $entrada);
	$page = new PagePrint();
	$page->setTpl("protocolo-unico", array("dadosDocumento"=>$dadosDocumento->getValues()));

});


$app->get('/impressoes/relatorio/:documento', function($documento) { // PÁGINA INICIAL

	User::verifyLogin();

	$protocolosRelatorio = Protocolo::protocolosRelatorio($documento);

	$dadosDocumento = new Protocolo();
	$dadosDocumento->dadosDocumento1  ((int)$documento);

	$page = new Hcode\PagePrint();

	$page->setTpl("protocolo-documento", array(

			"protocolosRelatorio"=>$protocolosRelatorio,
			"dadosDocumento"=>$dadosDocumento->getValues()

	));

});

/////////////////////////////////////////////////////////////////////////////////////////////////////////
$app->post('/admin/protocolo/documento/novo', function() { // EXCLUIR CARGO

	User::verifyLogin();
	$documento = new Protocolo;
	$documento->setData($_POST);
	$documento->novoDocumento();
	header("Location: /admin/protocolo/inicio");
	exit;
});

$app->post('/admin/protocolo/documento/movimento', function() { // EXCLUIR CARGO

	User::verifyLogin();
	$documento = new Protocolo;
	$documento->setData($_POST);
	$documento->novoProtocolo();
	header("Location: /admin/protocolo/inicio");
	exit;
});

?>