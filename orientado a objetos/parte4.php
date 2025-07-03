<?php
 
class Caneta {
 
    public $cor = null;
 
    // Iniciando bagui obrigatorio
    function __construct($cor) {
        echo 'Caneta fabricada: <br/>';
        $this->cor = $cor;
    }
 
    function __destruct() {
        echo '<br/> Caneta quebrada';
    }
 
    function __get($atributo) {
        return $this->$atributo;
    }
 
    function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }
 
    function escrever() {
        return '<br/> Caneta ' . $this->__get('cor') . ' está escrevendo: "caneta azul, azul caneta"';
    }
}
 
//caneta 1
$caneta = new Caneta('azul');
echo '<br/> Cor: ' . $caneta->__get('cor');
echo $caneta->escrever();
 
$caneta->__set('cor', 'vermelha');
echo '<br/><br/> Cor atualizada: ' . $caneta->__get('cor');
echo $caneta->escrever();
echo "<br/>";
//destruindo
unset($caneta);
echo "<hr>";
 
//caneta 2
$caneta2 = new Caneta('preta');
echo '<br/> Cor: ' . $caneta2->__get('cor');
echo $caneta2->escrever();
//destruindo
unset($caneta2);
 
?>