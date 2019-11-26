<?php 

namespace Alura;


require 'autoload.php';

$correntistas = [
    "Giovanni",
    "João",
    "Maria",
    "Luís",
    "Luísa",
    "Rafael"
];

$saldos = [
    2500,
    3000,
    4400,
    1000,
    8700,
    9000,
];



$correntistasSaldos = array_combine($correntistas, $saldos);


array_key_exists("Joao", $correntistasSaldos);

if(array_key_exists("João", $correntistasSaldos)) {
    echo "O saldo de João é {$correntistasSaldos['João']}";
} else {
    echo "Não foi encontrado";
}

$maiores = ArrayUtils::encontrarPessoasComSaldoMaior(3000, $correntistasSaldos);
echo "<pre>";
var_dump($maiores);
echo "</pre>";

