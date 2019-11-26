<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

require 'ContaCorrente.php';

$contaJoao = new ContaCorrente('Joao', '1212', '343477-1', 2000.0);
$contaMaria = new ContaCorrente('Maria',  '1212', '343423-1', 6000.0);
$contaJose = new ContaCorrente('Jose', '1212', '343423-9', 6000.00);
$contaFernanda = new ContaCorrente('Fernanda', '1212', '343423-7', 6000.00);
$contaBernardo = new ContaCorrente('Bernardo', '1212', '343423-6', 6000.00);
$contaFelipe = new ContaCorrente('Felipe', '1212', '343423-5', 6000.00);
$contaLucas = new ContaCorrente('Lucas', '1212', '343423-4', 6000.00);

echo "<br>";
echo "total de contas:" . ContaCorrente::$totalDeContas;
echo "<br>";
echo "taxa:" . ContaCorrente::$taxaOperacao;
echo "<br>";

echo '<h2>Contas Correntes</h2>';


// echo "<h2>ContaCorrente: Titular: ".$contaJoao->getTitular()."</h2>";
// var_dump($contaJoao);
echo "<pre>";
var_dump($contaJoao);
var_dump($contaMaria);
echo "</pre>";

try{
    $contaJoao->transferir(-1, $contaMaria);
} catch (Exception $erro) {
    echo $erro->getMessage();
}




echo "<pre>";
var_dump($contaJoao);
var_dump($contaMaria);
echo "</pre>";