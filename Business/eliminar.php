<?php 
	
	require ('../Data/conexion.php');
	
	$id=$_GET['id'];
	$query="DELETE FROM pueblo WHERE id_distrito='$id'";
	
	$resultado=$mysqli->query($query);
	
?>

<html>
	<head>
		<title>Eliminar pueblo</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($resultado>0){
				?>
				
				<h1>Pueblo Eliminado</h1>
				
				<?php 	}else{ ?>
				
				<h1>Error al Eliminar pueblo</h1>
				
			<?php	} ?>
			<p></p>		
			
			<a href="../Presentation/combo.php">Regresar</a>
			
		</center>
	</body>
</html>