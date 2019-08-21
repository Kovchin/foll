<?php

include_once '../lib/DB/DB.php';

$mydb = new MyDBClass();
$mydb->set_query("SELECT `CRQ` FROM `fol_list` WHERE `compleate` = '' ORDER BY `CRQ`");

if (isset($_GET['crq'])) { ?>
<table>
	<tr>
		<td><label for="crq" id="crq">CRQ</label></td>
		<td class="fol_list_crq"><?php $mydb->create_select_option('CRQ', $_GET['crq']) ?></td>
	</tr>
	<tr>
		<?php
			$mydb->set_query('SELECT * FROM `fol_list` WHERE `CRQ` =' . $_GET['crq']);
			$curent = $mydb->table;
			$name = $curent[0]['name'];
			$data = $curent[0]['date_of_work'];
			?>
		<td><label for="name">Название работ</label></td>
		<td><textarea name="name" rows=3 cols=60 class="fol_list_name"><?= $name ?></textarea></td>
	</tr>
	<tr>
		<td><label for="data">Дата проведения работ</label></td>
		<td><input type="date" class="fol_list_data" name="data" value=<?= $data ?>></td>
	</tr>
</table>
<?php } else { ?>

<form action="..\lib\ajax_detail_addcrq.php" method="get">
	<table>
		<tr>
			<td><label for="crq">CRQ</label></td>
			<td><input required type="text" name="crq"></td>
		</tr>
		<tr>
			<td>
				<p>Название работ</p>
			</td>
			<td><textarea required name="name" rows=3 cols=60></textarea></td>
		</tr>
	</table>
	<input type="submit" value="Звести ТК">
</form>
<?php } ?>