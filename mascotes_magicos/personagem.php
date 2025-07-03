<?php
abstract class Personagem {
    protected $nome;
    protected $idade;
    protected $hp;
    protected $arma;

    public function __construct($nome, $idade, $hp, $arma) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->hp = $hp;
        $this->arma = $arma;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getIdade() {
        return $this->idade;
    }

    public function getHP() {
        return $this->hp;
    }

    public function getArma() {
        return $this->arma;
    }

    abstract public function falar();

    public function apresentar() {
        return "Nome: {$this->nome}\nIdade: {$this->idade}\nHP: {$this->hp}\nArma: {$this->arma}\nFala: {$this->falar()}";
    }
}
?>