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
function sendRequest(method, url, body = null) {
	const headers = {
		'Content-Type': 'application/json'
		//"Content-type": "application/x-www-form-urlencoded"
	}

	return fetch(url, {
		method: method,
		body: JSON.stringify(body),
		//body: body,
		headers: headers
	}).then(response => {

		if (response.ok) {
			return response.json();
			//return response.text();
		}

		return response.json().then(error => {
			const e = new Error('Что то пошло не так')
			e.data = error
			throw e
		})
	})

};