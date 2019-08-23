<?php
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])) {
	include_once('../lib/DB/DB.php');
	$db = new MyDBClass();
	//Проверка наличия контрагента с таким же именем. 
	$sql = 'SELECT * FROM `fol_counterparty` WHERE `name` = "' . $_POST['name'] . '"';
	$db->set_query($sql);
	if (count($db->table) == 1) {
		echo '<p class="error">Контрагент с таким именем уже существует!</p>';
		$db = NULL;
	}
	else{
		$sql = 'INSERT INTO `fol_counterparty` (`name`, `email`, `phone`) values("'.$_POST['name'].'", "'.$_POST['email'].'", "'.$_POST['phone'].'")';
		$db->query($sql);
		$db = NULL;
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="../css/main.css">
	<title>Контрагенты</title>
</head>

<body>
	<a href="../index.php">К списку ТК</a>
	<table>
		<tr>
			<th>Имя</th>
			<th>Телефон</th>
			<th>email</th>
		</tr>
		<?php include_once('./table_for_counterparty.php') ?>
	</table>
	<form action="#" method="post">
		<table>
			<tr>
				<td><input name="name" required type="text"></td>
				<td><input name="phone" required type="text"></td>
				<td><input name="email" required type="text"></td>
			</tr>
		</table>
		<input type="submit" value="Добавить контрагента">
	</form>
</body>

</html>