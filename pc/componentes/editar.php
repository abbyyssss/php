<?php
require_once '../includes/conexao.php';
require_once '../includes/autenticacao.php';
require_once '../includes/funcoes.php';

// Apenas administradores podem gerenciar usuários
verificarPermissao('admin');

$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
$stmt->execute([$id]);
$usuario = $stmt->fetch();

if (!$usuario) {
    header('Location: listar.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $confirmarSenha = $_POST['confirmar_senha'] ?? '';
    $perfil = $_POST['perfil'] ?? 'usuario';
    
    $erros = [];
    
    if (empty($nome)) $erros[] = "O nome é obrigatório";
    if (empty($email)) $erros[] = "O e-mail é obrigatório";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $erros[] = "E-mail inválido";
    
    // Verifica se está alterando a senha
    $alterarSenha = !empty($senha);
    if ($alterarSenha) {
        if ($senha != $confirmarSenha) $erros[] = "As senhas não coincidem";
        if (strlen($senha) < 6) $erros[] = "A senha deve ter pelo menos 6 caracteres";
    }
    
    // Verifica se o e-mail já existe (exceto para o próprio usuário)
    $stmt = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = ? AND id_usuario != ?");
    $stmt->execute([$email, $id]);
    if ($stmt->fetch()) {
        $erros[] = "Este e-mail já está cadastrado";
    }
    
    if (empty($erros)) {
        if ($alterarSenha) {
            $senhaHash = md5($senha);
            $stmt = $pdo->prepare("UPDATE usuarios SET nome = ?, email = ?, senha = ?, perfil = ? WHERE id_usuario = ?");
            $stmt->execute([$nome, $email, $senhaHash, $perfil, $id]);
        } else {
            $stmt = $pdo->prepare("UPDATE usuarios SET nome = ?, email = ?, perfil = ? WHERE id_usuario = ?");
            $stmt->execute([$nome, $email, $perfil, $id]);
        }
        
        header('Location: listar.php?sucesso=1');
        exit();
    }
}

$titulo = "Editar Usuário: " . htmlspecialchars($usuario['nome']);
require_once '../includes/cabecalho.php';
?>

<div class="container">
    <h2>Editar Usuário</h2>
    
    <?php if (!empty($erros)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($erros as $erro): ?>
                    <li><?= $erro ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <form method="POST">
        <div class="form-group">
            <label for="nome">Nome Completo</label>
            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required>
        </div>
        
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="senha">Nova Senha (deixe em branco para manter a atual)</label>
                <input type="password" id="senha" name="senha" minlength="6">
            </div>
            
            <div class="form-group">
                <label for="confirmar_senha">Confirmar Nova Senha</label>
                <input type="password" id="confirmar_senha" name="confirmar_senha" minlength="6">
            </div>
        </div>
        
        <div class="form-group">
            <label for="perfil">Perfil</label>
            <select id="perfil" name="perfil" required>
                <option value="usuario" <?= $usuario['perfil'] == 'usuario' ? 'selected' : '' ?>>Usuário</option>
                <option value="tecnico" <?= $usuario['perfil'] == 'tecnico' ? 'selected' : '' ?>>Técnico</option>
                <option value="admin" <?= $usuario['perfil'] == 'admin' ? 'selected' : '' ?>>Administrador</option>
            </select>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="listar.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

<?php require_once '../includes/rodape.php'; ?>