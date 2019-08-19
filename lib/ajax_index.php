<?php

include_once('DB/DB.php');

$crq = $_GET['crq'];
$pole = $_GET['pole'];
$value = $_GET['value'];

$mysql = 'UPDATE `fol_list` SET ' . $pole . ' = ' . $value . ' WHERE `crq` = ' . $crq;

$db = new MyDBClass();
$db->query($mysql);
$db = NULL;
echo 'Выполнен запрос: ';
echo $mysql;
