
function getProvincia() {
	
	if (window.XMLHttpRequest) {
		xmlhttp3 = new XMLHttpRequest();
		} else { 
		xmlhttp3 = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp3.onreadystatechange=function() {
		if (xmlhttp3.readyState==4 && xmlhttp3.status==200) {
			document.getElementById("provinciaList").innerHTML=xmlhttp3.responseText;
		}
	}
	xmlhttp3.open("GET","../Business/Direction/GetProvince.php",true);
	xmlhttp3.send();
}


function getCanton(idProvince) {
	
	if (window.XMLHttpRequest) {
		xmlhttp3 = new XMLHttpRequest();
		} else { 
		xmlhttp3 = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp3.onreadystatechange=function() {
		if (xmlhttp3.readyState==4 && xmlhttp3.status==200) {
			document.getElementById("cantonList").innerHTML=xmlhttp3.responseText;
		}
	}
	xmlhttp3.open("GET","../Business/Direction/getCanton.php?idProvince="+idProvince,true);
	xmlhttp3.send();
}

function getDistrict(idCanton) {
	
	if (window.XMLHttpRequest) {
		xmlhttp3 = new XMLHttpRequest();
		} else { 
		xmlhttp3 = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp3.onreadystatechange=function() {
		if (xmlhttp3.readyState==4 && xmlhttp3.status==200) {
			document.getElementById("distritoList").innerHTML=xmlhttp3.responseText;
		}
	}
	xmlhttp3.open("GET","../Business/Direction/GetDistrict.php?idCanton="+idCanton,true);
	xmlhttp3.send();
}


function getTipoProducto() {
	
	if (window.XMLHttpRequest) {
		xmlhttp3 = new XMLHttpRequest();
		} else { 
		xmlhttp3 = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp3.onreadystatechange=function() {
		if (xmlhttp3.readyState==4 && xmlhttp3.status==200) {
			document.getElementById("tipoProducto").innerHTML=xmlhttp3.responseText;
		}
	}
	xmlhttp3.open("GET","../Presentation/getTypeProduct.php",true);
	xmlhttp3.send();
}


function getProduct(idTypeProduct) {
	
	if (window.XMLHttpRequest) {
		xmlhttp3 = new XMLHttpRequest();
		} else { 
		xmlhttp3 = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp3.onreadystatechange=function() {
		if (xmlhttp3.readyState==4 && xmlhttp3.status==200) {
			document.getElementById("producto").innerHTML=xmlhttp3.responseText;
		}
	}
	xmlhttp3.open("GET","../Presentation/GetProduct.php?idTypeProduct="+idTypeProduct,true);
	xmlhttp3.send();
}

