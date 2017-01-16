<?php
	
	require ('../Data/conexion.php');
	
	$id=$_GET['id'];
	
	$query="SELECT nombre_pueblo,id_distrito FROM pueblo WHERE id_distrito='$id'";
	
	$resultado=$mysqli->query($query);
	
	$row=$resultado->fetch_assoc();
	
?>

<html>
	<head>
		<title>Usuarios</title>
	</head>
	<body>
		
		<center><h1>Modificar Usuario</h1></center>
		
		<form name="modificar_usuario" method="POST" action="../Business/mod_pueblo.php">
			
			<table width="50%">
				<tr>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<td width="20"><b>Nombre pueblo</b></td>
					<td width="30"><input type="text" name="usuario" size="25" value="<?php echo $row['nombre_pueblo']; ?>" /></td>
				</tr>	
				<tr>
					<td colspan="2"><center><input type="submit" name="Guardar" value="Guardar" /></center></td>
				</tr>
			</table>
		</form>
	</body>
</html>	
