const url = 'http://foll/lib/test.php';

let result;

ajax();

async function ajax() {
	let response = await fetch(url);
	if (response.ok) {
		result = await response.text();
		console.log(result);
	}
}