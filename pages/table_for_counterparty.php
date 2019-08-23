<?php
include_once('../lib/DB/DB.php');

$db = new MyDBClass();
$db->set_query("SELECT * FROM `fol_counterparty`");
foreach($db->table as $value){
	$name = $value['name'];
	$phone = $value['phone'];
	$email = $value['email'];?>
	<tr class = "fol_counterparty_<?=$value['id']?>">
	<td><input type="text" value = "<?=$name?>"></td>
	<td><input type="text" value = "<?=$phone?>"></td>
	<td><input type="text" value = "<?=$email?>"></td>
	</tr>
	<?php
}
$db = NULL;
