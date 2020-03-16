
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">
    <title><?= $_GET['crq'] ?></title>
</head>

<body>

    <header>
        <p class='logo'>ОТС Сибири Droid</p>
    </header>

    <p>
        <a href="../index.php">К списку тех. карт</a>
    </p>

<?php
include_once '../lib/datat_for_detail.php';
?>

    <table>
        <tr>
            <td>CRQ</td>
            <td>
            <select>
                <?php
                //формируем список CRQ и устанавливаем активный тот что берем из $_GET['crq']
                foreach ($all_crq as $value) {
                    ?>
                        <option value=<?=$value["CRQ"]?> 
                            <?php
                                if ($value['CRQ'] == $crq)
                                echo 'selected = "true"';
                            ?>
                        >
                        <?=$value["CRQ"]?></option>
                <?};?>
            </select>
            </td>
        </tr>
        <tr>
            <td>Название работ</td>
            <td><textarea name="" id="" cols="50" rows="10"></textarea></td>
        </tr>
        <tr>
            <td>Дата проведения работ</td>
            <td><input type="date" name="" id=""></td>
        </tr>
    </table>
    <hr>
    <a href="./counterparty.php">Добавить контрагента</a>
    <table>
        <tr>
            <td>Инициатор работ</td>
            <td>
                <select>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3" selected="true">3</option>
            </select>
        </td>
        </tr>
        <tr>
            <td>email</td>
            <td>todo</td>
        </tr>
        <tr>
            <td>Телефон</td>
            <td>todo</td>
        </tr>
    </table>
    <hr>
    <h2>Согласование</h2>
    <table class="matching">
        <tr>
            <th>Этап согласования</th>
            <th>Дата согласования</th>
            <th>Отправлена на доработку</th>
            <th>Причина отправки на доработку</th>
        </tr>
        <tr>
            <td>todo</td>
            <td>todo</td>
            <td>todo</td>
            <td>todo</td>
        </tr>
        <tr>
            <td colspan="4"><select>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4" selected="true">4</option>
            </select></td>
        </tr>
    </table>
    <hr>
    <h2>Заявка</h2>
        <table>
            <tr>
                <td>todo</td>
                <td><input type="date"></td>
            </tr>
            <tr>
            <td colspan="2"><select>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4" selected="true">4</option>
            </select></td>
            </tr>
            <tr>
                <td>Заявка в АСУ РЭО</td>
                <td><input type="text"></td>
            </tr>
        </table>
    <hr>
    <h2>ToDo /PS</h2>
    <div class="cancelled">
	<table>
		<tr>
			<td>Отмена работ</td>
			<td><select name="" id="">
					<option value="1">Сменный 1</option>
					<option value="2">Сменный 2</option>
					<option value="3">Сменный 3</option>
					<option value="4">Сменный 4</option>
					<option value="5">Сменный 5</option>
					<option value="6">Подменный</option>
				</select></td>
			<td><select name="" id="">
					<option value="1">Контрагент 1</option>
					<option value="2">Контрагент 2</option>
				</select></td>
			<td><input type="date" name="" id=""></td>
			<td>
				<input type="text" placeholder="Причина" name="" id="">
			</td>
		</tr>
		<tr>
			<td>Информирование об отмене работ</td>
			<td colspan="2"><select name="" id="">
					<option value="1">Сменный 1</option>
					<option value="2">Сменный 2</option>
					<option value="3">Сменный 3</option>
					<option value="4">Сменный 4</option>
					<option value="5">Сменный 5</option>
					<option value="6">Подменный</option>
				</select></td>
			<td colspan="2"><input type="date" name="" id=""></td>
		</tr>
	</table>
</div>

<div class="no_cancelled">
	<label for="cancel">Отменить работы</label>
	<input type="checkbox" name="" id="cancel">
</div>

    <hr>

    <main>
        <a href="../index.php">К списку тех. карт</a>
        <!-- CRQ -->
        <?php include_once 'detail_crq.php'; ?>
        <hr>
        <?php if (isset($_GET['crq'])) { ?>
            <!-- Контрагенты -->
            <?php include_once 'detail_counterparty.php';
            ?>
            <hr>
            <!-- Ход согласования работ -->
            <?php include_once 'detail_tc.php'; ?>
            <hr>
            <!-- Отмена работ -->
            <?php include_once 'detail_ps.php'; ?>
        <?php } ?>
        <hr>
    </main>

    <footer>Все права защищены &copy; Ковчин П.В.</footer>
    <script src="../js/detail.js"></script>
    <script src="../js/ajax.js"></script>
</body>

</html>