<?php
require_once 'personagem.php';

class Sans extends Personagem {
    public function __construct() {
        parent::__construct("Sans", 30, 1, "Gaster Blaster");
    }

    public function falar() {
        return "huehuehue... quer ir comer um hot dog?";
    }
}
?>