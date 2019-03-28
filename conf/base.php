<?php
    function iniciarConexion(){
        $servername = "localhost";
        $username = "rzvibesc_pos_cou";
        $password = "DE80=KNVQ8Pu";
        $dbname = "rzvibesc_pos_con";
        try{
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } else {}
        }catch (Exception $e) {

        }
        return $conn;
    }

    function cerrarConexion($conn){
        try{
            $conn->close();
        }catch (Exception $e) {}
    }

    function insertaQuery($conn, $sql){
        try {
            $conn->query($sql);
        } catch (Exception $e) {
        }
    }

    function insertaQueryLog($conn, $sql){
        try {
            $conn->query($sql);
        } catch (Exception $e) {
        }
    }

    function insertaQueryReturn($conn, $sql){
        try {
            $conn->query($sql);
        } catch (Exception $e) {
        }
        return $conn->insert_id;
    }

    function actualizarQuery($conn, $sql){
        try {
            return $conn->query($sql);
        } catch (Exception $e) {
        }
        return 1;
    }

    function eliminarQuery($conn, $sql){
        try {
            return $conn->query($sql);
        } catch (Exception $e) {
        }
        return 1;
    }

    function ejecutarQuery($conn, $sql){
        try {
            return $conn->query($sql);
        } catch (Exception $e) {
        }
        return 1;       
    }
?>