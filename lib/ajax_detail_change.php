<?php

include_once('./DB/DB.php');

//Получаем данные из запроса в JSON 
$postData = file_get_contents('php://input');
$data = json_decode($postData, true);

//Работа с полученными данными
$mydb = new MyDBClass();

//запрос на обновление информации в зависимости от типа поля
switch ($data['type']) {
    case 'checkbox':
        $cb = $data['value'];
        if ($cb) {
            $sql = "UPDATE fol_working_process SET revision = 'true' WHERE id = 50";
        } else
            $sql = "UPDATE fol_working_process SET revision = 'false' WHERE id = 50";
        break;
    case 'text':
        $sql = "UPDATE fol_working_process SET revisionComment = '" . $data['value'] . "' WHERE id = 50";
        break;
    case 'date':
        $sql = "UPDATE fol_working_process SET revisionComment = 'Проверка' WHERE id = 50";
        break;
}

//Отсылаем сформированную строку запроса
$mydb->query($sql);


//Формируем ответ от сервера в формате json
$result = (array(
    'inputData' => $data,
    'calcData' => '$phone',
    'operation' => $sql
));


/*
INNER JOIN

SELECT * FROM `fol_working_process` INNER JOIN fol_list ON fol_working_process.id_crq = fol_list.id  INNER JOIN fol_counterparty ON fol_working_process.id_counterparty = fol_counterparty.id WHERE crq = 767

USE AdventureWorks2012;
GO
SELECT p.Name AS ProductName, 
NonDiscountSales = (OrderQty * UnitPrice),
Discounts = ((OrderQty * UnitPrice) * UnitPriceDiscount)
FROM Production.Product AS p 
INNER JOIN Sales.SalesOrderDetail AS sod
ON p.ProductID = sod.ProductID 
ORDER BY ProductName DESC;
GO
*/

/*
Таблица fol_working_process

id
id_crq (из таблицы fol_list)
id_counerparty (из таблицы fol_counterparty)
flag (для согласования 2 из таблицы fol_system_flag)
data
*/

//Возвращаем обратно результат
echo (json_encode($result));
