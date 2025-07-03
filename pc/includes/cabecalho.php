<?php
require_once 'includes/conexao.php';
require_once 'includes/autenticacao.php';
require_once 'includes/funcoes.php';

$titulo = "Dashboard - PCzin"; // Altere para o título da página
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($titulo) ?></title>
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header class="cabecalho">
        <div class="container">
            <div class="navegacao">
                <div class="logo">
                    <a href="dashboard.php">PCzin</a>
                </div>
                
                <ul class="menu">
                    <li><a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
                    <li><a href="componentes/listar.php"><i class="fas fa-microchip"></i> Componentes</a></li>
                    <?php if ($_SESSION['usuario']['perfil'] == 'admin'): ?>
                        <li><a href="usuarios/listar.php"><i class="fas fa-users"></i> Usuários</a></li>
                    <?php endif; ?>
                </ul>
                
                <div class="usuario-info">
                    <span><?= htmlspecialchars($_SESSION['usuario']['nome']) ?></span>
                    <a href="logout.php" class="btn btn-sm btn-danger"><i class="fas fa-sign-out-alt"></i></a>
                </div>
            </div>
        </div>
    </header>

    <main class="conteudo-principal">
        <div class="container">
            <!-- Conteúdo específico da página aqui -->
            <h1><?= htmlspecialchars($titulo) ?></h1>
            
            <?php if (isset($_GET['sucesso'])): ?>
                <div class="alert alert-success">Operação realizada com sucesso!</div>
            <?php endif; ?>
            
            <?php if (isset($_GET['erro'])): ?>
                <div class="alert alert-danger">Ocorreu um erro ao processar sua solicitação.</div>
            <?php endif; ?>
        </div>
    </main>

    <footer class="rodape">
        <div class="container">
            <p>&copy; <?= date('Y') ?> PCzin - Sistema de Gerenciamento de Componentes</p>
        </div>
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>