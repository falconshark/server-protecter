<?php

require './composer/vendor/autoload.php';

$config_file = "../config/config.ini";
$ini_array = parse_ini_file($config_file);

$pdo = new PDO("sqlite:". $ini_array['sql_file']);
$fpdo = new FluentPDO($pdo);

$protecter_id = $_GET["id"];

$set = array('active' => 1);

$query = $fpdo->update('protecter', $set, $protecter_id)->execute();

header("Location: index.php");

?>