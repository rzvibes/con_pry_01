<?php
    include_once('base.php');

    function listarTipoProducto(){
        $conn = iniciarConexion();
        $sql = "SELECT * FROM tipoProducto";
        $result = ejecutarQuery($conn, $sql);
        cerrarConexion($conn);
        return $result;
    }

    function insertarTipoProducto($nombre){
     
        $conn = iniciarConexion();
        $sql = "insert into tipoProducto (nombre) values ('".$nombre."');";
        echo($sql);
        $result = ejecutarQuery($conn, $sql);
        cerrarConexion($conn);
        return $result;
    }

    function ActualizarEstadoTipoProducto($idtipoProducto){
     
        $conn = iniciarConexion();
        $sql = "UPDATE tipoProducto SET estado = !estado WHERE idtipoProducto = ".$idtipoProducto.";";
        echo($sql);
        $result = ejecutarQuery($conn, $sql);
        cerrarConexion($conn);
        return $result;
    }
?>