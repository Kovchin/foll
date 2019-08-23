<?php

include_once('./DB/DB.php');

$crq = $_GET['crq'];
$name = $_GET['name'];


$db = new MyDBClass();
$mysql = "INSERT INTO `fol_list` (`CRQ`, `name`) values('$crq', '$name')";
$db->query($mysql);

$db->set_query("SELECT * FROM `fol_list` WHERE `CRQ` = $crq");
$id_crq = $db->table[0]['id'];
//Добавляем дефолтовое значение инициатора работ (---)
$mysql = "INSERT INTO `fol_working_process` (`id_crq`, `id_counterparty`, `flag`) values($id_crq, 1, 1)";
$db->query($mysql);
//TODO Сюда добавляем остальные дефолтные значения

//Очищаем ссылку на БД
$db = NULL;

//Перенаправление на страницу detail.php с параметрами вновь добавленной заявки
header('Location: ../pages/detail.php?crq=' . $crq);
