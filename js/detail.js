//js для страницы detail

/*==============================
Ловим нужные элементы
==============================*/

//crq
let fol_list_crq = document.querySelector('.fol_list_crq select');
//Название работ
let fol_list_name = document.querySelector('.fol_list_name');
//Дата производства работ
let fol_list_data = document.querySelector('.fol_list_data');
//Инициатор работ
let fol_working_process_initiator = document.querySelector('.fol_working_process_initiator');

/*==============================
Навешиваем обработчики событий
==============================*/

//изменение CRQ
fol_list_crq.addEventListener('change', changeCRQ);
//изменение имени работ
fol_list_name.addEventListener('change', change_FolList_DataName);
//изменение даты производства работ
fol_list_data.addEventListener('change', change_FolList_DataName);
//Изменяем инициатора работ
fol_working_process_initiator.addEventListener('change', change_fol_working_process_initiator)

/*==============================
Глобальные переменный/константы
==============================*/

//crq
let crq = fol_list_crq.options[fol_list_crq.selectedIndex].value;

/*==============================
Функции
==============================*/
/*
Функция меняет страницу при выборе нового crq
*/
function changeCRQ() {
	crq = fol_list_crq.options[fol_list_crq.selectedIndex].value;
	//Новый адрес для перехода
	let cururl = window.location.pathname + '?crq=' + crq;
	//Переход на новую страницу
	document.location.href = cururl;
}
/*
Функция меняет имя и дату работ
*/
function change_FolList_DataName() {
	//Данные для AJAX запроса
	let url = '../lib/ajax_index.php';
	let method = 'GET';
	//название поля в fol_list и его значение
	let pole;
	let value;
	//Конструкция заполняет значениями pole и value
	if (event.target.type == 'date') {
		pole = 'date_of_work';
		value = '"' + this.value + ' 00:00:00' + '"';
	}
	else if (event.target.type == 'textarea') {
		pole = 'name';
		value = '"' + this.value + '"';
	}
	else
		console.log('detail.js function change_FolList_DataName() Не определенный тип ');
	//Исходя из действующих переменных url, crq, pole, value готовит запрос к ajax_index.php
	let newurl = url + '?crq=' + crq + '&pole=' + pole + '&value=' + value;
	//Отправляем запрос
	ajax(newurl, method)
}
/*
Функция меняет инициатора работ
*/
function change_fol_working_process_initiator() {
	let url = '../lib/ajax_detail_change_initiator.php';
	let method = 'POST';

	let initiator = document.querySelector('.fol_working_process_initiator select').value;
	//Формирование данных запроса для PHP файла
	let testDataArr = {
		"crq": crq,
		"initiator": initiator
	};

	ajax1(url, method, showinitiator, testDataArr)
}

//Отображение данных текущего контрагента
function showinitiator(data) {
	data = JSON.parse(data);
	let email = document.querySelector('#email');
	let phone = document.querySelector('#phone');
	email.innerHTML = data.email;
	phone.innerHTML = data.phone;
}