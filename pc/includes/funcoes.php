<?php
function formatarData($data) {
    return date('d/m/Y H:i', strtotime($data));
}

function formatarValor($valor) {
    return 'R$ ' . number_format($valor, 2, ',', '.');
}

function getStatusBadge($status) {
    $classes = [
        'disponivel' => 'badge-verde',
        'esgotado' => 'badge-vermelho',
        'reservado' => 'badge-amarelo'
    ];
    return '<span class="badge ' . $classes[$status] . '">' . ucfirst($status) . '</span>';
}
?>