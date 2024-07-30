<?php
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : "";
$email = isset($_POST['correo']) ? $_POST['correo'] : "";
$comentario = isset($_POST['comentarios']) ? $_POST['comentarios'] : "";
$idioma = isset($_POST['idioma']) ? $_POST['idioma'] : "";
$musica = isset($_POST['musica']) ? $_POST['musica'] : "";
$pasatiempo = isset($_POST['pasatiempo']) ? $_POST['pasatiempo'] : [];

$errores = [];

if (empty($nombre)) {
    $errores[] = '<label style="color:red">Error: el nombre está vacío</label>';
} elseif (strlen($nombre) < 3 || strlen($nombre) > 20) {
    $errores[] = '<label style="color:red">Error: el nombre debe tener entre 3 y 20 caracteres</label>';
}

if (empty($apellido)) {
    $errores[] = '<label style="color:red">Error: el apellido está vacío</label>';
} elseif (strlen($apellido) < 3 || strlen($apellido) > 20) {
    $errores[] = '<label style="color:red">Error: el apellido debe tener entre 3 y 20 caracteres</label>';
}

if (empty($email)) {
    $errores[] = '<label style="color:red">Error: el email está vacío</label>';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores[] = '<label style="color:red">Error: el formato del email es incorrecto</label>';
}

if (empty($comentario)) {
    $errores[] = '<label style="color:red">Error: el comentario está vacío</label>';
} elseif (strlen($comentario) < 5 || strlen($comentario) > 50) {
    $errores[] = '<label style="color:red">Error: el comentario debe tener entre 6 y 50 caracteres</label>';
} elseif (preg_match('/[\*\.\@\/]/', $comentario)) {
    $errores[] = '<label style="color:red">Error: el comentario no debe contener *, ., @ ni /</label>';
}

if (empty($idioma)) {
    $errores[] = '<label style="color:red">Error: el idioma está vacío</label>';
}

if (empty($musica)) {
    $errores[] = '<label style="color:red">Error: la música está vacía</label>';
}

if (empty($pasatiempo)) {
    $errores[] = '<label style="color:red">Error: el pasatiempo está vacío</label>';
}

if (!empty($errores)) {
    foreach ($errores as $error) {
        echo $error . "<br>";
    }
} else {
    echo "Nombre: " . $nombre . "<br>";
    echo "Apellido: " . $apellido . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Comentario: " . $comentario . "<br>";
    echo "Idioma: " . $idioma . "<br>";
    echo "Música: " . $musica . "<br>";
    echo "Pasatiempos:<br><pre>";
    foreach ($pasatiempo as $value) {
        echo " " . $value . " ";
    }
    echo "</pre>";
}
?>
