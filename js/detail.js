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
//Ход согласования работ
let fol_working_process = document.querySelectorAll('.matching input');
//Ход согласования работ добавление согласованта
let fol_working_process_add = document.querySelector('.matching select');
/*=
Запрос листинга из таблицы согласования
=*/
let arr_listing_working_process_Matching = [];//Целевой листинг

let listing_working_process_Matching = document.querySelector('.matching');	//ловим таблицу
let rec = listing_working_process_Matching.childNodes[1].children.length;	//количество записей для циклического перебора
for (let i = 1; i < rec - 1; i++) {
	arr_listing_working_process_Matching.push(listing_working_process_Matching.childNodes[1].children[i].cells[0].innerText);
}
//


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
fol_working_process_initiator.addEventListener('change', change_fol_working_process_initiator);
//Изменение данных в разделе Согласование работ
for (let i = 0; i < fol_working_process.length; i++) {
	fol_working_process[i].addEventListener('change', change_fol_working_process);
}
//Добавление нового согласованта в Согласование
fol_working_process_add.addEventListener('change', fol_working_process_addMatching);

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

/*======================
Условия отвечающее за отображение и скрытия блоков отвечающих за отмену работ
======================*/

let cancelled = document.querySelector('.no_cancelled input'), 	//флаг
	cancelledBlock = document.querySelector('.cancelled'),		//скрываемый блок
	cancelledValue = cancelled.checked; 						//значение флага

//отображаем текущее состояние блока отменены ли работы
showcanselled(cancelledValue, cancelledBlock);

//триггер на изменение состояния
cancelled.onchange = () => {
	cancelledValue = cancelled.checked;
	showcanselled(cancelledValue, cancelledBlock);
}

//функция отображающая блок при отмене работ
//"flag" отвечает за checkbox
// если он выбран то поле "div" появляется, а блок содержащий flag исчезает
function showcanselled(flag, div) {
	if (flag) {
		cancelled.parentNode.classList.add('removed');
		div.classList.remove('removed');
	}
	else
		div.classList.add('removed');
}

//todo
function change_fol_working_process() {
	/*===
	метод fetch более современный способ запросов к серверу
	===*/
	let url = '../lib/ajax_detail_change.php',
		method = 'POST';

	//Формирование json массива с данными для формирования запроса
	let inputData = {
		'crq': crq,
		'dbFieldName': this.parentNode.parentNode.cells[0].innerText,
		'type': this.type,
	};

	//Проверка и если мы ставим галочку то в поле value ставится true в противном случае значение value
	if (this.type == 'checkbox') {
		inputData.value = this.checked;
	} else {
		inputData.value = this.value;
	};

	//сам запрос
	sendRequest(method, url, inputData)
		.then(data => console.log(data))
		.catch(err => console.log(err));
	console.info('Смотри запрос во вкладке Сеть')
};
/*
function test() {
	console.log(this);
}
*/
//todo

function fol_working_process_addMatching() {
	console.clear();
	console.log('Заглушка на добавление нового согласованта');
	console.log(`Номер инцидента: ${crq}`);
	console.log(`Новый согласовант: ${this.value}`);
	//листинг для проверки на наличие выбираемого согласованта
	console.log(arr_listing_working_process_Matching);
}