<?php
    include_once('base.php');

    function listarProducto(){
        $conn = iniciarConexion();
        $sql = "insert producto p INNER JOIN tipoProducto tp ON p.tipoProducto = tp.idTipoProducto;";
        $result = ejecutarQuery($conn, $sql);
        cerrarConexion($conn);
        return $result;
    }

?>