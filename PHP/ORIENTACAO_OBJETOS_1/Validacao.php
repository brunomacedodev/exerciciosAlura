<?php

class Validacao {

    public static function protegeAtributo($atributo)
    {
        if($atributo == "saldo" || $atributo == "titular"){
            throw new Exception ("O atributo $atributo é privado");
        }
    }
    
    public static function validaAtributoNumerico($valor)
    {
        if(!is_numeric($valor)){
            throw new Exception ("O valor passado não é numérico.");
        }
    }
}