<?php
require_once 'personagem.php';
require_once 'frisk.php';
require_once 'sans.php';
require_once 'toriel.php';
require_once 'papyrus.php';

$personagens = [
    new Frisk(),
    new Sans(),
    new Toriel(),
    new Papyrus()
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>UNDERTALE</title>
    <style>
        @font-face {
            font-family: 'Undertale';
            src: url('./fonte/DeterminationMonoWebRegular-Z5oq.ttf') format('truetype');
        }
        
        body {
           font-family: 'Undertale', sans-serif;
            background-color: #000;
            color: #fff;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            line-height: 1.5;
        }
        
        .cards-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        
        .card {
            background-color: #111;
            padding: 20px;
            border: 3px solid;
            width: 280px;
            box-shadow: 0 0 0 1px #000, 0 0 0 3px #fff;
            position: relative;
            overflow: hidden;
        }
        
        .card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, #fff, transparent);
        }
        
        .card h2 {
            color: #fff;
            border-bottom: 1px solid;
            padding-bottom: 10px;
            margin-top: 0;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 1.5em;
        }
        
        .card pre {
            white-space: pre-wrap;
            margin: 0;
            font-size: 0.9em;
        }
        
        h1 {
            color: #fff;
            text-align: center;
            margin-bottom: 30px;
            
            font-size: 3em;
            letter-spacing: 3px;
        }
        
        .frisk-card {
            border-color: #fff;
        }
        
        .sans-card {
            border-color: #0ff;
        }
        
        .toriel-card {
            border-color: #f80;
        }
        
        .papyrus-card {
            border-color: #ff0;
        }
        
       
        .card:hover {
            animation: glow 1s ease-in-out infinite alternate;
        }
        
        @keyframes glow {
            from {
                box-shadow: 0 0 5px #fff;
            }
            to {
                box-shadow: 0 0 20px #fff;
            }
        }
    
        body::after {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                linear-gradient(rgba(255,255,255,0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 20px 20px;
            pointer-events: none;
            z-index: -1;
        }
    </style>
</head>
<body>
    <h1>UNDERTALE</h1>
    
    <div class="cards-container">
        <?php foreach ($personagens as $personagem): ?>
            <div class="card <?= strtolower($personagem->getNome()) ?>-card">
                <h2><?= strtoupper($personagem->getNome()) ?></h2>
                <pre><?= $personagem->apresentar() ?></pre>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>