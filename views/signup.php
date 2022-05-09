<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Borrow - Cadastro</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../styles/main.css" />
    <link rel="stylesheet" href="../styles/forms.css" />
    <link rel="shortcut icon" href="../img/light-logo.svg">
  </head>
  <body>
    <div id="container">
      <form name="signup" method="post" action="../process/process_signup.php">

        <h1>Crie sua conta</h1>
  
        <?php
        if(isset($_SESSION['status_cadastro'])):
        ?>
        <div class="notification-success">
          <p>Sua conta foi cadastrada!</p>
          <p><a href="login.php">Faça login</a> com seu email e senha cadastrados.</p>
        </div>
        <?php
        endif;
        unset($_SESSION['status_cadastro']);
        ?>
        <?php
        if(isset($_SESSION['usuario_existe'])):
        ?>
        <div class="notification-error">
          <p>Email já cadastrado.</p> 
          <p><a href="login.php">Faça login</a> com este email ou cadastre outro.</p>
        </div>
        <?php
        endif;
        unset($_SESSION['usuario_existe']);
        ?>

        <div class="input" >
          <input required type="text" name="name"/>
          <label>Nome</label>
        </div>

        <div class="input">
          <input required type="text" name="lastname"/>
          <label>Sobrenome</label>
        </div>
        

        <div class="input">
          <input required type="email" name="email"/>
          <label>E-mail</label>
        </div>

        <div class="input">
          <input required type="password" name="password"/>
          <label>Senha</label>
        </div>

        <button type="submit">Cadastrar</button>

        <div class="a">
          <p>Já tem uma conta?</p>
          <a href="login.php" id="a">Faça login</a>
        </div>
      </form>
    </div>
  </body>
</html>


