<?php

//include_once('./DB/DB.php');

//echo ($_REQUEST);

$result = (array(
    'email' => $_REQUEST['data2'], //По какой то причине в этой глобальной переменной ничего нет, а должен быть 'mydata'
    'phone' => '$phone',
));

echo (json_encode($result));
