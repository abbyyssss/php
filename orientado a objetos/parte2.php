<?php
class Pokemon {
    public $nome = null;
    public $tipo = null;
    public $tipo2 = null;
    public $nivel = null;
    public $regiao = null;

    function setNome ($nome) {
        $this->nome = $nome;
    }

function getNome () {
    return $this->nome;
}

function setTipo ($tipo) {
    $this->tipo = $tipo;
}
function getTipo () {
    return $this->tipo;
}
function setTipo2 ($tipo2) {
    $this->tipo2 = $tipo2;
}
function getTipo2 () {
    return $this->tipo2;
}
function setNivel ($nivel) {
    $this->nivel = $nivel;
}
function getNivel () {
    return $this->nivel;
}
function __set($atributo, $valor) {
    $this->atributo = $valor;
}
function __get($atributo) {
    return $this->atributo;
}


function resumirPokemon() {
    return "Nome: $this->nome, Tipo: $this->tipo, Tipo2: $this->tipo2, Nivel: $this->nivel, Regiao: $this->regiao";
}
}

$snorlax = new Pokemon();
$snorlax->setNome("Snorlax");
$snorlax->setTipo("Normal");
$snorlax->setTipo2("Nenhum");
$snorlax->setNivel(30);
$snorlax->regiao = "Kanto";

echo "Teste pokemon<br>";
echo $snorlax->resumirPokemon();
echo "<br>";

// usando o __get e __set
echo "<br>usando o __get e __set<br>";
$gardevoir = new Pokemon();
$gardevoir->__set("regiao", "Hoenn");
$gardevoir->__set("nivel", 30);
$gardevoir->__set("tipo", "Psíquico");
$gardevoir->__set("tipo2", "Fada");
$gardevoir->__set("nome", "Gardevoir");


echo "Nome: " . $gardevoir->__get("nome") . "<br>";
echo "<br>";


?>