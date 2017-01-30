<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include '../../Business/CustomerShoppingBusiness/CustomerShoppingBusiness.php';
        $customerBusiness = new CustomerShoppingBusiness();
        $information = $customerBusiness->getCustomerInvoices();
        ?>
    <center>
        <br>
        <table>
            <tr>
                <td><a href="../../index.php">Inicio</a></td>
                <td><a href="testCustomerShopping.php">Test compra</a></td>
            </tr>
        </table>
        <hr>
        <h1>Anular compra clientes</h1>
        <br>        
        <table>
            <th>Número compra</th>
            <th>Nombre</th>
            <th>Fecha compra</th>
            <th>Total compra</th>
            <?php
            for ($i = 0; $i < sizeof($information); $i++) {
                $info = $information[$i];
                $currentClient = $info[0];
                $currentSale = $info[1];
                ?>  
                <form id="deleteProduct" method="POST" action="../../Business/CustomerShoppingBusiness/CustomerShoppingAtion.php">
                    <tr>
                        <td><label><?php echo $currentSale->getIdSale(); ?></label></td>
                        <td><label><?php
                                echo '&emsp;&emsp;' . $currentClient->getNameClient() . '&emsp;' . $currentClient->getLastNameFClient()
                                . '&emsp;' . $currentClient->getLastNameSClient();
                                ?>&emsp;&emsp;&emsp;</label></td>
                        <td><label><?php echo $currentSale->getDatePurchase(); ?>&emsp;&emsp;&emsp;</label></td>
                        <td><label><?php echo '₡ ' . number_format($currentSale->getTotalPurchase()); ?>&emsp;&emsp;&emsp;</label></td>          
                    <input type="hidden" id="idSale" name="idSale" value="<?php echo $currentSale->getIdSale(); ?>" />     
                    <input type="hidden" id="optionState" name="optionState" value="state" />     

                    <td><input type="submit" id="btnAccept" name="btnAccept" value="Anular" /></td>                
                    </tr>
                </form>

                <?php
            }
            ?>
        </table>
        <label id="txtMessage"></label>
    </center>
</body>
<?php
if (isset($_GET['success'])) {
    echo '<script>                        
             document.getElementById("txtMessage").innerHTML = "Se desactivó con éxito";
          </script>';
} else if (isset($_GET['error'])) {
    echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Desactivación fallida";
          </script>';
}
?>
</html>
