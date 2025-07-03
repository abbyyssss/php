<?php
    require_once "validador_acesso.php";
    require 'config.php';

    // Verifica se os campos necessários foram enviados
    if (isset($_POST['nome'], $_POST['email'], $_POST['perfil'], $_POST['id_usuario'])) {
        
        // Previne SQL Injection
        $nome = $conexao->real_escape_string($_POST['nome']);
        $email = $conexao->real_escape_string($_POST['email']);
        $perfil = $conexao->real_escape_string($_POST['perfil']);
        $id_usuario = (int)$_POST['id_usuario']; // Converte para inteiro (segurança)

        // Query corrigida (sem 'valor')
        $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', perfil = '$perfil' WHERE id_usuario = $id_usuario";

        $res = $conexao->query($sql);

        if ($res) {
            header('Location: usuarios.php?edicao=sucesso');
        } else {
            header('Location: usuarios.php?edicao=falha');
        }
        exit;
    } else {
        // Campos faltando? Redireciona com erro
        header('Location: usuarios.php?edicao=falha');
        exit;
    }
?>