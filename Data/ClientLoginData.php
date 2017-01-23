<?php

include 'Data.php';
/**
 * Description of ClientLoginData
 *
 * @author mm
 */
class ClientLoginData extends Data {
   
    function isClient($client) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbcliente where "
                . "UsuarioCliente = '".$client[0]."' and contrasenaCliente = '".$client[1]."';");
        $row = mysqli_fetch_array($result);
        $id = 0;
        if (sizeof($row) >= 1) {
            $id = $row['idCliente'];
        } else {
            $id = -1;
        }
        return $id;
    }
}
