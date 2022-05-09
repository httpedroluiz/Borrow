<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Borrow - Faça seu login</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../styles/main.css" />
    <link rel="stylesheet" href="../styles/forms.css" />
    <link rel="shortcut icon" href="../img/light-logo.svg">
  </head>
  <body>
    <div id="container">
      <form name="login" method="post" action="../process/process_login.php">

        <h1>Faça seu login</h1>

        <?php
        if(isset($_SESSION['nao_autenticado'])):
        ?>
        <div class="notification-error">
          <p>Email ou senha inválidos.</p>
        </div>
        <?php
        endif;
        unset($_SESSION['nao_autenticado']);
        ?>

        <div class="input">
          <input required type="text" name="email"/>
          <label>E-mail</label>
        </div>

        <div class="input">
          <input required type="password" name="password" />
          <label>Senha</label>
        </div>

        <button type="submit">Entrar</button>

        <div class="a">
            <p>Não tem uma conta?</p>
            <a href="signup.php" id="a">Registre-se</a>
        </div>
      </form>
    </div>
  </body>
</html>
