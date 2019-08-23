<?php

//Не используемый класс

include_once 'DB/DBRegistrationData.php';

class Detail_data
{
	//Ссылка на БД
	private $connect;
	//Строка запроса
	private $query;
	//Результат выполнения запроса
	private $result_query;
	//Массив с результатами запроса
	private $table;
	//crq
	public $crq;

	//Конструктор класса 
	//Пока что в нем создается ссылка на объект БД
	public function __construct()
	{
		//Получаем crq
		$this->set_srq($_GET['crq']);
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
		if (isset($this->query)) {
			$this->result_query = $this->connect->query($this->query);
			if ($this->connect->error) {
				echo '<br /><p class="error">Ошибка запроса = ' . $this->get_query() . '<br />' . $this->connect->error . '</p>';
				die;
			}
		} else {
			echo '<br /> <p class="error">Проверьте запрос: данных нет.</p>';
			die;
		}
	}
	//Выводит результат запроса
	public function show_result_query_as_string()
	{

		echo '<hr>Результат запроса = ' . $this->result_query->num_rows . ' записей.';
		echo '<br />Количество полей в записях = ' . $this->result_query->field_count . '<br />';

		$this->table = array();
		while (($row = $this->result_query->fetch_assoc()) != false) {
			$this->table[] = $row;
		}
		echo '<pre>';
		print_r($this->table);
		echo '</pre><hr>';
	}

	//выводит текущую строку запроса
	public function get_query()
	{
		return $this->query;
	}
	//Записать строку запроса в свойство класса
	public function set_query($query)
	{
		$this->query = $query;
	}
//Функция инициализирует метод crq
	private function set_srq($crq)
	{
		$this->crq = $crq;
	}
}
