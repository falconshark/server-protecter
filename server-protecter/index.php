<?php

require './composer/vendor/autoload.php';

$config_file = "../config/config.ini";
$ini_array = parse_ini_file($config_file);

$pdo = new PDO("sqlite:". $ini_array['sql_file']);
$fpdo = new FluentPDO($pdo);

$query = $fpdo->from('protecter');
$protecter = $query->fetchAll();

$m = new Mustache_Engine(array(
	'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/./views/'),
));

echo $m->render('index', array('protecter'=>$protecter));

?>