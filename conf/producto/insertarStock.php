<?php
    $cantidad = $_POST["cantidad"];
    $precio = $_POST["precio"];
    $idProducto = $_POST["idProducto"];
    include_once('base.php');
    include_once('../producto.php');

    InsertarStock($cantidad,$precio,$idProducto);

    header("location: ../../producto.php");
?>