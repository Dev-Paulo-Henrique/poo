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


echo PHP_EOL;

// $data = new DateTime();
// echo $data->format('d/m/y H:i:s');

//DESAFIO

class Produto{
    private PDO $conexao;

    public function __construct(){
        try {
            $this->conexao = new PDO('mysql:host=localhost;dbname=moodle', 'root', '');
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function list():array{
        $sql = 'select * from aulas';

        $produtos = [];

        echo 'Aulas:' . PHP_EOL;

        foreach($this->conexao->query($sql) as $key => $value){
            array_push($produtos, $value);
            echo 'Id: ' . $value['id'] . PHP_EOL . 'Aluno: ' . $value['aluno'] . PHP_EOL . 'Descrição: ' . $value['descricao'];
        }

        return $produtos;
    }
    public function insert():int{
        $sqlinsert = "insert into aulas(id, aluno, descricao) values(1, 'Paulo Henrique', 'Nova aula')";

        $prepare = $this->conexao->prepare($sqlinsert);

        $prepare->bindParam(1, $_GET['id']);
        $prepare->bindParam(2, $_GET['aluno']);
        $prepare->bindParam(3, $_GET['descricao']);
        $prepare->execute();

        return $prepare->rowCount();
    }
    public function update():int{
        $sqlupdate = "update aulas set descricao = 'Segunda Aula', aluno = 'Prof Bruno' where id = 1";

        $prepare = $this->conexao->prepare($sqlupdate);

        $prepare->bindParam(1, $_GET['id']);
        $prepare->bindParam(2, $_GET['aluno']);
        $prepare->bindParam(3, $_GET['descricao']);
        $prepare->execute();

        return $prepare->rowCount();
    }
    public function delete():int{
        $sqldelete = "delete from aulas where id = 1";

        $prepare = $this->conexao->prepare($sqldelete);

        $prepare->bindParam(1, $_GET['id']);
        $prepare->bindParam(2, $_GET['aluno']);
        $prepare->bindParam(3, $_GET['descricao']);
        $prepare->execute();

        return $prepare->rowCount();
    }

}
$produto = new Produto();
// echo $produto->insert();
// echo $produto->update();
// echo $produto->delete();
echo $produto->list();