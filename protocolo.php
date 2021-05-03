<?php
use \Hcode\Model\Protocolo;
use \Hcode\Model\User;
use \Hcode\PageAdmin;
use \Hcode\PagePrint;
use \Hcode\PageProtocolo;

//ROTAS LINKS USUARIOS

$app->get('/protocolo', function () {
	// PÁGINA INICIAL

	User::verifyLogin();
	$page = new Hcode\PageProtocolo();

	$page->setTpl("index");

});

$app->get('/admin/protocolo/inicio', function () {
	// PÁGINA INICIAL

	User::verifyLogin();

	$tiposDocumentos = Protocolo::listarTiposDocumento();
	$locaisDocumentos = Protocolo::listarLocaisDocumento();
	$listarDocumentos = Protocolo::listarDocumentos();
	$listarProtocolos = Protocolo::listarProtocolos();
	$protocolos = Protocolo::protocolosDocumento();

	$page = new Hcode\PageAdmin();

	$page->setTpl("clientes-inicio", array(

		"tiposDocumentos" => $tiposDocumentos,
		"locaisDocumentos" => $locaisDocumentos,
		"listarDocumentos" => $listarDocumentos,
		"listarProtocolos" => $listarProtocolos,
		"protocolos" => $protocolos,

	));

});

$app->get('/admin/protocolo/relatorio/:documento', function ($documento) {
	// PÁGINA INICIAL

	User::verifyLogin();

	$protocolosRelatorio = Protocolo::protocolosRelatorio($documento);

	$dadosDocumento = new Protocolo();
	$dadosDocumento->dadosDocumento1((int) $documento);

	$page = new Hcode\PageAdmin();

	$page->setTpl("protocolo-relatorio", array(

		"protocolosRelatorio" => $protocolosRelatorio,
		"dadosDocumento" => $dadosDocumento->getValues(),

	));

});

$app->get('/admin/protocolo/configuracoes', function () {
	// PÁGINA INICIAL listarTiposDocumento

	User::verifyLogin();
	$tiposDocumentos = Protocolo::listarTiposDocumento();
	$locaisDocumentos = Protocolo::listarLocaisDocumento();
	$page = new Hcode\PageAdmin();

	$page->setTpl("protocolo-configuracao", array(

		"tiposDocumentos" => $tiposDocumentos,
		"locaisDocumentos" => $locaisDocumentos,

	));

});

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
$app->get('/impressoes/recibo/:documento/:entrada', function ($documento, $entrada) {
	// TELA LOGIN

	$dadosDocumento = new Protocolo();
	$dadosDocumento->dadosDocumento($documento, $entrada);
	$page = new PagePrint();
	$page->setTpl("protocolo-unico", array("dadosDocumento" => $dadosDocumento->getValues()));

});

$app->get('/impressoes/relatorio/:documento', function ($documento) {
	// PÁGINA INICIAL

	User::verifyLogin();

	$protocolosRelatorio = Protocolo::protocolosRelatorio($documento);

	$dadosDocumento = new Protocolo();
	$dadosDocumento->dadosDocumento1((int) $documento);

	$page = new Hcode\PagePrint();

	$page->setTpl("protocolo-documento", array(

		"protocolosRelatorio" => $protocolosRelatorio,
		"dadosDocumento" => $dadosDocumento->getValues(),

	));

});

/////////////////////////////////////////////////////////////////////////////////////////////////////////
$app->post('/admin/protocolo/documento/novo', function () {
	// EXCLUIR CARGO

	User::verifyLogin();
	$documento = new Protocolo;
	$documento->setData($_POST);
	$documento->novoDocumento();
	header("Location: /admin/protocolo/inicio");
	exit;
});

$app->post('/admin/protocolo/documento/movimento', function () {
	// EXCLUIR CARGO

	User::verifyLogin();
	$documento = new Protocolo;
	$documento->setData($_POST);
	$documento->novoProtocolo();
	header("Location: /admin/protocolo/inicio");
	exit;
});

$app->post('/admin/protocolo/configuracoes/local', function () {
	// EXCLUIR CARGO

	User::verifyLogin();
	$local = new Protocolo;
	$local->setData($_POST);
	$local->novoLocal();
	header("Location: /admin/protocolo/configuracoes");
	exit;
});

$app->post('/admin/protocolo/configuracoes/doc', function () {
	// EXCLUIR CARGO

	User::verifyLogin();
	$doc = new Protocolo;
	$doc->setData($_POST);
	$doc->novoTipoDocumento();
	header("Location: /admin/protocolo/configuracoes");
	exit;
});

?>