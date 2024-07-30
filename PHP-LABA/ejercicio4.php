<?php
//SENTENCIA IF
$compra=$_GET['c'];
$puntos=0;
if ($compra >=50 && $compra<=100) {
    $puntos=$puntos+50;
}
elseif ($compra > 100 && $compra <=200) {
    $puntos = $puntos+15;
}
elseif ($compra>200 && $compra<=500) {
    $puntos = $puntos+30;
}
elseif ($compra>500){
    $puntos=$puntos+60;
}
echo "Cantidad de puntos ".$puntos;

// //SENTENCIA IF MANERA TERNARIA
$compra = $_GET['c'];
$puntos = 0;

$puntos = ($compra >= 50 && $compra <= 100) ? $puntos + 50 : 
          (($compra > 100 && $compra <= 200) ? $puntos + 15 : 
          (($compra > 200 && $compra <= 500) ? $puntos + 30 : 
          (($compra > 500) ? $puntos + 60 : $puntos)));

echo "Cantidad de puntos " . $puntos;
// //SENTENCIA SWITCH
$compra = $_GET['c'];
$puntos = 0;

switch (true) {
    case ($compra >= 50 && $compra <= 100):
        $puntos += 50;
        break;
    case ($compra > 100 && $compra <= 200):
        $puntos += 15;
        break;
    case ($compra > 200 && $compra <= 500):
        $puntos += 30;
        break;
    case ($compra > 500):
        $puntos += 60;
        break;
}

echo "Cantidad de puntos " . $puntos;
//WHILE
$inferior=$_GET['i'];
$superior=$_GET['s'];
$c=0;
while ($inferior <= $superior) {
    echo $inferior;
    if ($inferior%7==0) {
        $c++;
    }
    $inferior++;
}
echo "Contador: ".$c;
//Foreach
$electrodomesticos=[
    ["nombre"=>"Televisor",
    "precio" => 400,
    "estado" => true],
    ["nombre"=>"Heladera",
    "precio" => 300,
    "estado" => false],
    ["nombre"=>"Bicicleta",
    "precio" => 100,
    "estado" => true],
];
foreach ($electrodomesticos as $productos) {
    echo $productos['nombre']."<br>";
    echo $productos['precio']."<br>";
    echo ($productos['estado'])?"Disponible":"No Disponible"."<br>";//NO ES NECESARIO PONER EN LA CONDICION SI ESTADO ES == A TRUE, SOLO PARA VALORES NUMERICOS
};

echo "<pre>";
var_dump($electrodomesticos);
echo "</pre>"
?>