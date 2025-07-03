<?php
require_once 'personagem.php';

class Papyrus extends Personagem {
    public function __construct() {
        parent::__construct("Papyrus", 17, 680, "Ossos");
    }

    public function falar() {
        return "NYEH HEH HEH!";
    }
}
?>