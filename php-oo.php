<?php

declare(strict_types=1);

class ContaBancaria{
    private string $banco;
    private string $nomeTitular;
    private string $numeroAgencia;
    private string $numeroConta;
    private float $saldo;

    public function __construct(string $banco, string $nomeTitular, string $numeroAgencia, string $numeroConta, float $saldo){
        $this->banco = $banco;
        $this->nomeTitular = $nomeTitular;
        $this->numeroAgencia = $numeroAgencia;
        $this->numeroConta = $numeroConta;
        $this->saldo = $saldo;
    }

    public function obterSaldo():string{
        return 'Seu saldo atual é: R$' . $this->saldo;
    }

    public function depositar(float $valor):string{
        return 'Depósito: R$' . $this->saldo += $valor;
    }

    public function sacar(float $valor):string{
        return 'Saque: R$' . $this->saldo -= $valor;
    }
}

$conta = new ContaBancaria(
    'Bradesco',
    'Paulo Henrique',
    '1803',
    '82649-90',
    0
);

echo $conta->obterSaldo();

$conta->depositar(300.00);

echo PHP_EOL;

echo $conta->obterSaldo();

$conta->sacar(200.00);

echo PHP_EOL;

echo $conta->obterSaldo();

echo PHP_EOL;
echo PHP_EOL;

class Venda{
    private $data;
    private $produto;
    private $quantidade;
    private $valorTotal;

    public function __construct($data, $produto, $quantidade, $valorTotal){
        $this->data = $data;
        $this->produto = $produto;
        $this->quantidade = $quantidade;
        $this->valorTotal = $valorTotal;
    }

}

$venda = new Venda(
    '18/03/2004',
    'Meias',
    2,
    12.00
);

var_dump($venda);