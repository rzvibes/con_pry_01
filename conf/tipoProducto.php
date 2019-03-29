<?php
    include_once('base.php');

    function listarTipoProducto(){
        $conn = iniciarConexion();
        $sql = "SELECT * FROM tipoProducto";
        $result = ejecutarQuery($conn, $sql);
        cerrarConexion($conn);
        return $result;
    }

?>