<?php
$usuario = "admxinisxtrador";
$contraseña = "1234";
$repetir = "1234";

print("Si la variable contraseña es igual o diferente a la variable");
echo "<br>";
echo $contraseña === $repetir ? "true<br>" : "false<br>";

$division = explode("x", $usuario);
var_dump ($division);

echo "<br>";
print("0 si no existe m y 1 si existe m");
echo "<br>";
print("Parte 1: ");
echo $division[0];
echo " ";
echo substr_count($division[0], "m");
echo "<br>";
print("Parte 2: ");
echo $division[1];
echo " ";
echo substr_count($division[1], "m");
echo "<br>";
print("Parte 3: ");
echo $division[2];
echo " ";
echo substr_count($division[2], "m");
?>