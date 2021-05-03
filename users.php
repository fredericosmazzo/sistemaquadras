<?php
use \Hcode\PageAdmin;
use \Hcode\Model\User;

//ROTAS DE LOGIN

$app->get('/admin/login', function() { // TELA LOGIN

	$page = new PageAdmin([

		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login");

});

$app->post('/admin/login', function() { // LOGIN NO SISTEMA

	User::login($_POST['login'], $_POST['password']);

	header("Location: /admin");
	exit;

});

$app->get('/admin/logout', function() {

	User::logout();

	header("Location: /admin/login");
	exit;

});

//ROTAS LINKS USUARIOS

$app->get('/admin', function() { // PÁGINA INICIAL

	User::verifyLogin();

	$page = new Hcode\PageAdmin();

	$page->setTpl("index");

});


$app->get('/admin/administracao/usuarios', function() { // PÁGINA DE USUÁRIOS

	User::verifyLogin();

	$users = User::listarUsuarios();
	$usersExcluidos = User::listarUsuariosExcluidos();
	$usersGrupos = User::listarGrupos();
	$usersCargos = User::listarCargos();
	$usersSetores = User::listarSetores();

	$page = new Hcode\PageAdmin();

	$page->setTpl("usuarios", array(
			"users"=>$users,
			"usersExcluidos"=>$usersExcluidos,
			"usersGrupos"=>$usersGrupos,
			"usersCargos"=>$usersCargos,
			"usersSetores"=>$usersSetores

	));

});


$app->get('/admin/administracao/permissoes', function() { // PÁGINA PERMISSÕES

	User::verifyLogin();

	$users = User::listarUsuarios();
	$usersExcluidos = User::listarUsuariosExcluidos();
	$usersGrupos = User::listarGrupos();
	$usersCargos = User::listarCargos();
	$usersSetores = User::listarSetores();

	$page = new Hcode\PageAdmin();

	$page->setTpl("permissoes", array(
			"users"=>$users,
			"usersExcluidos"=>$usersExcluidos,
			"usersGrupos"=>$usersGrupos,
			"usersCargos"=>$usersCargos,
			"usersSetores"=>$usersSetores

	));

});

// ROTAS DAS FUNÇÕES DE USUÁRIOS

$app->post('/admin/administracao/usuarios/novo', function() { // CRIAR USUÁRIO

	$user = new User;
	$user->setData([
		'nome'=>$_POST['nome'],
		'datanascimento'=>dateEmMysql($_POST['datanascimento']),
		'email'=>$_POST['email'],
		'documento'=>$_POST['documento'],
		'celular'=>$_POST['celular'],
		'usuario'=>$_POST['usuario'],
		'senha'=>$_POST['senha'],
		'status'=>$_POST['status'],
	]);
	$user->novoUsuario();
	header("Location: /admin/login");
	exit;
});


$app->post('/admin/administracao/usuarios/permicoes/alterar', function() { // ALTERAR DADOS DO USUÁRIO

	User::verifyLogin();
	$user = new User;
	$user->setData($_POST);
	$user->updateUsuario();
	header("Location: /admin/administracao/usuarios");
	exit;
});

// ROTAS DAS FUNÇÕES GRUPOS, CARGOS E SETORES

$app->post('/admin/administracao/usuarios/grupos/novo', function() { //NOVO GRUPO

	User::verifyLogin();
	$user = new User;
	$user->setData($_POST);
	$user->novoGrupo();
	header("Location: /admin/administracao/permissoes");
	exit;
});

$app->post('/admin/administracao/usuarios/grupos/excluir', function() { //EXCLUIR GRUPO

	User::verifyLogin();
	$user = new User;
	$user->setData($_POST);
	$user->excluirGrupo();
	header("Location: /admin/administracao/permissoes");
	exit;
});

$app->post('/admin/administracao/usuarios/cargos/novo', function() { // NOVO CARGO

	User::verifyLogin();
	$user = new User;
	$user->setData($_POST);
	$user->novoCargo();
	header("Location: /admin/administracao/permissoes");
	exit;
});

$app->post('/admin/administracao/usuarios/cargos/excluir', function() { // EXCLUIR CARGO

	User::verifyLogin();
	$user = new User;
	$user->setData($_POST);
	$user->excluirCargo();
	header("Location: /admin/administracao/permissoes");
	exit;
});

// ROTAS DAS PERMISSÕES DE LOGIN E MENUS

$app->post('/admin/administracao/usuarios/permicoes/status', function() { // ALTERAR PERMISSÕES DE LOGIN

	User::verifyLogin();
	$user = new User;
	$user->setData($_POST);
	$user->updateStatusUsuario();
	header("Location: /admin/administracao/usuarios");
	exit;
});



$app->post('/admin/administracao/usuarios/permissoes/novo', function() { // INCLUIR PERMISSÃO A UM MENU

	User::verifyLogin();
	$user = new User;
	$user->setData($_POST);
	$user->novaPermissao();
	header("Location: /admin/administracao/permissoes");
	exit;
});

$app->post('/admin/administracao/usuarios/permissoes/excluir', function() { //EXCLUIR PERMISSÃO A UM MENU

	User::verifyLogin();
	$user = new User;
	$user->setData($_POST);
	$user->excluirPermissao();
	header("Location: /admin/administracao/permissoes");
	exit;
});


?>