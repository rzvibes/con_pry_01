<?php
    include_once('base.php');

    function listarProducto(){
        $conn = iniciarConexion();
        $sql = "SELECT * FROM producto p INNER JOIN tipoProducto tp ON p.tipoProducto = tp.idTipoProducto;";
        $result = ejecutarQuery($conn, $sql);
        cerrarConexion($conn);
        return $result;
    }

    function listarProductoConStock(){
        $conn = iniciarConexion();
        $sql = "SELECT tp.nombre as tipoProducto, p.marca, p.descripcion as nombreProducto, inv.stock, inv.precio, p.idproducto FROM producto p 
            INNER JOIN tipoProducto tp ON p.tipoProducto = tp.idtipoProducto INNER JOIN inventario inv ON p.idproducto = inv.idproducto WHERE inv.stock > 0 ORDER BY 1 ASC;";
        $result = ejecutarQuery($conn, $sql);
        cerrarConexion($conn);
        return $result;
    }

?>