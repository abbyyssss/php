<?php
require_once 'classes.php';

// Definir raças disponíveis com imagens correspondentes
$racas = [
    'Humano' => ['desc' => 'Humanos são versáteis e adaptáveis', 'img' => 'humano'],
    'Elfo' => ['desc' => 'Seres graciosos com afinidade pela natureza', 'img' => 'elfo'],
    'Anão' => ['desc' => 'Robustos e resistentes, mestres em forja', 'img' => 'anao'],
    'Orc' => ['desc' => 'Guerreiros fortes e agressivos', 'img' => 'orc'],
    'Draconato' => ['desc' => 'Descendentes de dragões com habilidades únicas', 'img' => 'draconato']
];

// Processar formulário se enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $classe = filter_input(INPUT_POST, 'classe', FILTER_SANITIZE_STRING);
    $raca = filter_input(INPUT_POST, 'raca', FILTER_SANITIZE_STRING);
    
    // Validar dados
    if (!empty($nome) && !empty($classe) && class_exists($classe) && !empty($raca)) {
        $personagem = new $classe($nome, $raca);
        // Adicionar imagem e descrição da raça ao personagem
        $personagem->setRacaImg($racas[$raca]['img']);
        $personagem->setRacaDescricao($racas[$raca]['desc']);
        $fichaGerada = true;
    } else {
        $erro = "Por favor, preencha todos os campos corretamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criador de Personagens RPG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1a1a2e;
            background-image: url('./sources/background.jpg');
            background-size: cover;
            background-attachment: fixed;
            color: #e6e6e6;
        }
        .card-form, .ficha {
            background-color: rgba(0, 0, 0, 0.8);
            border: 1px solid #444;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            color: #e6e6e6;
        }
        .img-personagem {
            max-width: 200px;
            border-radius: 5px;
            border: 3px solid #4e4e4e;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        .img-icone {
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }
        .nav-tabs .nav-link {
            color: #aaa;
        }
        .nav-tabs .nav-link.active {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
            border-color: #444;
        }
        .progress {
            height: 25px;
            background-color: #333;
        }
        .list-group-item {
            background-color: rgba(255, 255, 255, 0.1);
            color: #e6e6e6;
            border-color: #444;
        }
        .card {
            background-color: lightgray);
            border-color: #444;
        }
        .btn-primary {
            background-color: #4e0d3a;
            border-color: #4e0d3a;
        }
        .btn-primary:hover {
            background-color: #6a104e;
            border-color: #6a104e;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1 class="text-center mb-4" style="color: #fff; text-shadow: 2px 2px 4px #000;">Criador de Personagens RPG</h1>
                
                <?php if (isset($fichaGerada)): ?>
                    
                    <div class="ficha p-4 mb-4">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img src="imagens/personagens/<?= $personagem->getImagem() ?>.png" 
                                     alt="<?= $personagem->getClasse() ?>" 
                                     class="img-fluid img-personagem mb-3">
                                <h2 class="text-warning"><?= $personagem->getNome() ?></h2>
                                <h4 class="text-info"><?= $personagem->getClasse() ?></h4>
                                
                                <div class="d-flex align-items-center justify-content-center mt-3">
                                    <img src="imagens/racas/<?= $personagem->getRacaImg() ?>.png" 
                                         alt="<?= $personagem->getRaca() ?>" 
                                         class="img-icone">
                                    <span class="text-success"><?= $personagem->getRaca() ?></span>
                                </div>
                            </div>
                            
                            <div class="col-md-8">
                                <ul class="nav nav-tabs mb-3">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#sobre">Sobre</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#atributos">Atributos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#habilidades">Habilidades</a>
                                    </li>
                                </ul>
                                
                                <div class="tab-content">
                                    <!-- Aba Sobre -->
                                    <div class="tab-pane fade show active" id="sobre">
                                        <div class="mb-4">
                                            <h4 class="text-info">
                                                <img src="imagens/icones/descricao.png" class="img-icone">
                                                Descrição
                                            </h4>
                                            <p><?= $personagem->getDescricao() ?></p>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <h4 class="text-info">
                                                <img src="imagens/icones/raca.png" class="img-icone">
                                                Raça: <?= $personagem->getRaca() ?>
                                            </h4>
                                            <p><?= $personagem->getRacaDescricao() ?></p>
                                        </div>
                                    </div>
                                    
                                    <!-- Aba Atributos -->
                                    <div class="tab-pane fade" id="atributos">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <h5 class="text-danger">
                                                        <img src="imagens/icones/forca.png" class="img-icone">
                                                        Força
                                                    </h5>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-danger" role="progressbar" 
                                                             style="width: <?= $personagem->getForca() ?>%"
                                                             aria-valuenow="<?= $personagem->getForca() ?>" 
                                                             aria-valuemin="0" aria-valuemax="100">
                                                            <?= $personagem->getForca() ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="mb-4">
                                                    <h5 class="text-primary">
                                                        <img src="imagens/icones/defesa.png" class="img-icone">
                                                        Defesa
                                                    </h5>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-primary" role="progressbar" 
                                                             style="width: <?= $personagem->getDefesa() ?>%"
                                                             aria-valuenow="<?= $personagem->getDefesa() ?>" 
                                                             aria-valuemin="0" aria-valuemax="100">
                                                            <?= $personagem->getDefesa() ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <h5 class="text-success">
                                                        <img src="imagens/icones/agilidade.png" class="img-icone">
                                                        Agilidade
                                                    </h5>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success" role="progressbar" 
                                                             style="width: <?= $personagem->getAgilidade() ?>%"
                                                             aria-valuenow="<?= $personagem->getAgilidade() ?>" 
                                                             aria-valuemin="0" aria-valuemax="100">
                                                            <?= $personagem->getAgilidade() ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="mb-4">
                                                    <h5 class="text-warning">
                                                        <img src="imagens/icones/inteligencia.png" class="img-icone">
                                                        Inteligência
                                                    </h5>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning text-dark" role="progressbar" 
                                                             style="width: <?= $personagem->getInteligencia() ?>%"
                                                             aria-valuenow="<?= $personagem->getInteligencia() ?>" 
                                                             aria-valuemin="0" aria-valuemax="100">
                                                            <?= $personagem->getInteligencia() ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5 class="text-info">
                                                    <img src="imagens/icones/vida.png" class="img-icone">
                                                    Vida
                                                </h5>
                                                <div class="progress">
                                                    <div class="progress-bar bg-info" role="progressbar" 
                                                         style="width: <?= $personagem->getVida() ?>%"
                                                         aria-valuenow="<?= $personagem->getVida() ?>" 
                                                         aria-valuemin="0" aria-valuemax="150">
                                                        <?= $personagem->getVida() ?> / 150
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Aba Habilidades -->
                                    <div class="tab-pane fade" id="habilidades">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="text-primary mb-3">
                                                    <img src="imagens/icones/habilidades.png" class="img-icone">
                                                    Ações Básicas
                                                </h4>
                                                
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            <img src="imagens/icones/ataque.png" class="img-icone">
                                                            <h5 class="card-title mb-0"><?= $personagem->ataqueBasico() ?></h5>
                                                        </div>
                                                        <p class="card-text mt-2">Ataque básico com sua arma principal.</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            <img src="imagens/icones/defesa.png" class="img-icone">
                                                            <h5 class="card-title mb-0"><?= $personagem->defender() ?></h5>
                                                        </div>
                                                        <p class="card-text mt-2">Assume posição defensiva para reduzir dano recebido.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <h4 class="text-warning mb-3">
                                                    <img src="imagens/icones/especial.png" class="img-icone">
                                                    Habilidade Especial
                                                </h4>
                                                
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            <img src="imagens/icones/<?= strtolower($personagem->getClasse()) ?>.png" class="img-icone">
                                                            <h5 class="card-title mb-0 text-warning"><?= $personagem->habilidadeEspecial() ?></h5>
                                                        </div>
                                                        <p class="card-text mt-2">
                                                            <?php 
                                                        
                                                            switch($personagem->getClasse()) {
                                                                case 'Cavaleiro':
                                                                    echo "Um golpe poderoso que ignora parte da defesa do inimigo.";
                                                                    break;
                                                                case 'Arqueiro':
                                                                    echo "Dispara múltiplas flechas que atingem vários alvos.";
                                                                    break;
                                                                case 'Feiticeiro':
                                                                    echo "Invoca uma poderosa explosão de energia mágica.";
                                                                    break;
                                                                case 'Assassino':
                                                                    echo "Ataque furtivo que causa dano crítico se o alvo estiver desprevenido.";
                                                                    break;
                                                                case 'Druida':
                                                                    echo "Transforma-se em um animal poderoso, ganhando novos ataques.";
                                                                    break;
                                                                default:
                                                                    echo "Habilidade única desta classe.";
                                                            }
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center mt-4">
                            <a href="index.php" class="btn btn-primary btn-lg">Criar Novo Personagem</a>
                        </div>
                    </div>
                <?php else: ?>
                   
                    <div class="card-form p-4 mb-4">
                        <h2 class="text-center mb-4 text-warning">Crie seu Personagem</h2>
                        
                        <?php if (isset($erro)): ?>
                            <div class="alert alert-danger"><?= $erro ?></div>
                        <?php endif; ?>
                        
                        <form method="POST" action="index.php">
                            <div class="mb-4">
                                <label for="nome" class="form-label">Nome do Personagem</label>
                                <input type="text" class="form-control bg-dark text-white" id="nome" name="nome" required
                                       value="<?= isset($nome) ? htmlspecialchars($nome) : '' ?>">
                            </div>
                            
                            <div class="mb-4">
                                <label for="classe" class="form-label">Classe</label>
                                <select class="form-select bg-dark text-white" id="classe" name="classe" required>
                                    <option value="">Selecione uma classe</option>
                                    <option value="Cavaleiro" <?= isset($classe) && $classe == 'Cavaleiro' ? 'selected' : '' ?>>Cavaleiro</option>
                                    <option value="Arqueiro" <?= isset($classe) && $classe == 'Arqueiro' ? 'selected' : '' ?>>Arqueiro</option>
                                    <option value="Feiticeiro" <?= isset($classe) && $classe == 'Feiticeiro' ? 'selected' : '' ?>>Feiticeiro</option>
                                    <option value="Assassino" <?= isset($classe) && $classe == 'Assassino' ? 'selected' : '' ?>>Assassino</option>
                                    <option value="Druida" <?= isset($classe) && $classe == 'Druida' ? 'selected' : '' ?>>Druida</option>
                                </select>
                            </div>
                            
                            <div class="mb-4">
                                <label for="raca" class="form-label">Raça</label>
                                <select class="form-select bg-dark text-white" id="raca" name="raca" required>
                                    <option value="">Selecione uma raça</option>
                                    <?php foreach ($racas as $racaNome => $dados): ?>
                                        <option value="<?= $racaNome ?>" 
                                            <?= isset($raca) && $raca == $racaNome ? 'selected' : '' ?>>
                                            <?= $racaNome ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg px-5 py-2">
                                    <img src="imagens/icones/criar.png" width="24" class="me-2">
                                    Criar Personagem
                                </button>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>