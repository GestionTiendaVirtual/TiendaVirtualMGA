<html>
<head><title>Mascara de moneda mientras se escribe</title>
	<meta http-equiv="keywords" content="mascara,moneda,javascript,arieloliva" />
	<meta http-equiv="description" content="Mascara de moneda en javascript. Bajados desde arieloliva.com" />
	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
	<script language="javascript">
	function mascara(o,f){  
		v_obj=o;  
		v_fun=f;  
		setTimeout("execmascara()",1);  
	}  
	function execmascara(){   
		v_obj.value=v_fun(v_obj.value);
	}  
	function cpf(v){     
		v=v.replace(/([^0-9\.]+)/g,''); 
		v=v.replace(/^[\.]/,''); 
		v=v.replace(/[\.][\.]/g,''); 
		v=v.replace(/\.(\d)(\d)(\d)/g,'.$1$2'); 
		v=v.replace(/\.(\d{1,2})\./g,'.$1'); 
		v = v.toString().split('').reverse().join('').replace(/(\d{3})/g,'$1,');    
		v = v.split('').reverse().join('').replace(/^[\,]/,''); 
		return v;  
	}  
</script>
</head>
<body  >
	<table align="center" width="100%" cellpadding="0" cellspacing="0" border="0">
		<tr width="100%">
			<td width="60%" >
				Monto: <input type="text" id ="monto" on  name="monto"  size="21"  maxlength="21" onkeypress="mascara(this,cpf)"  onpaste="return false"  >
			</td>
			<td width="60%" >
				Monto: <input type="text" id ="otro"   name="otro"  size="21"  maxlength="21"   >
			</td>
		</tr>
	</table>
</body>
</html>
