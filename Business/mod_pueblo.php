<?php 
	
	require ('../Data/conexion.php');
	$id=$_POST['id'];
	$nombre_pueblo=$_POST['usuario'];
	
	
	
	
	$query="UPDATE pueblo SET nombre_pueblo='$nombre_pueblo', id_distrito='$id' WHERE id_distrito='$id'";
	
	$resultado=$mysqli->query($query);
	
?>

<html>
	<head>
		<title>Modificar usuario</title>
	</head>
	
	<body>
		<center>
			
			<?php 
				if($resultado>0){
				?>
				
				<h1>Usuario Modificado</h1>
				
					<?php 	}else{ ?>
				
				<h1>Error al Modificar Usuario</h1>
				
			<?php	} ?>
			
			<p></p>	
			
			<a href="../Presentation/combo.php">Regresar</a>
			
		</center>
	</body>
</html>
				
				