
<html>
    <head>
        <title>Direccion de clientes</title>
        <script src="../JS/jquery-3.1.1.min.js" type="text/javascript"></script>
    </head>

    <body>
        <?php
        include_once '../Data/DirectionClientData.php';
        $direction = new DirectionClientData();
        $result = $direction->getProvince();
        ?>

        <h1>Direccion</h1>
        <a href="../index.php">Inicio</a>
        <br>
        <h3>Selecciona la provincia:</h3>
        <select id="province">
            <option>--Seleccione--</option>
            <?php
            foreach ($result as $currentType) {
                ?>
                <option value="<?php echo $currentType->getIdProvince(); ?>">
                    <?php echo $currentType->getName(); ?></option>
                <?php
            }
            ?>
        </select>
        
        


        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            include_once '../Data/DirectionClientData.php';
            $direction = new DirectionClientData();
            $result = $direction->getCanton($id);
        ?>
        <br></br>
            <h3>Seleccione el canton:</h3>
            <select id="canton">
                <option>--seleccione--</option>
                    <?php
                     foreach ($result as $currentProduct) {
                     ?>   
                     <option value="<?php echo $currentProduct->getIdCanton(); ?>"/>
                        <?php echo $currentProduct->getNameCanton(); ?></option>

                    <?php
                    }
                     ?>

                    <?php
         }
                    ?>
            
            
            </select>
        
        
        
        <?php
        if (isset($_GET['id2'])) {
            $id2 = $_GET['id2'];
            include_once '../Data/DirectionClientData.php';
            $direction = new DirectionClientData();
            $result = $direction->getDistrict($id2);
            ?>
             <br></br>
             <h3>Seleccione el distrito:</h3>
              <select id="district">
                <option>--seleccione--</option>
                    <?php
                    foreach ($result as $currentProduct) {
                    ?>
                        <option value="<?php echo $currentProduct->getIdDistrict(); ?>"/>
                        <?php echo $currentProduct->getNameDistrict(); ?></option>

                    <?php
                    }
                    ?>

             

        <?php
        }
        ?>
             </select>



                

        
        
        
            </select>



      


        <script>
            $(document).ready(function () {

                $("#province").change(function () {
                    var id = $('select[id=province]').val();
                    window.location = "./DirectionClient.php?id=" + id;
                });
                $("#canton").change(function () {
                    
                    var id2 = $('select[id=canton]').val();
                    window.location = "./DirectionClient.php?id2="+ id2;
                });
                $("#district").change(function () {
                    var id3 = $('select[id=district]').val();
                    window.location = "./DirectionClient.php?id3=" + id3;
                });
            });
        </script>





    </body>

</html>
