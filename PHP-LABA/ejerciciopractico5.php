<?php
// Crear un programa para agregar productos a un array llamado carrito, eliminar un producto y calcular el total
$productos = [
    "laptop"=>6500,
    "television"=>2000,
    "parlante"=>500,
    "lavadora"=>1700,
];

$carrito = [];

function agregarAlCarrito(&$carrito, $producto, $cantidad) {
    if (isset($carrito[$producto])) {
        $carrito[$producto] += $cantidad;
    } else {
        $carrito[$producto] = $cantidad;
    }
}

function eliminarDelCarrito(&$carrito, $producto) {
    if (isset($carrito[$producto])) {
        unset($carrito[$producto]);
    }
}

function calcularTotal($carrito, $productos) {
    $total = 0;
    foreach ($carrito as $producto => $cantidad) {
        if (isset($productos[$producto])) {
            $total += $productos[$producto] * $cantidad;
        }
    }
    return $total;
}

agregarAlCarrito($carrito, "laptop", 1);
agregarAlCarrito($carrito, "parlante", 3);
agregarAlCarrito($carrito, "lavadora", 3);

eliminarDelCarrito($carrito, "parlante");

$total = calcularTotal($carrito, $productos);

echo "Contenido del carrito:\n";
print_r($carrito);
echo "Total del carrito: $" . $total . "\n";
?>