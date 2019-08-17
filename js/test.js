const url = 'http://foll/lib/test.php';


let test = document.querySelector('#test');

ajax();

function ajax(){
	const response = fetch(url);
	console.log(response);
	return response.text();
}