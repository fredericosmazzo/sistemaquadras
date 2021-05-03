<?php
session_start();
require_once "vendor/autoload.php";
use \Slim\Slim;

$app = new Slim();
$app->config('debug', true);

require_once "functions.php";
require_once "site.php";
require_once "users.php";
require_once "protocolo.php";
require_once "agendamento.php";
require_once "beneficio.php";
require_once "cacem.php";
$app->run();

?>