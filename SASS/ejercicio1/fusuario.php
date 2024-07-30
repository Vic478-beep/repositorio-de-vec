<?php
require_once("includes/funciones.php");

// Inicializar variables para almacenar errores y valores de campos
$nombre = $apellido = $telefono = "";
$nombreErr = $apellidoErr = $telefonoErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar nombre
    if (empty($_POST["nombre"])) {
        $nombreErr = "El nombre es requerido";
    } elseif (strlen($_POST["nombre"]) > 20) {
        $nombreErr = "El nombre no debe exceder los 20 caracteres";
    } else {
        $nombre = test_input($_POST["nombre"]);
    }

    // Validar apellido
    if (empty($_POST["apellido"])) {
        $apellidoErr = "El apellido es requerido";
    } elseif (strlen($_POST["apellido"]) > 20) {
        $apellidoErr = "El apellido no debe exceder los 20 caracteres";
    } else {
        $apellido = test_input($_POST["apellido"]);
    }

    // Validar teléfono
    if (empty($_POST["telefono"])) {
        $telefonoErr = "El teléfono es requerido";
    } elseif (strlen($_POST["telefono"]) > 11) {
        $telefonoErr = "El teléfono no debe exceder los 11 caracteres";
    } else {
        $telefono = test_input($_POST["telefono"]);
    }

    // Si no hay errores, insertar datos en la base de datos
    if (empty($nombreErr) && empty($apellidoErr) && empty($telefonoErr)) {
        insertar($nombre, $apellido, $telefono);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$usuarios = listar();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Validación</title>
</head>
<body>
    <h2>Formulario de Contacto</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Nombre: <input type="text" name="nombre" value="<?php echo $nombre; ?>">
        <span style="color: red;"><?php echo $nombreErr; ?></span>
        <br><br>
        Apellido: <input type="text" name="apellido" value="<?php echo $apellido; ?>">
        <span style="color: red;"><?php echo $apellidoErr; ?></span>
        <br><br>
        Teléfono: <input type="text" name="telefono" value="<?php echo $telefono; ?>">
        <span style="color: red;"><?php echo $telefonoErr; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nombreErr) && empty($apellidoErr) && empty($telefonoErr)) {
        echo "<h3>Datos recibidos y almacenados:</h3>";
        echo "Nombre: " . $nombre . "<br>";
        echo "Apellido: " . $apellido . "<br>";
        echo "Teléfono: " . $telefono;
    }
    ?>

    <h2>Lista de Usuarios</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Teléfono</th>
        </tr>
        <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?php echo $usuario['id']; ?></td>
            <td><?php echo $usuario['nombre']; ?></td>
            <td><?php echo $usuario['apellido']; ?></td>
            <td><?php echo $usuario['telefono']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
