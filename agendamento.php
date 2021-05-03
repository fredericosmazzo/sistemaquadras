<?php
use \Hcode\Model\Agendamentos;
use \Hcode\Model\User;
use \Hcode\PageAdmin;

//ROTAS LINKS USUARIOS

$app->get('/admin/agendamento/inicio', function () {
	// PÁGINA INICIAL

	User::verifyLogin();

	$page = new Hcode\PageAdmin();
	$clientes = Agendamentos::listarClientes();
	$page->setTpl("clientes-inicio", array("clientes" => $clientes));

});

$app->post('/admin/agendamento/cliente/novo', function () {
	// EXCLUIR CARGO

	User::verifyLogin();
	$cliente = new Agendamentos;
	$cliente->setData([
		'nome' => $_POST['nome'],
		'email' => $_POST['email'],
		'telefone' => $_POST['telefone'],
		'dataNascimento' => dateEmMysql($_POST['dataNascimento']),
		'cadastrante' => $_POST['cadastrante'],
	]);

	$cliente->novoCliente();
	header("Location: /admin/agendamento/inicio");
	exit;
});

/*
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
 */
?>