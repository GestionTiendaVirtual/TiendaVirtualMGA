<?php include ("../Data/conexion.php");?>
	<?php mysql_select_db($baseDatos);?>
	<?php 
		$sql="select * from tbproducto where idProducto=".$_GET['id'];
		$res=mysql_query($sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
	?>

Maquinas:
<select name="producto" >	
	<?php while ($fila=mysql_fetch_array($res)){ ?>
	<option value="<?php echo $fila['idProducto']?>"><?php echo $fila['nombre']?></option>
<?php }?>
</select>