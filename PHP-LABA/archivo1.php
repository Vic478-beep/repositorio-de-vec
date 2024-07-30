<?php
$carpeta="prueba/";
$archivo="ejercicio1.php";
echo (file_exists($archivo))?"Archivo Existente":"Archivo no Existe";
echo "<br>";
echo(is_file($archivo))?"Archivo existente":"Archivo no existe";
echo "<br>";
echo(is_dir($carpeta))?"Carpeta existente":"Carpeta no existe";
echo "<br>";
//
$archivo2="vec.jpg";
if (file_exists($carpeta.$archivo2)) {
    $size=filesize($carpeta.$archivo2);
    $kb=$size/1024;
    $mb=$kb/1024;
    $creado=filectime($carpeta.$archivo2);
    $creado_fecha=date("d/m/Y H:i:s", $creado);
    $modificado=filemtime($carpeta.$archivo2);
    $modificado_fecha=date("d/m/Y H:i:s", $modificado);
    echo "Tamaño: ".$mb."<br>";
    echo "Creado: ".$creado_fecha."<br>";
    echo "Modificado: ".$modificado_fecha."<br>";
}
else {
    echo "Archivo no existe";
}
?>