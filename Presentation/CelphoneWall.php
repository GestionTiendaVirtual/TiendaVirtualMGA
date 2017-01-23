 <?php include '../Data/conexion.php'; ?>
 <!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Muro de celular</title>
    </head>


    <body>


      <h1>Muro de celulares</h1>
      <form action="CelphoneWall.php" method="POST">
        <textarea type="text" name="comentario"></textarea>
        <input type="submit" name="enviar" value="Enviar comentario">
      </form>


    <?php
    $query="SELECT * FROM tbcomentario where tipoProducto='celular'";
    $resultado=$mysqli->query($query);
    if($resultado=$mysqli->query($query))
    {
      while($row = $resultado->fetch_assoc())
      { 
        echo "<div >".$row['comentario']."</div>";
       
       }
    }
  
    ?>

    <?php

      if(isset($_POST['enviar'])){
        $comentario = utf8_decode(mysqli_real_escape_string($conexion, $_POST['comentario']));
        $tipoProducto='celular';
        if($comentario==''){
          

        }
        else {
          $insertar= mysqli_query($conexion, "INSERT INTO tbcomentario(comentario,tipoProducto)VALUES('".$comentario."','".$tipoProducto."')")or die(mysqli_error($conexion));

        }
        

      }

    ?>
    

    </body>
</html>