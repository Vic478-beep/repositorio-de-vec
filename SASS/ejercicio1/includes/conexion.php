<?php
function conectar() {
    $conn = mysqli_connect("localhost", "root", "", "tw2");
    if (!$conn) {
        die("Error en la conexión: " . mysqli_connect_error());
    }
    return $conn;
}
?>
