<?php 
session_start();


$usuarios = array(
['id' => '1',
'perfil' => 'adm',
'nome' => 'Kauan',
'email' => 'kauanmcvq@gmail.com',
'senha' => '123'
], 
['id' => '2',
'perfil' => 'user',
'nome' => 'Fernando',
'email' => 'fefe@gmail.com',
'senha' => '1234'
], 
['id' => '3',
'perfil' => 'user',
'nome' => 'pita',
'email' => 'pitapica@gmail.com',
'senha' => '12345'
], 
);

$usuarioAutenticado = false;

// recebendo via get
$emailUsuario = $_GET['email'];
$senhaUsuario = $_GET['senha'];

 //autenticando usuário
 for ($idx = 0; $idx < count ($usuarios); $idx++ ){
    if ($emailUsuario == $usuarios[$idx]['email'] && $senhaUsuario == $usuarios [$idx]['senha'])  {
        $usuarioAutenticado = true;
        $_SESSION['id'] = $usuarios[$idx]['id']; 
        $_SESSION['perfil'] = $usuarios[$idx]['perfil']; 
        $_SESSION['nome'] = $usuarios[$idx]['nome'];  
        break;
    }
    else {
        $usuarioAutenticado = false;
    }
 }
    

 if($usuarioAutenticado){
    //validando a sessão
    $_SESSION['autenticado'] = 'sim';
    header('location: home.php');

 } else{
    //validando a sessão
    $_SESSION['autenticado'] = 'nao';
    header('location: index.php?login=erro');
 }
 
 
?>