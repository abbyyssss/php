<?php
// parte 1, criando as parada

class Player{
    public $nome = null;
    public $classe = null;
    public $origem = null;

    function resumircadPlayer(){
        return "Nome: $this->nome, Classe: $this->classe, Origem: $this->origem";
    }

    function modificarFuncao($nome, $classe, $origem){
        $this->nome = $nome;
        $this->classe = $classe;
        $this->origem = $origem;
    }
}

// parte 2, criando os objetos
$player1 = new Player();
echo "<br>";
$player1->modificarFuncao("Gandalf", "Mago", "Valinor");
echo $player1->resumircadPlayer();

echo "<hr>";

$player2 = new Player();
echo "<br>";
$player2->modificarFuncao("Frodo", "Hobbit", "Shire");
echo $player2->resumircadPlayer();
echo "<hr>";

?>