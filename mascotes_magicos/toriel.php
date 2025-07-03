<?php
require_once 'personagem.php';

class Toriel extends Personagem {
    public function __construct() {
        parent::__construct("Toriel", 200, 80, "Fogo Mágico");
    }

    public function falar() {
        return "Meu filho, você está bem? Quer uma torta de caramelo?";
    }
}
?>