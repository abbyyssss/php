<?php
require_once 'personagem.php';

class Frisk extends Personagem {
    public function __construct() {
        parent::__construct("Frisk", 12, 20, "Punhos");
    }

    public function falar() {
        return "...";
    }
}
?>