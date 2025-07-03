<?php
require_once '../includes/conexao.php';
require_once '../includes/autenticacao.php';
require_once '../includes/funcoes.php';

// Apenas administradores podem gerenciar usuários
verificarPermissao('admin');

$id = $_GET['id'] ?? 0;

// Verifica se o usuário existe
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
$stmt->execute([$id]);
$usuario = $stmt->fetch();

if (!$usuario) {
    header('Location: listar.php');
    exit();
}

// Não permite excluir a si mesmo
if ($usuario['id_usuario'] == $_SESSION['usuario']['id_usuario']) {
    header('Location: listar.php?erro=1');
    exit();
}

// Verifica se o usuário tem componentes cadastrados
$stmt = $pdo->prepare("SELECT COUNT(*) FROM componentes WHERE id_usuario = ?");
$stmt->execute([$id]);
$temComponentes = $stmt->fetchColumn() > 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!$temComponentes) {
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
        if ($stmt->execute([$id])) {
            header('Location: listar.php?sucesso=1');
            exit();
        } else {
            header('Location: listar.php?erro=2');
            exit();
        }
    }
}

$titulo = "Excluir Usuário: " . htmlspecialchars($usuario['nome']);
require_once '../includes/cabecalho.php';
?>

<div class="container">
    <h2>Excluir Usuário</h2>
    
    <div class="alert alert-danger">
        <p>Tem certeza que deseja excluir permanentemente o usuário <strong><?= htmlspecialchars($usuario['nome']) ?></strong>?</p>
        
        <?php if ($temComponentes): ?>
            <p class="text-danger">ATENÇÃO: Este usuário possui componentes cadastrados e não pode ser excluído.</p>
        <?php else: ?>
            <p>Esta ação não pode ser desfeita.</p>
        <?php endif; ?>
    </div>
    
    <div class="detalhe-info">
        <div class="info-item">
            <span class="info-label">E-mail:</span>
            <span class="info-value"><?= htmlspecialchars($usuario['email']) ?></span>
        </div>
        
        <div class="info-item">
            <span class="info-label">Perfil:</span>
            <span class="info-value"><?= ucfirst($usuario['perfil']) ?></span>
        </div>
    </div>
    
    <?php if (!$temComponentes): ?>
        <form method="POST">
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
                <a href="listar.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    <?php else: ?>
        <div class="form-actions">
            <a href="listar.php" class="btn btn-secondary">Voltar</a>
        </div>
    <?php endif; ?>
</div>

<?php require_once '../includes/rodape.php'; ?>