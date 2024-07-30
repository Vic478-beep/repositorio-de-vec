<?php
$competidores = [
    "Santiago Tapia" => 11.98,
    "Victor Taja" => 12.00,
    "Sebastian Zambrana" => 11.55,
    "Hugo Acosta" => 11.30,
    "Victor Hugo Saldaña" => 10.80,
    "Daniel Mancilla" => 12.35,
    "Jhon Serrano" => 11.90,
    "Juan Ovando" => 11.40,
    "Fernando Guzman" => 12.40,
    "Gabriel Quiroga" => 12.50,
];

asort($competidores);

$primeros = array_keys($competidores);

$ganador = $primeros[0];
$segundo_nombre = $primeros[1];
$tercer_nombre = $primeros[2];

$hora_ganador = $competidores[$ganador];
$hora_segundo = $competidores[$segundo_nombre];
$hora_tercer = $competidores[$tercer_nombre];

$diferencia_segundo = $hora_segundo - $hora_ganador;

$ultimo_nombre = end($primeros);
$hora_ultimo = $competidores[$ultimo_nombre];
echo "Competencia de 100mts planos Universidad Privada Domingo Savio";
echo "Ganador:<br> $ganador, con tiempo de: $hora_ganador segundos<br>";
echo "Diferencia del segundo respecto al primero: $diferencia_segundo segundos<br>";
echo "Último en llegar:<br> $ultimo_nombre, con tiempo de: $hora_ultimo segundos<br>";

echo "Tres primeros lugares:<br>";
echo "1. $ganador, con tiempo de: $hora_ganador segundos<br>";
echo "2. $segundo_nombre, con tiempo de: $hora_segundo segundos<br>";
echo "3. $tercer_nombre, con tiempo de: $hora_tercer segundos<br>";
?>
