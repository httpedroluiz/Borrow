<?php
session_start();
include("../process/connection.php");
include_once('../process/verify_login.php');

$id = "";
$name = "";
$receiver = "";
$cellphone = "";
$prevdate = "";

if(isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "SELECT * FROM itens WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  $name = $row['nome'];
  $receiver = $row['destinatario'];
  $cellphone = $row['telefone'];
  $prevdate = $row['previsao'];
  
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Borrow - Edite seu item</title>

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
        <form name="edit-item" method="post" action="../process/process_edit_itens.php">

            <h1>Edite seu item</h1>
    
            <?php
            if(isset($_SESSION['item_editado'])):
            ?>
            <div class="notification-success">
              <p>Seu item foi editado!</p> 
            </div>
            <?php
            endif;
            unset($_SESSION['item_editado']);
            ?>

            <input type="hidden" name="id" value="<?php echo $id; ?>"/>

            <div class="input" >
              <input required type="text" name="name" value="<?php echo $name;?>"/>
              <label>Nome do item</label>
            </div>

            <div class="input" >
              <input required type="text" name="receiver" value="<?php echo $receiver;?>"/>
              <label>Nome do destinatário</label>
            </div>

            <div class="input" >
              <input required type="text" id="tel" name="cellphone" value="<?php echo $cellphone;?>"/>
              <label >Telefone para contato</label>
            </div>

            <script src="../scripts/formMask.js"></script>

            <script>
              new FormMask(document.querySelector("#tel"), "(__) _____-____", "_", ["(", ")", " ", "-"])
            </script>
    
            <div class="input">
              <span class="input-span">Previsão de devolução</span>
              <input required type="date" name="prevdate"/>
            </div>
    
            <button type="submit">Editar</button>
          </form>
    </div>
</body>
</html>