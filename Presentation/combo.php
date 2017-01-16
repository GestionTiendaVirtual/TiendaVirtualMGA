
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

	<table border=1 width="80%">
			<thead>
				<tr>
					<td><b>Nombre del pueblo</b></td>
					<td><b>Distrito perteneciente</b></td>
					<td></td>
					<td></td>
				</tr>
				<tbody>
					<?php while($row=$resultado->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $row['nombre_pueblo'];?>
							</td>
							<td>
								<?php echo $row['id_distrito'];?>
							</td>
							<td>
								<a href="modificarPueblo.php?id=<?php echo $row['id_distrito'];?>">Modificar</a>
							</td>
							<td>
								<a href="../Business/eliminar.php?id=<?php echo $row['id_distrito'];?>">Eliminar</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		
	
</body>
</html>
