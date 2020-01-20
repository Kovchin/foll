<?php
include_once '../lib/DB/DB.php';

$mydb = new MyDBClass();

//arr_counterparty - массив действующих контрагентов для формирования списка имен контрагентов в таблицах и списках
$mydb->set_query("SELECT * FROM `fol_counterparty` ORDER BY `name`");
$arr_counterparty = $mydb->get_true_table_as_array('id');


//$id_crq - id текущего crq для формирования запросов для заполнения таблиц (можно достать остальные параметры CRQ)
$mydb->set_query("SELECT * FROM `fol_list` WHERE `CRQ` = $crq");
$id_crq = $mydb->table[0]['id'];

//arr_detail_tc - массив для создание таблицы согласования работ
$mydb->set_query("SELECT * FROM `fol_working_process` WHERE `id_crq` = $id_crq AND `flag` = 2");
$arr_detail_tc = $mydb->table;


$mydb->set_query("SELECT * FROM `fol_working_process` WHERE `id_crq` = $id_crq AND `flag` = 3");
$arr_working = $mydb->table;

?>
<h2>Согласование</h2>
<table class="matching">

	<tr>
		<th>Этап согласования</th>
		<th>Дата согласования</th>
		<th>Отправлена на доработку</th>
		<th>Причина отправки на доработку</th>
	</tr>

	<!--Формирование таблицы согласования работ на основе $arr_detail_tc-->
	<? foreach ($arr_detail_tc as $key => $value) {
		echo '<tr>';
		//Имя согласованта
		echo '<td>' . ($arr_counterparty[$arr_detail_tc[$key]['id_counterparty']]['name']) . '</td>';
		//Дата согласования
		echo '<td> <input type="date" name="" id="" value = "' . ($arr_detail_tc[$key]['data']) . '"</td>';
		//Флаг "Отправлена на доработку"
		echo '<td><input type="checkbox" name="" id=""></td>';
		echo '<td><input type="text"></td>';
		echo '</tr>';
	} ?>

	<!--Добавление нового контрагента-->
	<td colspan="4">
		<?
		echo '<select>';
		foreach ($arr_counterparty as $value) {
			echo '<option>' . $value['name'] . '</option>';
		}
		echo '</select>';
		?>
	</td>

</table>

<hr>

<h2>Заявка</h2>

<table>
	<? foreach ($arr_working as $key => $value) {
		echo '<tr>';
		//Имя согласованта
		echo '<td>' . ($arr_counterparty[$arr_working[$key]['id_counterparty']]['name']) . '</td>';
		//Дата согласования
		echo '<td> <input type="date" name="" id="" value = "' . ($arr_working[$key]['data']) . '"</td>';
		echo '</tr>';
	} ?>


	<!--Добавление нового контрагента-->
	<td colspan="2">
		<?
		echo '<select>';
		foreach ($arr_counterparty as $value) {
			echo '<option>' . $value['name'] . '</option>';
		}
		echo '</select>';
		?>

		<tr>
			<td>Заявка в АСУ РЭО</td>
			<td><input type="text" name="" id=""></td>
		</tr>
</table>