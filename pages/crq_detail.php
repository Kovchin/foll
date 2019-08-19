<?php

include_once '../lib/DB/DB.php';

//Формирует ниспадающий список и в качестве активного элемента выбирает текущий из незакрытых CRQ
$mydb = new MyDBClass();
$mydb->set_query("SELECT `CRQ` FROM `fol_list` WHERE `compleate` = ''");
$arr = $mydb->get_table_as_array('CRQ'); ?>
<table>
    <tr>
        <?php
        if (isset($_GET['crq'])) {
            echo '<td><label for="crq">CRQ</label></td>';
            echo '<td><select>';
            foreach ($arr as $key)
                if ($key == $_GET['crq'])
                    echo '<option selected = true>' . $key . '</option>';
                else
                    echo '<option>' . $key . '</option>';
            echo '</select></td>'; ?>
        <!-- Выдает название CRQ-->
    </tr>
    <tr>
        <?php
            //===============================================
            //==================TODO=========================
            //===============================================
            //$mydb->show_table_as_list();
            echo 'Имя: ' . $name;
            ?>
        <td><label for="name">Название работ</label></td>
        <td><textarea name="name"></textarea></td>
    </tr>
    <tr>
        <td><label for="data">Дата проведения работ</label></td>
        <td><input type="date" name="data"></td>
    </tr>
</table>
<!--//Выдает дату проведения работ-->


<? } else { ?>
<form action="" method="get">
    <table>
        <tr>
            <td><label for="crq">CRQ</label></td>
            <td><input type="text" name="crq"></td>
        </tr>
        <tr>
            <td>
                <p>Название работ</p>
            <td><textarea rows=3 cols=20></textarea></td>
        </tr>
    </table>
    <input type="submit" value="Звести ТК">
</form>
<?php } ?>