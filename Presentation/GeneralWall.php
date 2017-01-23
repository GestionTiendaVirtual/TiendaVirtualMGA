<?php include '../Data/conexion.php'; ?>
 <!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Muro general</title>
        <script type="text/javascript">
          
        </script>
    </head>


    <body>


      <h1>Muro general</h1>
      <form action="GeneralWall.php" method="POST">
        <textarea type="text" name="comentario"></textarea>
        <input type="submit" name="enviar" value="Enviar comentario">
      </form>


    <?php
    $query="SELECT * FROM tbcomentario where tipoProducto='general'";
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
        $tipoProducto='computadora';
        if($comentario==''){
         
        }
        else{
           $insertar= mysqli_query($conexion, "INSERT INTO tbcomentario(comentario,tipoProducto)VALUES('".$comentario."','".$tipoProducto."')")or die(mysqli_error($conexion));


        }
        

      }

    ?>
    

    </body>
</html>