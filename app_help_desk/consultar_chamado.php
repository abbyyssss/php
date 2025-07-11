<?php
  require_once "validador_acesso.php";

  
  $chamados = [];

  
  $arquivo = fopen('registros.hd', 'r'); 

 
  while(!feof($arquivo)){
    
    $registro = fgets($arquivo);
    
    $chamados[] = $registro;
  }

  
  fclose($arquivo);
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="../app_help_desk2/imagens/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
            
              <?php foreach($chamados as $chamado){ ?>

                
                <?php $chamado_dados = explode('|', $chamado); 

                
                  if(count($chamado_dados) < 6){
                    continue; }
                
              
                if($_SESSION['perfil'] === 'user'){
                  if($chamado_dados[0] != $_SESSION['id'] ){
                    continue; }
                  }
                ?>

              <div class="card mb-3 bg-light">
                <div class="card-body">

                  
                  <h5 class="card-title"><?php echo $chamado_dados[3] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted">
                    <?php echo '<p style="color: green; margin-bottom: 2px;"> Usuário: ' . $chamado_dados[2] . '</p>';?>
                  </h6>
                  <h6 class="card-subtitle mb-2 text-muted"><?php echo $chamado_dados[4] ?></h6>
                  <p class="card-text"><?php echo $chamado_dados[5] ?></p>
                
                </div>
              </div>
              <?php } ?>
              
              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>