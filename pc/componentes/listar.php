<?php
require_once '../includes/conexao.php';
require_once '../includes/autenticacao.php';
require_once '../includes/funcoes.php';

$titulo = "Lista de Componentes - PCzin";
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
            
            <?php if (isset($_GET['sucesso'])): ?>
                <div class="alert alert-success">Operação realizada com sucesso!</div>
            <?php endif; ?>
            
            <div class="table-actions">
                <a href="cadastrar.php" class="btn btn-success">Novo Componente</a>
            </div>
            
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Quantidade</th>
                            <th>Valor Unitário</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dados dinâmicos aqui -->
                        <tr>
                            <td>Processador Intel i7</td>
                            <td>CPU</td>
                            <td>5</td>
                            <td>R$ 1.200,00</td>
                            <td><span class="badge badge-verde">Disponível</span></td>
                            <td>
                                <a href="visualizar.php?id=1" class="btn btn-sm btn-info">Ver</a>
                                <a href="editar.php?id=1" class="btn btn-sm btn-warning">Editar</a>
                                <a href="excluir.php?id=1" class="btn btn-sm btn-danger">Excluir</a>
                            </td>
                        </tr>
                    </tbody>
                </table>