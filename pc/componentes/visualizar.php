<?php
require_once '../includes/conexao.php';
require_once '../includes/autenticacao.php';
require_once '../includes/funcoes.php';

$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare("SELECT c.*, u.nome as usuario FROM componentes c JOIN usuarios u ON c.id_usuario = u.id_usuario WHERE c.id_componente = ?");
$stmt->execute([$id]);
$componente = $stmt->fetch();

if (!$componente) {
    header('Location: listar.php');
    exit();
}

$titulo = "Componente: " . htmlspecialchars($componente['nome']);
require_once '../includes/cabecalho.php';

if (isset($_GET['sucesso'])) {
    echo '<div class="alert alert-success">Componente atualizado com sucesso!</div>';
}
?>

<div class="container">
    <div class="detalhe-componente">
        <div class="detalhe-cabecalho">
            <h2><?= htmlspecialchars($componente['nome']) ?></h2>
            <div class="detalhe-status">
                <?= getStatusBadge($componente['status']) ?>
            </div>
        </div>
        
        <div class="detalhe-info">
            <div class="info-item">
                <span class="info-label">Tipo:</span>
                <span class="info-value"><?= htmlspecialchars($componente['tipo']) ?></span>
            </div>
            
            <div class="info-item">
                <span class="info-label">Quantidade:</span>
                <span class="info-value"><?= $componente['quantidade'] ?></span>
            </div>
            
            <div class="info-item">
                <span class="info-label">Valor Unitário:</span>
                <span class="info-value"><?= formatarValor($componente['valor']) ?></span>
            </div>
            
            <div class="info-item">
                <span class="info-label">Valor Total:</span>
                <span class="info-value"><?= formatarValor($componente['valor'] * $componente['quantidade']) ?></span>
            </div>
            
            <div class="info-item">
                <span class="info-label">Cadastrado por:</span>
                <span class="info-value"><?= htmlspecialchars($componente['usuario']) ?></span>
            </div>
            
            <div class="info-item">
                <span class="info-label">Data de Cadastro:</span>
                <span class="info-value"><?= formatarData($componente['data_cadastro']) ?></span>
            </div>
        </div>
        
        <div class="detalhe-especificacoes">
            <h3>Especificações Técnicas</h3>
            <div class="especificacoes-content">
                <?= nl2br(htmlspecialchars($componente['especificacoes'])) ?>
            </div>
        </div>
        
        <div class="detalhe-acoes">
            <?php if ($_SESSION['usuario']['perfil'] == 'admin' || $_SESSION['usuario']['id_usuario'] == $componente['id_usuario']): ?>
                <a href="editar.php?id=<?= $id ?>" class="btn btn-warning">Editar</a>
                <a href="excluir.php?id=<?= $id ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este componente?')">Excluir</a>
            <?php endif; ?>
            <a href="listar.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</div>

<?php require_once '../includes/rodape.php'; ?>