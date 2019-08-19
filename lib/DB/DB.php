<?php

require_once 'DBRegistrationData.php';

class MyDBClass
{
	//Экземпляр класса базы данных
	private $connect;
	//Строка запроса
	private $query;
	//Массив результат запроса к БД
	public $table;

	//Конструктор класса при вызове формирует ссылку на базу данных $this->connect
	public function __construct()
	{
		$this->connect = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if ($this->connect == false) {
			echo 'Не удалось подключиться к базе данных ' . DB_NAME;
			echo mysqli_connect_error();
			exit();
		}
		$this->connect->set_charset('utf8');
		//echo 'Вы успешно подключились к базе данных ' . DB_NAME;
		return $this->connect;
		exit;
	}

	//Просто отдать запрос к базе данных
	public function query($mystring)
	{
		$this->connect->query($mystring);
	}

	//Заменить/инициализировать строку запроса
	public function set_query($mystring)
	{
		$this->query = $mystring;
		$this->init_table();
	}

	//Формирование свойства table (результат запроса query) 
	private function init_table()
	{
		$res_query = $this->connect->query($this->query);
		$this->table = array();
		while (($row = $res_query->fetch_assoc()) != false) {
			$this->table[] = $row;
		}
	}

	//Вывести на экран свойство table
	public function show_table_as_list()
	{
		echo '<pre>';
		print_r($this->table);
		echo '</pre>';
	}

	public function get_table_as_array($pole)
	{
		$arr = array();
		for ($i = 0; $i < count($this->table); $i++)
			$arr[] = $this->table[$i][$pole];
		return $arr;
	}

	public function create_select_option($pole, $defaultValue)
	{
		echo '<select>';
		foreach ($this->table as $key) {
			if ($key[$pole] == $defaultValue)
			echo '<option selected = true>' . $key[$pole] . '</option>';
			else
				echo '<option>' . $key[$pole] . '</option>';
		}
		echo '</select>';
	}
}
