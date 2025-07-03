<?php
session_start();

// Redireciona se já estiver logado
if (isset($_SESSION['usuario'])) {
    header('Location: dashboard.php');
    exit();
}

$titulo = "Login - PCzin";
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
<body class="auth-body">
    <div class="auth-container">
        
        <?php if (isset($erro)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div>
        <?php endif; ?>
        
        <form method="POST" class="auth-form">
            <h2>Acesse sua conta</h2>
            
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>