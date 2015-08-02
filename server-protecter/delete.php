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

$m = new Mustache_Engine(array(
	'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/./views/'),
)); 

$query = $fpdo->from('protecter');
$protecter = $query->fetchAll();

echo $m->render('delete',array('protecter'=>$protecter));

?>