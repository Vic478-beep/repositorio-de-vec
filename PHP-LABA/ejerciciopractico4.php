<?php
$fecha1 = $_GET['a'];
$fecha2 = $_GET['b'];

$datotiempo1 = date_create($fecha1);
$datotiempo2 = date_create($fecha2);
$interval = date_diff($datotiempo1, $datotiempo2);
echo $interval->format('%R%a días')." Entre la fecha ".$fecha1." y la fecha ".$fecha2;
// ?a=11-07-2024&b=04-08-2024
?>