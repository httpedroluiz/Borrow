<?php
session_start();
include_once('../process/verify_login.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Borrow - Cadastre um item</title>

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
              <li><a href="profile.php" class="nav-a">Editar perfil</a></li>
              <li><a href="../process/logout.php" class="nav-a">Sair</a></li>
            </ul>
        </nav>
    </header>
    <div>
        <form name="register-item" method="post" action="../process/process_itens.php">

            <h1>Cadastre seu item</h1>
    
            <?php
            if(isset($_SESSION['item_cadastrado'])):
            ?>
            <div class="notification-success">
              <p>Seu item foi cadastrado!</p> 
            </div>
            <?php
            endif;
            unset($_SESSION['item_cadastrado']);
            ?>

            <div class="input" >
              <input required type="text" name="name"/>
              <label>Nome do item</label>
            </div>

            <div class="input" >
              <input required type="text" name="receiver"/>
              <label>Nome do destinatário</label>
            </div>

            <div class="input">
              <input required type="tel" id="tel" name="cellphone"/>
              <label>Telefone para contato</label>
            </div>

            <script src="../scripts/formMask.js"></script>

            <script>
              new FormMask(document.querySelector("#tel"), "(__) _____-____", "_", ["(", ")", " ", "-"])
            </script>
    
            <div class="input">
              <span class="input-span">Previsão de devolução</span>
              <input required type="date" name="prevdate"/>
              
            </div>
    
            <button type="submit">Salvar</button>
          </form>
    </div>
</body>
</html>