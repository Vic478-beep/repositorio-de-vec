<?php
require_once("conexion.php");

function insertar($nombre, $apellido, $telefono) {
    $conn = conectar();
    $sql = "INSERT INTO usuario (nombre, apellido, telefono) VALUES ('" . $nombre . "', '" . $apellido . "', '" . $telefono . "')";
    if (mysqli_query($conn, $sql)) {
        echo "Datos insertados correctamente";
    } else {
        echo "Error al insertar datos: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
function listar() {
    $conn = conectar();
    $sql = "SELECT * FROM usuario";
    $r = mysqli_query($conn, $sql);
    $datos = array();
    while ($row = mysqli_fetch_assoc($r)) {
        $datos[] = $row;
    }
    mysqli_close($conn);
    return $datos;
}
?>
