<?
include_once '.\lib\DB\DB.php';

$crq = new MyDBClass;

//В зависимости от _GET['sort'] выбирает фильтр в запросе к БД
if (isset($_GET['sort']))
	$request = 'SELECT `CRQ`, `name`, `compleate`, `agreed`, `date_of_work` FROM `fol_list` ORDER BY ' . $_GET['sort'];
else
	$request = 'SELECT `CRQ`, `name`, `compleate`, `agreed`, `date_of_work` FROM `fol_list` ORDER BY `CRQ`';

//Отдаем запрос к БД
$crq->set_query($request);

//вывод таблицы работ на ВОЛС
write_table($crq);

//Функция вывода таблицы работ на ВОЛС
function write_table($crq)
{
	// таблица всех работ на ВОЛС что будет выводиться на странице
	//var_dump($crq);

	foreach ($crq->table as $value) {
		//Достаем значения полей текущей записи и раскладываем их по переменным
		$CRQ = $value['CRQ'];
		$name = $value['name'];
		if ($value['compleate'] == 1) $compleate = 'checked';
		else $compleate = '';
		if ($value['agreed'] == 1) $agreed = 'checked';
		else $agreed = '';
		$date_of_work = $value['date_of_work'];
		?>
		<!--Отрисовываем запись на основании вышеразложенных значений-->
		<tr>
			<td><?=$CRQ?></td>
			<td><a href="pages/detail.php?crq=<?=$CRQ?>"><?=$name?></a></td>
			<td><input type="checkbox" name="<?=$CRQ?>" <?=$compleate?> ></td>
			<td><input type="checkbox" name="<?=$agreed?>" disabled></td>
			<td><input type="date" name="<?=$CRQ?>" value ="<?=$date_of_work?>"></td>
		</tr>
		<?
	};
};
