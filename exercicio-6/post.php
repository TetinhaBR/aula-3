<?php
    use Fagoc\Calculadora;
    var_dump($_POST);

    $valor1 = post('valor1');
    $valor2 = post('valor2');
    $operador = post('operador');

    $calculadora = new Calculadora();

    $calculadora->calcular($valor1, $valor2, $operador);
