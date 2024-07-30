<?php
$nombre = $apellido = $carrera = "";
$nombreErr = $apellidoErr = $carreraErr = "";
$archivo = "estudiantes.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nombre"])) {
        $nombreErr = "Nombre es requerido";
    } else {
        $nombre = test_input($_POST["nombre"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $nombre)) {
            $nombreErr = "Solo se permiten letras y espacios en blanco";
        }
    }

    if (empty($_POST["apellido"])) {
        $apellidoErr = "Apellido es requerido";
    } else {
        $apellido = test_input($_POST["apellido"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $apellido)) {
            $apellidoErr = "Solo se permiten letras y espacios en blanco";
        }
    }

    if (empty($_POST["carrera"])) {
        $carreraErr = "Carrera es requerida";
    } else {
        $carrera = test_input($_POST["carrera"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $carrera)) {
            $carreraErr = "Solo se permiten letras y espacios en blanco";
        }
    }

    if (empty($nombreErr) && empty($apellidoErr) && empty($carreraErr)) {
        // Guarda los datos en el archivo
        if (touch($archivo)) {
            $datos = fopen($archivo, "a"); // Abre el archivo en modo "a" para añadir al final
            fwrite($datos, "Nombre: $nombre\nApellido: $apellido\nCarrera: $carrera\n\n");
            fclose($datos);
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO PRACTICO 9</title>
</head>
<body>
    <h1>FORMULARIO ESTUDIANTIL</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $nombre; ?>">
        <span><?php echo $nombreErr; ?></span><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" value="<?php echo $apellido; ?>">
        <span><?php echo $apellidoErr; ?></span><br><br>

        <label for="carrera">Carrera:</label>
        <input type="text" name="carrera" value="<?php echo $carrera; ?>">
        <span><?php echo $carreraErr; ?></span><br><br>

        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nombreErr) && empty($apellidoErr) && empty($carreraErr)) {
        echo "<h2>Datos recibidos:</h2>";
        echo "Nombre: $nombre<br>";
        echo "Apellido: $apellido<br>";
        echo "Carrera: $carrera<br>";
    }
    ?>
</body>
</html>
