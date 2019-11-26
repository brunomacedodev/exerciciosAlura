<?php

namespace Alura;

class Calculadora {

    public function calculaMedia(array $notas) : float
    {
        if (count($notas) == 0) {
            echo "Não há notas para cálculo da média";
        }

        $somaNotas = 0;
        for ($i=0 ; $i < count($notas); $i++) {
            $somaNotas = $somaNotas += $notas[$i];
        }

        $media = $somaNotas/count($notas);
        return $media;
    }
}