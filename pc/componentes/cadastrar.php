<?php
require_once '../includes/conexao.php';
require_once '../includes/autenticacao.php';
require_once '../includes/funcoes.php';

$titulo = "Cadastrar Componente - PCzin";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($titulo) ?></title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header class="cabecalho">
        <div class="container">
            <div class="navegacao">
                <div class="logo">
                    <a href="../dashboard.php">PCzin</a>
                </div>
                
                <ul class="menu">
                    <li><a href="../dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
                    <li><a href="listar.php"><i class="fas fa-microchip"></i> Componentes</a></li>
                    <?php if ($_SESSION['usuario']['perfil'] == 'admin'): ?>
                        <li><a href="../usuarios/listar.php"><i class="fas fa-users"></i> Usuários</a></li>
                    <?php endif; ?>
                </ul>
                
                <div class="usuario-info">
                    <span><?= htmlspecialchars($_SESSION['usuario']['nome']) ?></span>
                    <a href="../logout.php" class="btn btn-sm btn-danger"><i class="fas fa-sign-out-alt"></i></a>
                </div>
            </div>
        </div>
    </header>

    <main class="conteudo-principal">
        <div class="container">
            <h1><?= htmlspecialchars($titulo) ?></h1>
            
            <?php if (!empty($erros)): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($erros as $erro): ?>
                            <li><?= htmlspecialchars($erro) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="form-group">
                    <label for="nome">Nome do Componente</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                
                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <input type="text" id="tipo" name="tipo" required>
                </div>
                
                <div class="form-group">
                    <label for="especificacoes">Especificações</label>
                    <textarea id="especificacoes" name="especificacoes" rows="5"></textarea>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="quantidade">Quantidade</label>
                        <input type="number" id="quantidade" name="quantidade" min="1" value="1" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="valor">Valor Unitário</label>
                        <input type="text" id="valor" name="valor" class="money" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" required>
                            <option value="disponivel" selected>Disponível</option>
                            <option value="esgotado">Esgotado</option>
                            <option value="reservado">Reservado</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="listar