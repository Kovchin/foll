const url = 'http://foll/lib/test.php';
const method = 'GET';
const isAsync = false;

//Ловим блок с классом ajax
let aj = document.querySelector('.ajax');
//Вызов AJAX запроса к файлу url и вывод результата в блок что поймали выше
aj.innerHTML = ajax(url, method, isAsync);

//Стандартный ajax запрос
function ajax() {
	let xhttp = new XMLHttpRequest();
	xhttp.open(method, url, isAsync);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send();
	/*Не работает разобраться!
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				console.log(this);
			}
		}*/
	return xhttp.response;
}