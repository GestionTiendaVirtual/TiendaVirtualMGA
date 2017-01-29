<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <br>
        <table>
            <tr>
                <td><a href="../../index.php">Inicio</a></td>
                <td><a href="testCustomerShopping.php">Test compra</a></td>
                <td><a href="CustomerShoppingState.php">Anular compra</a></td>
            </tr>
        </table>
        <hr>
        <br>
        
        <h1>Simular cuando se realiza una compra (Prueba del método que realiza el registro de la compra)</h1>

        <form method="POST" action="../../Business/CustomerShoppingBusiness/CustomerShoppingAtion.php">
            <label>id Cliente</label>
            <input type="text" id="client" name="client"/><br>
            <label>id Producto</label>
            <input type="text" id="product1" name="product1"/><br>
            <label>id Producto</label>
            <input type="text" id="product2" name="product2"/><br>
            <label>id Producto</label>
            <input type="text" id="product3" name="product3"/><br>
            <label>Total</label>
            <input type="text" id="total" name="total"/><br>
            <input type="hidden" id="create" name="create" value="create"/><br>
            <input type="submit" value="comprar"/>
        </form>


        <br><hr><br>
        <?php
        if (isset($_GET['success'])) {
            
            $id = $_GET['success'];
            include_once '../../Business/CustomerShoppingBusiness/CustomerShoppingBusiness.php';

            $customerBusiness = new CustomerShoppingBusiness();
            $result = $customerBusiness->getCustomerInvoice($id);

            $client = $result[0];
            $invoice = $result[1];
            $products = $result[2];

            echo '<h1>Descripción factura #'.$invoice->getIdSale().'</h1>';

            echo "<h2>Cliente:</h2>" . $client->getNameClient() . "  &emsp;   " . $client->getLastNameFClient() . "  &emsp;  " .
            $client->getLastNameSClient() . "  &emsp;  " . $client->getEmailClient() .
            "  &emsp;&emsp;  " . $client->getAddressClient() . "<hr>";
            echo '<h2>Fecha compra:</h2>' . $invoice->getDatePurchase() . '<hr>';

            echo '<h2>Productos:</h2>';
            foreach ($products as $currentProduct) {
                echo $currentProduct->getBrand() . " &emsp;&emsp; " . $currentProduct->getModel()
                . " &emsp;&emsp; ₡" . number_format($currentProduct->getPrice()) . "<br><hr><br>";
            }
            echo '<h1>total:</h1> ₡' . number_format($invoice->getTotalPurchase());
        }
        ?>
    </body>
   
</html>
