<?php
session_start();

if (!isset($_SESSION['usuario']) && basename($_SERVER['PHP_SELF']) != 'login.php') {
    header('Location: login.php');
    exit();
}

function verificarPermissao($perfilRequerido) {
    if ($_SESSION['usuario']['perfil'] != $perfilRequerido && $_SESSION['usuario']['perfil'] != 'admin') {
        header('Location: dashboard.php');
        exit();
    }
}
?>