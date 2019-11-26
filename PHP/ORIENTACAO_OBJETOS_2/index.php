<?php
require_once('autoload.php');

use classes\funcionarios\Diretor;
use classes\funcionarios\Designer;
use classes\abstratas\Funcionario;
use classes\sistemaInterno\GerenciadorBonificacao;

$diretor = new Diretor("334.490.848-01", 50000.00);
$diretor->senha = "123456";

$designer = new Designer("334.490.848-02", 1000.00);

$gerenciador = new GerenciadorBonificacao();

$gerenciador->AutentiqueAqui($diretor, "123456");
$gerenciador->registrar($diretor);



// echo $designer->getBonificacao();

// echo $diretor->getBonificacao();

// echo $designer->aumentarSalario();
// echo $diretor->aumentarSalario();

echo "<pre>";
var_dump($diretor, $designer);
echo "</pre>";

echo $diretor->aumentarSalario();
echo $designer->aumentarSalario();

echo "<pre>";
var_dump($diretor, $designer);
echo "</pre>";