<?php
session_start();
include_once("../process/connection.php");
include_once('../process/verify_login.php');
$id = $_SESSION['id'];
$sql = "SELECT * FROM usuarios WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Borrow - Perfil</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../styles/main.css" />
    <link rel="stylesheet" href="../styles/forms.css" />
    <link rel="stylesheet" href="../styles/landing-page.css" />
    <link rel="shortcut icon" href="../img/light-logo.svg">
</head>
<body>
    <header class="header">
        <a href="index.php"><img src="../img/logo.svg" class="logo" /></a>
        <nav>
            <ul class="nav-links">
                <li><a href="../process/logout.php" class="nav-a">Sair</a></li>
            </ul>
        </nav>
    </header>

    <div>
        <form name="profile" method="post" action="../process/process_profile.php">       

          <h1>Dados Cadastrados</h1>
          
          <?php
          if(isset($_SESSION['perfil_editado'])):
          ?>
          <div class="notification-success">
            <p>Seu perfil foi editado!</p> 
          </div>
          <?php
          endif;
          unset($_SESSION['perfil_editado']);
          ?>

          <input required type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
          
          <div class="input" >
            <input required type="text" name="name" value="<?php echo $row['nome']; ?>"/>
            <label>Nome</label>
          </div>
  
          <div class="input">
            <input required type="text" name="lastname" value="<?php echo $row['sobrenome']; ?>"/>
            <label>Sobrenome</label>
          </div>
          
  
          <div class="input">
            <input required type="email" name="email" value="<?php echo $row['email']; ?>"/>
            <label>E-mail</label>
          </div>
  
          <div class="input">
            <input required type="password" name="password"/>
            <label>Senha</label>
          </div>
          
          <button type="submit">Editar</button>
        </form>
    </div>
</body>
</html>