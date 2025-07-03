<?php
abstract class Personagem {
    protected $nome;
    protected $forca;
    protected $defesa;
    protected $agilidade;
    protected $inteligencia;
    protected $vida;
    protected $classe;
    protected $raca;
    protected $imagem;
    protected $descricao;
    protected $racaImg;
protected $racaDescricao;

public function setRacaImg($img) {
    $this->racaImg = $img;
}

public function getRacaImg() {
    return $this->racaImg;
}

public function setRacaDescricao($desc) {
    $this->racaDescricao = $desc;
}

public function getRacaDescricao() {
    return $this->racaDescricao;
}

    public function __construct($nome, $raca) {
        $this->nome = $nome;
        $this->raca = $raca;
    }

    public function ataqueBasico() {
        return "Ataque Básico";
    }

    public function defender() {
        return "Defesa";
    }

    abstract public function habilidadeEspecial();


    public function getNome() { return $this->nome; }
    public function getForca() { return $this->forca; }
    public function getDefesa() { return $this->defesa; }
    public function getAgilidade() { return $this->agilidade; }
    public function getInteligencia() { return $this->inteligencia; }
    public function getVida() { return $this->vida; }
    public function getClasse() { return $this->classe; }
    public function getRaca() { return $this->raca; }
    public function getImagem() { return $this->imagem; }
    public function getDescricao() { return $this->descricao; }
}


class Cavaleiro extends Personagem {
    public function __construct($nome, $raca) {
        parent::__construct($nome, $raca);
        $this->classe = "Cavaleiro";
        $this->forca = 90;
        $this->defesa = 85;
        $this->agilidade = 60;
        $this->inteligencia = 50;
        $this->vida = 120;
        $this->imagem = "cavaleiro";
        $this->descricao = "Um guerreiro nobre especializado em armaduras pesadas e combate corpo a corpo.";
    }

    public function habilidadeEspecial() {
        return "Golpe de Espada Sagrada";
    }
}

class Arqueiro extends Personagem {
    public function __construct($nome, $raca) {
        parent::__construct($nome, $raca);
        $this->classe = "Arqueiro";
        $this->forca = 60;
        $this->defesa = 50;
        $this->agilidade = 90;
        $this->inteligencia = 70;
        $this->vida = 80;
        $this->imagem = "arqueiro";
        $this->descricao = "Mestre do arco e flecha, ataca à distância com precisão mortal.";
    }

    public function habilidadeEspecial() {
        return "Chuva de Flechas";
    }
}

class Feiticeiro extends Personagem {
    public function __construct($nome, $raca) {
        parent::__construct($nome, $raca);
        $this->classe = "Feiticeiro";
        $this->forca = 30;
        $this->defesa = 40;
        $this->agilidade = 50;
        $this->inteligencia = 100;
        $this->vida = 70;
        $this->imagem = "feiticeiro";
        $this->descricao = "Manipulador das forças mágicas, capaz de conjurar feitiços poderosos.";
    }

    public function habilidadeEspecial() {
        return "Bola de Fogo";
    }
}

class Assassino extends Personagem {
    public function __construct($nome, $raca) {
        parent::__construct($nome, $raca);
        $this->classe = "Assassino";
        $this->forca = 70;
        $this->defesa = 50;
        $this->agilidade = 100;
        $this->inteligencia = 80;
        $this->vida = 75;
        $this->imagem = "assassino";
        $this->descricao = "Mestre da furtividade e dos ataques precisos e letais.";
    }

    public function habilidadeEspecial() {
        return "Golpe das Sombras";
    }
}

class Druida extends Personagem {
    public function __construct($nome, $raca) {
        parent::__construct($nome, $raca);
        $this->classe = "Druida";
        $this->forca = 50;
        $this->defesa = 60;
        $this->agilidade = 70;
        $this->inteligencia = 90;
        $this->vida = 100;
        $this->imagem = "druida";
        $this->descricao = "Guardião da natureza, capaz de se transformar e invocar criaturas.";
    }

    public function habilidadeEspecial() {
        return "Transformação Animal";
    }
}


?>