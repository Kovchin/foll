var xmlHttp = null;

function GetXmlHttpObject() {
	var xmlHttp;
	try { xmlHttp = new ActiveXObject("Msxml2.XMLHTTP"); }
	catch (e) {
		try { xmlHttp = new ActiveXObject("Microsoft.XMLHTTP"); }
		catch (E) { xmlHttp = false; }
	}
	if (!xmlHttp && typeof XMLHttpRequest != 'undefined') { xmlHttp = new XMLHttpRequest(); }
	return xmlHttp;
}

function AJAX(method, php, params, OnChange) {
	xmlHttp = GetXmlHttpObject();
	if (xmlHttp == null) { alert("Ваш браузер не поддерживает AJAX !"); return; }
	if (OnChange != null) xmlHttp.onreadystatechange = OnChange;
	if (method == "GET") {
		url = php + "?ajax=&" + params;
		xmlHttp.open(method, url, true);
		xmlHttp.send(null);
	}
	if (method == "POST") {
		params = "ajax=1&" + params;
		xmlHttp.open(method, php, true);
		xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlHttp.send(params);
	}
}

function OnChange() {
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
// < !--обработка полученных данных-- >
}
}