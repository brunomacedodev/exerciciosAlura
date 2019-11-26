<?php
require_once 'Validacao.php';

class ContaCorrente
{

    private $titular;
    private $agencia;
    private $numero;
    private $saldo;
    public static $totalDeContas;
    public static $taxaOperacao;

    public function __construct($titular, $agencia, $numero, $saldo)
    {
        Validacao::verificaNumerico($saldo);
        $this->titular = $titular;
        $this->agencia = $agencia;
        $this->numero = $numero;
        $this->saldo = $saldo;
        self::$totalDeContas ++;
        
        try {
            if(self::$totalDeContas < 1){
                throw new Exception ("Valor inferior a zero");
            }
            self::$taxaOperacao = (30 / self::$totalDeContas);
        } catch(Exception $erro) {
            echo $erro->getMessage();
            exit;
        }
        
        
    }

    public function sacar($valor)
    {
        Validacao::verificaNumerico($valor);
        $this->saldo -= $valor;
        return $this;
    }

    public function depositar($valor)
    {
        Validacao::verificaNumerico($valor);
        $this->saldo += $valor;
        return $this;
    }

    public function __get($atributo)
    {
        Validacao::protegeAtributo($atributo);
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        Validacao::protegeAtributo($atributo);
        $this->$atributo = $valor;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
        return $this;
    }

    private function formataSaldo()
    {
        return 'R$ ' . number_format($this->saldo, 2, ',', '.');
    }

    public function transferir($valor, ContaCorrente $contaCorrente)
    {
        Validacao::verificaNumerico($valor);
        
        if($valor < 0) {
            throw new InvalidArgumentException("O valor não é permitido");
        }

        $this->sacar($valor);
        
        $contaCorrente->depositar($valor);
        return $this;
    }

    public function __toString()
    {
        return "O titular " . $this->titular . " possui " . $this->formataSaldo();
    }
}