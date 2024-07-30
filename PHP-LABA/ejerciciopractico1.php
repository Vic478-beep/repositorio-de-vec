<?php
// Capturar las cadenas y los números desde $_GET
$cadenas = isset($_GET['cadenas']) ? explode(',', $_GET['cadenas']) : [];
$numeros = isset($_GET['numeros']) ? explode(',', $_GET['numeros']) : [];

// Convertir los elementos de $numeros a enteros
$numeros = array_map('intval', $numeros);

// Mostrar el contenido de los arrays
echo "Array de cadenas:<br>";
var_dump($cadenas);
echo "<br>";

echo "Array de números:<br>";
var_dump($numeros);
echo "<br>";

// Verificar que hay al menos 3 números para las comparaciones
if (count($numeros) >= 3) {
    $num1 = $numeros[0];
    $num2 = $numeros[1];
    $num3 = $numeros[2];

    // Comparaciones
    echo "Comparaciones entre números:<br>";

    // num1 vs num2
    echo "Comparaciones entre num1 y num2:<br>";
    if ($num1 > $num2) {
        echo "El número $num1 es mayor que $num2<br>";
    } elseif ($num1 < $num2) {
        echo "El número $num1 es menor que $num2<br>";
    } else {
        echo "El número $num1 es igual a $num2<br>";
    }

    // num2 vs num1 (reversed)
    if ($num2 > $num1) {
        echo "El número $num2 es mayor que $num1<br>";
    } elseif ($num2 < $num1) {
        echo "El número $num2 es menor que $num1<br>";
    } else {
        echo "El número $num2 es igual a $num1<br>";
    }

    // num2 vs num3
    echo "Comparaciones entre num2 y num3:<br>";
    if ($num2 > $num3) {
        echo "El número $num2 es mayor que $num3<br>";
    } elseif ($num2 < $num3) {
        echo "El número $num2 es menor que $num3<br>";
    } else {
        echo "El número $num2 es igual a $num3<br>";
    }

    // num3 vs num2 (reversed)
    if ($num3 > $num2) {
        echo "El número $num3 es mayor que $num2<br>";
    } elseif ($num3 < $num2) {
        echo "El número $num3 es menor que $num2<br>";
    } else {
        echo "El número $num3 es igual a $num2<br>";
    }

    // num1 vs num3
    echo "Comparaciones entre num1 y num3:<br>";
    if ($num1 > $num3) {
        echo "El número $num1 es mayor que $num3<br>";
    } elseif ($num1 < $num3) {
        echo "El número $num1 es menor que $num3<br>";
    } else {
        echo "El número $num1 es igual a $num3<br>";
    }

    // num3 vs num1 (reversed)
    if ($num3 > $num1) {
        echo "El número $num3 es mayor que $num1<br>";
    } elseif ($num3 < $num1) {
        echo "El número $num3 es menor que $num1<br>";
    } else {
        echo "El número $num3 es igual a $num1<br>";
    }
} else {
    echo "Se requieren al menos 3 números para las comparaciones.<br>";
}
?>
