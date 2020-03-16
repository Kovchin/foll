<?php

include_once '../lib/DB/DB.php';
//текущий CRQ
$crq = $_GET['crq'];

$db = new MyDBClass();

$request = 'SELECT `CRQ` FROM `fol_list`';
$db->set_query($request);

//таблица всех crq
$all_crq = $db->table;

$request = 'SELECT `name`, `date_of_work` FROM `fol_list` WHERE `CRQ = '.$crq.'`';


