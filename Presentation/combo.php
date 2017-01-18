
<?php
	require ('../Data/conexion.php');
	$query="SELECT nombre_pueblo,id_distrito FROM pueblo";
	
	$resultado=$mysqli->query($query);
	
?>


<html>
	<head>
		<title>ComboBox Ajax, PHP y MySQL</title>
		<script src="../script/js.js"></script>
	</head>
	
	<body onload="getProvincia();">

		<h1>Direccion usuarios</h1>
		
		<div id="provinciaList"></div> <br />
		
		<div id="cantonList"></div> <br />
		
		<div id="distritoList"></div>
		
	</form>

		
	
</body>
</html>
