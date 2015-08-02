<?php

require './composer/vendor/autoload.php';

session_start();

if(!$_SESSION['username']){
	header('Location: index.php');
}

$config_file = "../config/config.ini";
$ini_array = parse_ini_file($config_file);

$pdo = new PDO("sqlite:". $ini_array['sql_file']);
$fpdo = new FluentPDO($pdo);

$protecter_id = $_GET["id"];

$query = $fpdo->deleteFrom('protecter')->where('id', $protecter_id)->execute();

header('Location: delete.php');