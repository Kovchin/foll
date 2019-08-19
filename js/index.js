url = '../lib/ajax_index.php';
method = 'GET';

//Навешиваем обработчик на изменение даты и выполнения работ
document.body.addEventListener('change', show);

//функция формирует ajax запрос исходя из данных которые были изменены
function show() {
	//Значение что нужно вставить в БД
	let value;
	//Поле которое меняется
	let pole;
	//Атрибут crq для запроса
	let crq = event.target.name;

	//выбор имени поля БД в зависимости от типа измененного поля
	if (event.target.type == 'checkbox') {
		pole = 'compleate';
		value = event.target.checked;
	}
	else if (event.target.type == 'date') {
		pole = 'date_of_work';
		value = '"' + event.target.value + ' 00:00:00"';
	}
	else {
		value = '';
		pole = '';
	}

	let newurl = url + '?crq=' + crq + '&pole=' + pole + '&value=' + value;

	ajax(newurl, method)
}

