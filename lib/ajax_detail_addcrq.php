<?php

include_once('./DB/DB.php');

$crq = $_GET['crq'];
$name = $_GET['name'];

$mysql = "INSERT INTO `fol_list` (`CRQ`, `name`) values('$crq', '$name')";

$db = new MyDBClass();
$db->query($mysql);
$db = NULL;

//Перенаправление на страницу detail.php с параметрами вновь добавленной заявки
header('Location: ../pages/detail.php?crq=' . $crq);
