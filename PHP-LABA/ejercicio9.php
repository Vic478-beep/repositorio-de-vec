<?php
$archivo="prueba.txt";
echo (touch($archivo))?"Archivo existe":"Archivo no existe"; //crea el txt, si existe no crea
echo "<br>";
// var_dump($datos);
// fclose($archivo); //cerrar el txt
if (touch($archivo)) {
    $datos=fopen($archivo, "w"); //preparar el txt para escribir
    fwrite($datos, "Hoy es lunes\n");
    fwrite($datos, "Hoy es lunes de clases\n");
    fclose($datos);//guardamos
    $datos=fopen($archivo, "r");
    while (!feof($datos)) {
        $linea=fgets($datos, 1024);
        echo $linea."<br>";
    }
    fclose($datos);
}
else
?>