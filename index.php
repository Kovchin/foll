<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="./css/main.css">
	<script src="js/ajax.js" defer></script>
	<script src="js/index.js" defer></script>
	<title>ВОЛС</title>
</head>

<body>
	<header>
		<p class='logo'>ОТС Сибири Droid</p>
	</header>
	<main>
		<h1>Согласование работ на ВОЛС</h1>
		<button><a href="pages\detail.php">Создать тех карту</a></button>
		<table>
			<tr>
				<th><a href="?sort=CRQ">№ CRQ</a></th>
				<th><a href="?sort=name">Наименование работы по ТК</a></th>
				<th><a href="?sort=agreed">Работы согласованы</a></th>
				<th><a href="?sort=compleate">Работы выполнены</a></th>
				<th><a href="?sort=date_of_work">Дата проведения работ</a></th>
			</tr>
			<?php
			include_once('pages/table_for_index.php')
			?>
		</table>
		<div class="ajax">

		</div>
	</main>
	<footer>Все права защищены &copy; Ковчин П.В.</footer>
</body>

</html>