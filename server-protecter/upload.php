<?php

require './composer/vendor/autoload.php';
require './lib/processImages.php';

session_start();

if(!$_SESSION['username']){
	header('Location: login.php');
}

$config_file = "../config/config.ini";
$ini_array = parse_ini_file($config_file);

$pdo = new PDO("sqlite:". $ini_array['sql_file']);
$fpdo = new FluentPDO($pdo);

$m = new Mustache_Engine(array(
	'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/./views/'),
)); 

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

	$allowed =  array('png' ,'jpg');

	$ext = pathinfo($_FILES['picture'], PATHINFO_EXTENSION);

	if($_FILES['file']['error']>0 || !in_array($ext,$allowed)){

		echo $m->render('upload',array('error'=>'上傳失敗！'));
	}


	$file_name = processImages($_FILES['picture']);

  	$value = array('name'=>$_POST["name"],'intro'=>$_POST["intro"],'picture'=>$file_name,'active'=>0);

	$query = $fpdo->insertInto('protecter', $value)->execute();	

	echo $m->render('upload',array('success'=>'上傳成功！'));

	header('Location: upload.php');

}

echo $m->render('upload',array());

?>