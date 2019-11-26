<?php
require_once('Validacao.php');
require_once('ContaCorrente.php');

echo "<h1>Contas Corrente</h1>";

$contaJoao = new ContaCorrente("João", "1212", "3434-4", 2000.00);
$contaMaria = new ContaCorrente("Maria", "1212", "3434-5", 6000.00);



echo $contaJoao->saldo;



