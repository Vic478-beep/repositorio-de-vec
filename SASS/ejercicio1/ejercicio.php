<?php
if (isset($_POST['nombre'])) {
    $nombre="galleta";
    $valor=$_POST['nombre']."|".$_POST['password'];
    $fecha=time()+(60*60*24);
    setcookie($nombre,$valor,$fecha);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Inserta tu nombre:</label>
        <input type="text" name="nombre" id="">
        <br>
        <label for="">Inserta la contraseña:</label>
        <input type="password" name="password" id="" value="<?php
            echo ($recordar=="on")?$contraseña:'';
            ?>">
        <br>
        <p>
            <?php
            if (isset($_COOKIE['galleta'])) {
                $datos=$_COOKIE['galleta'];
                $datos_array=explode("|",$datos);
                $usuario=$datos_array[0];
                $contraseña=$datos_array[1];
                $recordar="on";
            }
            ?>
        </p>
        <label for="">¿Recordar la contraseña?:</label>
        <input type="checkbox" name="recordar" id=""
        <?php
        if ($recordar=='on') {
            echo 'checked';
        }
        ?>>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>