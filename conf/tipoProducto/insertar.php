<?php
include_once('base.php');
include_once('tipoProducto.php');
	$nombre = $_POST['descripcion'];
    $estado = $_POST['estado'];
    $query = insertarTipoProducto($nombre,$estado);

    header("location: ../../mTipoProducto.php");
    ?>