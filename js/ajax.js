function ajax(url, method) {
	let xhttp = new XMLHttpRequest();
	xhttp.open(method, url);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xhttp.addEventListener('readystatechange', () => {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			console.log(xhttp.responseText);
		}
	});
	xhttp.send();
}

function ajax1(url, method, functionName, dataArray) {
	let xhttp = new XMLHttpRequest();
	xhttp.open(method, url, true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(requestData(dataArray));

	xhttp.onreadystatechange = function () {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			functionName(this.response);
		}
	}
};

function requestData(dataArr) {
	let out = '';
	for (let key in dataArr) {
		out += `${key}=${dataArr[key]}&`;
	}
	//console.log(out);
	return out;
}

//Попытка переделать программу на fetch запросы. Пока не успешная
//https://www.youtube.com/watch?v=eKCD9djJQKc&t=1169s

//Функция генерирующая fetch запрос
function sendRequest(method, url, body = null) {
	//Формируем заголовок запроса (можно и без него я в php просто парсю полезную нагрузку)
	const headers = {
		'Content-Type': 'application/json',
	}
	//В выводе функции вызываем fetch запрос с подготовленными данными
	return fetch(url, {
		method: method,
		body: JSON.stringify(body),
		headers: headers
		//Так как результатом fetch возвращается promise, то стрелочной функцией разбираем ответ как json (можно получать объекты)
	}).then(response => {
		return response.json();
	})
};