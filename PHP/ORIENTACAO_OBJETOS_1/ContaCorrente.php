<?php

class ContaCorrente {
    private $titular;
    private $agencia;
    private $numero;
    private $saldo;

    public function __construct($titular, $agencia, $numero, $saldo)
    {
        $this->titular = $titular;
        $this->agencia = $agencia;
        $this->numero = $numero;
        $this->saldo = $saldo;
    }

    public function sacar($valor)
    {
        $this->saldo = $this->saldo - $valor;
        return $this;
    }
    
    public function depositar($valor)
    {
        $this->saldo = $this->saldo + $valor;
        return $this;
    }
    
    public function transferir($valor, ContaCorrente $contaCorrente)
    {
        Validacao::validaAtributoNumerico($valor);
        $this->sacar($valor);
        $contaCorrente->depositar($valor);
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
        return $this->$atributo = $valor;
        
    }
   
    public function setNumero()
    {
        return $this->numero = $numero;
    }

    public function getSaldo()
    {
        return $this->formataSaldo("saldo");
    }

    private function formataSaldo()
    {
        return "R$ " . number_format($this->saldo, 2, ",", ".");
    }

    public function __toString()
    {
        return "Titular da conta: ".$this->titular."<br> O eu saldo atual é de ".$this->formataSaldo('saldo');
    }
}