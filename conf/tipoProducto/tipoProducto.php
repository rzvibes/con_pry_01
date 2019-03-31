<?php
    include_once('../base.php');

    function insertarTipoProducto($nombre,$estado){
     
        $conn = iniciarConexion();
        $sql = "insert into tipoProducto (nombre,estado) values ('".$nombre."','".$estado ."');";
        echo($sql);
        $result = ejecutarQuery($conn, $sql);
        cerrarConexion($conn);
        return $result;
    }

?>