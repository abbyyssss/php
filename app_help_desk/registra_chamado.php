<?php
    require_once "validador_acesso.php";

    
    $id = str_replace('|', '-', $_SESSION['id']);
    $perfil = str_replace('|', '-', $_SESSION['perfil']);
    $nome = str_replace('|', '-', $_SESSION['nome']);
    $titulo = str_replace('|', '-', $_POST['titulo']);
    $categoria = str_replace('|', '-', $_POST['categoria']);
    $descricao = str_replace('|', '-', $_POST['descricao']);
    
   
    $dados = $id . '|' . $perfil . '|'  . $nome . '|' . $titulo . '|' . $categoria . '|' . $descricao . PHP_EOL;

    var_dump($dados);

    //Abrindo o arquivo e armazenando em uma variável
    $arquivo = fopen('registros.hd','a'); // esse 'a' significa "Abre somente para escrita; coloca o ponteiro do arquivo no final do arquivo. Se o arquivo não existir, tenta criá-lo. Neste modo, fseek() não tem efeito, a escrita é sempre adicionada."
    
    
    fwrite($arquivo, $dados);
    
    fclose($arquivo);

   
    header('location: abrir_chamado.php?cadastro=efetuado')
?>