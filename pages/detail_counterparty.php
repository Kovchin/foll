<?php
include_once '../lib/DB/DB.php';

$mydb = new MyDBClass();

//Получаем имя текущего crq
$crq = $_GET['crq'];

//Получаем id_crq из fol_list
$mydb->set_query("SELECT * FROM `fol_list` WHERE `CRQ` = $crq");
$id_crq = $mydb->table[0]['id'];

//Получаем id инициатора из fol_working_process
$mydb->set_query("SELECT * FROM `fol_working_process` WHERE `id_crq` = $id_crq AND `flag` = 1");
$id_counterparty = $mydb->table[0]['id_counterparty'];

//Получаем Имя телефон и почту из fol_counterparty
$mydb->set_query("SELECT * FROM `fol_counterparty` WHERE `id` = $id_counterparty");
$curent_name_counterparty = $mydb->table[0]['name'];
$curent_phone_counterparty = $mydb->table[0]['phone'];
$curent_email_counterparty = $mydb->table[0]['email'];

?>

<a href="#">Добавить контрагента</a>

<table>
	<tr>
		<td>Инициатор работ</td>
		<td><?
					//Созадть список контрагентов и сделать активным текщего в данной ТК
					$mydb->set_query("SELECT * FROM `fol_counterparty` ORDER BY `name`");
					$test = $mydb->create_select_option('name', $curent_name_counterparty);
		?></td>
	</tr>
	<tr>
		<td>email</td>
		<td><?=$curent_email_counterparty?></td>
	</tr>
	<tr>
		<td>Телефон</td>
		<td><?=$curent_phone_counterparty?></td>
	</tr>
</table>