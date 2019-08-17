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
	foreach ($crq->table as $value) {
		//Достаем значения полей текущей записи и раскладываем их по переменным
		$CRQ = $value['CRQ'];
		$name = $value['name'];
		if ($value['compleate'] == 1) $compleate = 'checked';
		else $compleate = '';
		if ($value['agreed'] == 1) $agreed = 'checked';
		else $agreed = '';
		$date_of_work = $value['date_of_work'];
		//Отрисовываем запись
		echo
			'<tr>
		<td>' . $CRQ . '</td>
		<td><a href="detail.php?crq=' . $CRQ . '">' . $name . '</a></td>
		<td><input type="checkbox" name="" id="" ' . $compleate . '></td>
		<td><input type="checkbox" name="" id="" ' . $agreed . ' disabled></td>
		<td><input type="date" value = "' . $date_of_work . '"></td>
	</tr>';
	};
};
