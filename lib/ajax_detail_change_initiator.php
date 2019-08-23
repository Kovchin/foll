<?php

include_once('./DB/DB.php');

//Получение данных из запроса
$crq = $_REQUEST['crq'];
$initiator = $_REQUEST['initiator'];

$db = new MyDBClass();
//Запрос id_crq в fol_list
$db->set_query("SELECT * FROM `fol_list` WHERE `CRQ` = $crq");
$id_crq = $db->table[0]['id'];
//Запрос id_counterparty в fol_counterparty возвращаем id, телефон и email.
$db->set_query("SELECT * FROM `fol_counterparty` WHERE `name` = '$initiator'");
$id_counterparty = $db->table[0]['id'];
$email = $db->table[0]['email'];
$phone = $db->table[0]['phone'];
//Формируем запрос на изменение записи
$mysql = "UPDATE `fol_working_process` SET `id_counterparty` = $id_counterparty WHERE `flag` = 1 AND `id_crq` = $id_crq";
//Отправляем запрос в БД на исполнение
$db->query($mysql);
$db = NULL;
//Формирует массив ответа для AJAX запроса
$result = array(
	'email' => $email,
	'phone' => $phone,
);
//Преобразовав его в JSON формат отсылаем 
echo json_encode($result);
