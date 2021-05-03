<?php
use \Hcode\Page;
use \Hcode\Model\Beneficio;

//ROTAS DO SITE

$app->get('/', function() { // INDEX SITE

	$page = new Page();

	$page->setTpl("index");

});

//ROTAS DO SITE

$app->get('/cadastro', function() { // INDEX SITE

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("consulta");

});

$app->get('/retorno', function() { // INDEX SITE
	$codigo = $_GET['codigo'];
	$nome = $_GET['nome'];
	$nis = $_GET['nis'];
	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);
	$page->setTpl("retorno", array(

			"codigo"=>$codigo,
			"nome"=>$nome,
			"nis"=>$nis

	));

});

$app->get('/composicao', function() { // PÁGINA INICIAL

	$nis = $_GET['nis'];
	$dadosBeneficiario = new Beneficio();
	$dadosBeneficiario->dadosBeneficiario($_GET['nis']);
	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("composicao", array(
			"nis"=>$nis,
			"dadosBeneficiario"=>$dadosBeneficiario->getValues()

	));

});


$app->post('/cadastro/consulta', function() { // EXCLUIR CARGO

	$beneficiario = new Beneficio;
	$beneficiario->setData([
		'nis'=>$_POST['nis'],
		'nome'=>$_POST['nome'],
		'datanascimento'=>dateEmMysql($_POST['datanascimento']),
		'cpf'=>$_POST['cpf'],
		'email'=>$_POST['email'],
		'telefone'=>$_POST['telefone'],
		'cep'=>$_POST['cep'],
		'endereco'=>$_POST['endereco'],
		'numero'=>$_POST['numero'],
		'complemento'=>$_POST['complemento'],
		'bairro'=>$_POST['bairro'],
		'termo'=>$_POST['termo']
	]);
	$beneficiario->incluirBeneficio();
	$return = ((array)$beneficiario);
	foreach ($return as $value) {
    $codigo =  $value['@retorno'];
    $nome =  $value['nome'];
    $nis =  $value['nis'];

    }
	header("Location: /retorno?codigo=$codigo&nome=$nome&nis=$nis");
	exit;
});


$app->post('/cadastro/novo', function() { // EXCLUIR CARGO

	$beneficio = new Beneficio;
	$beneficio->setData($_POST);
	$beneficio->incluirBeneficio();
	$return = ((array)$beneficio);
	foreach ($return as $value) {
    $codigo =  $value['@retorno'];
    $nome =  $value['nome'];
    $nis =  $value['nis'];

    }
	header("Location: /retorno?codigo=$codigo&nome=$nome&nis=$nis");
	exit;
});

$app->post('/cadastro/novo/familiar', function() { // EXCLUIR CARGO

	$familiar = new Beneficio;
	$familiar->setData($_POST);
	$familiar->incluirFamiliar();
	$return = ((array)$familiar);
	foreach ($return as $value) {
    $nis =  $value['nis_beneficiario'];
}
	header("Location: /composicao?nis=$nis");
	exit;
});

?>