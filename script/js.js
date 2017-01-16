
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
	xmlhttp3.open("GET","../Business/getProvincia.php",true);
	xmlhttp3.send();
}

function getCanton(estado_id) {
	
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
	xmlhttp3.open("GET","../Business/getCanton.php?estado_id="+estado_id,true);
	xmlhttp3.send();
}

function getLocalidad(municipio_id) {
	
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
	xmlhttp3.open("GET","../Business/getLocalidad.php?municipio_id="+municipio_id,true);
	xmlhttp3.send();
}

