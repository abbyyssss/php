<?php
require_once 'includes/conexao.php';
require_once 'includes/autenticacao.php';
require_once 'includes/funcoes.php';

$titulo = "Dashboard";
require_once 'includes/cabecalho.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Componentes</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
</head>
<body>
    <div class="dashboard">
        <div class="dashboard-cards">
            <div class="card card-verde">
                <h3>Componentes Disponíveis</h3>
                <p>
                    <?php
                    $stmt = $pdo->query("SELECT COUNT(*) FROM componentes WHERE status = 'disponivel'");
                    echo $stmt->fetchColumn();
                    ?>
                </p>
            </div>
            
            <div class="card card-azul">
                <h3>Total de Componentes</h3>
                <p>
                    <?php
                    $stmt = $pdo->query("SELECT COUNT(*) FROM componentes");
                    echo $stmt->fetchColumn();
                    ?>
                </p>
            </div>
            
            <div class="card card-amarelo">
                <h3>Valor Total em Estoque</h3>
                <p>
                    <?php
                    $stmt = $pdo->query("SELECT SUM(valor * quantidade) FROM componentes WHERE status = 'disponivel'");
                    echo formatarValor($stmt->fetchColumn() ?? 0);
                    ?>
                </p>
            </div>
        </div>
        
        <div class="dashboard-section">
            <h2>Últimos Componentes Cadastrados</h2>
            
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
                        <?php
                        $stmt = $pdo->query("SELECT * FROM componentes ORDER BY data_cadastro DESC LIMIT 5");
                        while ($componente = $stmt->fetch()):
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($componente['nome']) ?></td>
                            <td><?= htmlspecialchars($componente['tipo']) ?></td>
                            <td><?= $componente['quantidade'] ?></td>
                            <td><?= formatarValor($componente['valor']) ?></td>
                            <td><?= getStatusBadge($componente['status']) ?></td>
                            <td>
                                <a href="componentes/visualizar.php?id=<?= $componente['id_componente'] ?>" class="btn btn-sm btn-info">Ver</a>
                                <?php if ($_SESSION['usuario']['perfil'] == 'admin' || $_SESSION['usuario']['id_usuario'] == $componente['id_usuario']): ?>
                                    <a href="componentes/editar.php?id=<?= $componente['id_componente'] ?>" class="btn btn-sm btn-warning">Editar</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php require_once 'includes/rodape.php'; ?>
</body>
</html>