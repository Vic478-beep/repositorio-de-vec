<?php
$producto=$_GET['nombre'];
$monto=$_GET['cantidad'];
$edad=$_GET['edad'];
$iva=$_GET['iva'];
$monto_iva=0;
echo "PRIMER EJERCICIO:";
echo "<br>";
function ConIva($monto):float
{
    $monto_iva=$monto+($monto*0.13);
    return $monto_iva;
};
function SinIva($monto):float
{
    $monto_iva=$monto-($monto*0.13);
    return $monto_iva;
};
try {
    echo "Resultado ".($iva==true)?(ConIva
    ($monto)):(SinIva($monto));
} catch (TypeError $e) {
    echo "Error ".$e->getMessage();
}
echo "Edad".($edad>=18)?" Puedes realizar la compra":" No puedes realizar la compra";
//SEGUNDO EJERCICIO
//ARRAY DE NOTAS Y CALCULAR EL PROMEDIO DE 10 ESTUDIANTES
function promedio(int | float ...$notas):int | float
{
    $suma=0;
    $prom=0;
    foreach($notas as $nota){
        $suma+=$nota;
    }
    return $prom=$suma/count($notas);
    // yield $suma;
    // yield $nota;
}
echo "<br>";
echo "SEGUNDO EJERCICIO:";
echo "<br>";
echo "El promedio de notas es ".promedio(45,56.5,34,22.8,69);
?>