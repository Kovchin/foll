<?php

include_once 'DB/DBRegistrationData.php';

class Detail_data
{

    private $connect;

    private $query;

    private $result_query;
    //Конструктор класса 
    //Пока что в нем создается ссылка на объект БД
    public function __construct()
    {
        $this->connect = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if ($this->connect->connect_errno) {
            echo 'Не удалось подключиться к базе данных ' . DB_NAME;
            echo '<br /> Ошибка: ' . $this->connect->connect_error;
            exit();
        } else {
            echo 'Удалось подключиться к базе данных ' . DB_NAME;
        }
    }
    //Отдает запрос к базе данных
    public function query()
    {
        if (isset($this->query))
            $this->result_query = $this->connect->query($this->query);
        else
            echo '<br /> <p class="error">Проверьте запрос: данных нет.</p>';
    }
    //Выводит результат запроса
    public function get_result_query_as_string()
    {
        echo '<br />Результат запроса = ' . $this->result_query->num_rows . ' записей <br />';
        print_r($this->result_query);
    }

    //выводит на экран текущую строку запроса
    public function get_query()
    {
        echo '<br /> query = ' . $this->query . '<br />';
    }
    //Записать строку запроса в свойство класса
    public function set_query($query)
    {
        $this->query = $query;
    }

    /*
    private $mydb = new MyDBClass();

    public $crq = $_GET['crq'];

    $this->mydb->set_query("SELECT * FROM `fol_list` WHERE `CRQ` = $this->crq");
    public $id_crq = $this->mydb->table[0]['id'];

//Получаем id инициатора из fol_working_process
$mydb->set_query("SELECT * FROM `fol_working_process` WHERE `id_crq` = $id_crq AND `flag` = 1");
$id_counterparty = $mydb->table[0]['id_counterparty'];

//Получаем Имя телефон и почту из fol_counterparty
$mydb->set_query("SELECT * FROM `fol_counterparty` WHERE `id` = $id_counterparty");
$curent_name_counterparty = $mydb->table[0]['name'];
$curent_phone_counterparty = $mydb->table[0]['phone'];
$curent_email_counterparty = $mydb->table[0]['email'];
*/
}
