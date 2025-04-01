<html>
<?php
require_once"validador_acesso.php";
?>  

<head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-abrir-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-abrir-chamado">
          <div class="card">
            <div class="card-header">
              Abertura de chamado
              <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] === 'efetuado') { ?>
              <div style="color: green;">
                <script>
                  alert('Chamado cadastrado com sucesso!')
                </script>
              </div>
            <?php } ?>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  
                <form action="registra_chamado.php" method="POST">
    <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" required>
    </div>
    
    <div class="form-group">
        <label for="categoria">Categoria</label>
        <select class="form-control" id="categoria" name="categoria" required>
            <option>Criação Usuário</option>
            <option>Impressora</option>
            <option>Hardware</option>
            <option>Software</option>
            <option>Rede</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
    </div>

    <div class="row mt-5">
        <div class="col-6">
            <a href="home.php">
                <input type="button" class="btn btn-lg btn-warning btn-block" value="Voltar">
            </a>
        </div>

        <div class="col-6">
            <input type="submit" class="btn btn-lg btn-info btn-block" value="Abrir">
        </div>
    </div>
</form>


                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>