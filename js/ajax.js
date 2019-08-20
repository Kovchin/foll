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