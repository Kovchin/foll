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

function requestData(dataArr){
	let out = '';
	for (let key in dataArr){
		out +=`${key}=${dataArr[key]}&`;
	}
	//console.log(out);
	return out;
}