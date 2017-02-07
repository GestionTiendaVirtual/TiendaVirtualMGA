
<html>
    <head>
        <title>Direccion de clientes</title>
        <script src="../../JS/jquery-3.1.1.min.js" type="text/javascript"></script>
    </head>

    <body>
        <?php
        include_once '../../Business/Location/LocationBusiness.php';
        $direction = new LocationBusiness();
        $result = $direction->getProvinceBusiness();
        ?>

        <h1>Direccion</h1>
        <a href="../../index.php">Inicio</a>
        <br>


        <?php
        /*El caso de que se haya seleccionado toda la hubicacion*/
        if (isset($_GET['district'])) {
        ?>
        <h1>La ubicacion es: <br>
            <?php echo "Provincia: " . $_GET['province'] . "<br>
                        Canton: " . $_GET['canton'] . "<br>
                        Distrito: " . $_GET['district'];
            ?>
        </h1>
        <?php    
        }
        /*En caso de que aun no se haya selecionado toda la hubicacion*/
        else{
        ?>
        <!-- ************************************ PROVINCIA ************************** -->
            <h3>Selecciona la provincia:</h3>
            <select id="province">
                <?php
                if(!isset($_GET['id'])){
                ?>
                    <option>--Seleccione--</option>
                <?php
                } 
                foreach ($result as $currentType) {
                    if (isset($_GET['id']) && $currentType->getIdProvince() == $_GET['id']) {
                    ?>
                        <option value="<?php echo $currentType->getIdProvince(); ?>" selected>
                        <?php echo $currentType->getName(); ?></option>
                    <?php
                    }else{
                    ?>
                        <option value="<?php echo $currentType->getIdProvince(); ?>">
                        <?php echo $currentType->getName(); ?></option>
                    <?php
                    }
                }
                ?>
            </select>        

            <!-- ************************************ CANTON ************************** -->
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                /*Se obtiene el Canton*/
                $result = $direction->getCantonBusiness($id);
            ?>
            <br></br>
            <h3>Seleccione el canton:</h3>
            <select id="canton">
                <?php
                if(!isset($_GET['id2'])){
                ?>
                   <option>--Seleccione--</option>
                <?php
                } 
                foreach ($result as $currentProduct) {
                    if(isset($_GET['id2']) && $_GET['id2'] ==  $currentProduct->getIdCanton()){
                 ?>   
                        <option value="<?php echo $currentProduct->getIdCanton(); ?>" selected/>
                        <?php echo $currentProduct->getNameCanton(); ?></option>

                <?php
                    }else{
                ?>
                        <option value="<?php echo $currentProduct->getIdCanton(); ?>"/>
                        <?php echo $currentProduct->getNameCanton(); ?></option>
                <?php
                    }
                }
                ?>
                </select>
                <?php
            }
            ?>        
            
            <!-- ********************************** Distrito ************************** -->
            <?php
            if (isset($_GET['id2'])) {
                $id2 = $_GET['id2'];
                
                /*Se obtiene el distrito*/
                $result = $direction->getDistrictBusiness($id2);
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
                </select>
            <?php
            }
        }//Fin de la ajecucion para obtner ubicacion.
            ?>      

            <!-- ***************************************
                Script que controlan las acciones de los select 
            **************************************** -->
        <script>
            $(document).ready(function () {

                $("#province").change(function () {
                    var id = $('select[id=province]').val();
                    window.location = "./DirectionClient.php?id=" + id;
                });
                $("#canton").change(function () {
                    var id = $('select[id=province]').val();
                    var id2 = $('select[id=canton]').val();
                    window.location = "./DirectionClient.php?id2="+ id2 + "&& id=" + id;
                });
                $("#district").change(function () {
                    var district = $("#district option:selected").html();
                    var province = $("#province option:selected").html();
                    var canton = $("#canton option:selected").html();
                    
                    window.location = "./DirectionClient.php?district=" + district + "&&province="+ province + "&&canton=" + canton;
                });
            });
        </script>

    </body>

</html>
