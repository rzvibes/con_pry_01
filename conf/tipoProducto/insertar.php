<?php
include_once('base.php');
include_once('../tipoProducto.php');
    $nombre = $_POST['descripcion'];
    
    $query = insertarTipoProducto($nombre);

    header("location: ../../mTipoProducto.php");
    ?>