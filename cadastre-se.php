<?php require 'pages/header.php';?>

<div class="container mt-5 mb-5">
  <div class="card page-login">
  <h1  class="text-secondary mb-3 text-center">Cadastre-se</h1>
    
    <?php 

      require 'classes/UserModel.php';

      $user = new User();

      if(isset($_POST['name']) && !empty($_POST['name'])) {
          $name  = addslashes($_POST['name']);
          $email  = addslashes($_POST['email']);
          $password  = $_POST['password'];
          $telefone  = addslashes($_POST['tel']);

          if(!empty($name) && !empty($email) && !empty($password)) {

            if($user->cadastrar($name, $email, $password, $telefone )) {
              ?>
                <div class="alert alert-success">
                  Cadastrado com sucesso!
                  <a href="login.php">Faça o login agora</a>
                </div>
              <?php
            } else {
              ?>
                <div class="alert alert-warning">
                  Usuário já existe!
                  <a href="login.php">Faça o login agora</a>
                </div>
              <?php
            }

          }else {
            ?>
              <div class="alert alert-warning">
                Compete todos os campos
              </div>
            <?php
          }
          
      }

    ?>

    <form action="" method="post">
        <div class="form-group ">
          <label for="name" class="text-secondary">Nome</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Digite seu nome">
        </div>
        <div class="form-group">
          <label for="email" class="text-secondary">Email</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu email">
        </div>
        <div class="form-group">
          <label for="password" class="text-secondary">Senha</label>
          <input autocomplete="false" type="password" name="password" id="password" class="form-control" placeholder="Digite uma senha">
        </div>
        <div class="form-group">
          <label for="tel" class="text-secondary">Telefone</label>
          <input type="text" name="tel" id="tel" class="form-control" placeholder="Digite seu telefone">
        </div>
        <input name="btn" id="btn" class="btn btn-primary btn-block mt-5 mb-3" type="submit" value="Cadastrar">
    </form>
    <a href="login.php">
      <p class="text-center text-secondary p-link">Já é cadastrado?</p>
    </a>
    
</div>
</div>



