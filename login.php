<?php require 'pages/header.php';?>

<div class="container mt-5  ">
  <div class="card page-login">
  <h1  class="text-secondary mb-3 text-center">Login</h1>
    
    <?php 

      require 'classes/UserModel.php';

      $user = new User();

      if(isset($_POST['email']) && !empty($_POST['email'])) {
          $email  = addslashes($_POST['email']);
          $password  = $_POST['password'];

          if($user->login($email, $password)){
            ?>
               <script>
                   window.location.href="./"
               </script>
            <?php
          } else {
            ?>
                <div class="alert alert-danger">
                    Senha e/ou email invalidos!
                </div>
            <?php
          }
      }

    ?>

    <form action="" method="post">
        <div class="form-group">
          <label for="email" class="text-secondary">Email</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu email" required>
        </div>
        <div class="form-group">
          <label for="password"  class="text-secondary">Senha</label>
          <input autocomplete="false" type="password" name="password" id="password" class="form-control" placeholder="Digite uma senha">
        </div>
        <input name="btn" id="btn" class="btn btn-primary btn-block mt-5 mb-3" type="submit" value="LOGIN" required>
    </form>
    <a href="login.php">
      <p class="text-center text-secondary p-link">Ainda não tem cadastro?</p>
    </a>

  </div>
</div>

