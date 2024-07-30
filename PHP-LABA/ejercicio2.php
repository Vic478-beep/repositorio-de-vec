<?php
$cliente="Juan Perez";
//SABER EL TAMAÑO DE LA CADENA
print(strlen($cliente));
echo "<br>";
var_dump($cliente);
//LIMPIAR ESPACIOS EN BLANCO
$texto = " Juan Lopez ";
var_dump($texto);
$texto2=strlen(trim($texto));
echo $texto2."<br>";
//CONVERTIR MAYUSCULAS Y MINUSCULAS
echo (strtolower($cliente));
echo "<br>";
echo (strtoupper($texto));
var_dump(strtolower($cliente)===strtolower($texto));
//REEMPLAZAR
echo "<br>";
echo str_replace("Juan", "Jose",$cliente); //VALOR A BUSCAR(JUAN) - VALOR A CAMBIAR(JOSE)
//BUSCAR POSICION
echo "<br>";
echo strpos($cliente, "Pedro");
//BUSCAR 
echo substr_count($cliente, "se");
//DIVIDIR CADENA
$cadena=explode("e",$texto);
var_dump($cadena);
//UNIR CADENA
$cadena = implode("e",$cadena);
var_dump($cadena);
?>