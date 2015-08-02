<?php

require './composer/vendor/autoload.php';

$config_file = "../config/config.ini";
$ini_array = parse_ini_file($config_file);

$m = new Mustache_Engine(array(
	'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/./views/'),
));

if ($_SERVER['REQUEST_METHOD'] === 'POST' 
	&& $_POST["username"] == $ini_array['admin_username'] 
	&& $_POST["password"] == $ini_array['admin_password']) {
	
	session_start();
	$_SESSION['username'] = $_POST["username"];
	header('Location: upload.php');
	die();
}

echo $m->render('login', array());

?>