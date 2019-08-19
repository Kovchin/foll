//let url = 'http://foll/lib/test.php';
//let method = 'GET';
//let isAsync = false;

//Ловим блок с классом ajax
//let aj = document.querySelector('.ajax');
//Вызов AJAX запроса к файлу url и вывод результата в блок что поймали выше
//aj.innerHTML = ajax(url, method, isAsync);

//Стандартный ajax запрос
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