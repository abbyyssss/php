<?php
class BlueLock{
    public $nome = null;
    public $posicao = null;
    public $preco = null;

    function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }
    function __get($atributo) {
        return $this->$atributo;
    }
    function escrever(){
        return "{$this -> __get('nome')} é um {$this -> __get('posicao')} e custa {$this -> __get('preco')} <br/> <hr>";
    }
}

$isagi = new BlueLock();
$kaiser = new BlueLock();
$donLorenzo = new BlueLock();

$isagi-> __set('nome', 'Isagi');
$isagi-> __set('posicao', 'Atacante');
$isagi-> __set('preco', '250M');

$kaiser-> __set('nome', 'Michael Kaiser');
$kaiser-> __set('posicao', 'Atacante');
$kaiser-> __set('preco', '340M');

$donLorenzo-> __set('nome', 'Don Lorenzo');
$donLorenzo-> __set('posicao', 'Líbero');
$donLorenzo-> __set('preco', '240M');

echo $isagi->escrever();
echo $kaiser->escrever();
echo $donLorenzo->escrever();


?>