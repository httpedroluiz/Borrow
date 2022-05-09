<?php
session_start();
include('../process/connection.php');
include('../process/verify_login.php');
$sql = "SELECT id, nome, destinatario, telefone, publicacao, previsao FROM itens";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if($_SESSION['email']== 'admin'){
    header("Location: admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Borrow - Página inicial | Itens emprestados</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../styles/main.css" />
    <link rel="stylesheet" href="../styles/landing-page.css" />
    <link rel="shortcut icon" href="../img/light-logo.svg">
</head>
<body>

    <header class="header">
        <img src="../img/logo.svg" class="logo" />
        <nav>
            <ul class="nav-links">
                <li><a href="profile.php" class="nav-a">Editar perfil</a></li>
                <li><a href="../process/logout.php" class="nav-a">Sair</a></li>
            </ul>
        </nav>
    </header>

    <h1 class="h1">Itens emprestados</h1>

    <div class="itens">
        <table>
            <thead>
                <tr>
                    
                    <th>Nome do Item</th>
                    <th>Nome do</br>Destinatário</th>
                    <th>Telefone para</br>contato</th>
                    <th>Data do </br>emprestimo</th>
                    <th>Previsão de</br>devolução</th>
                    <th colspan="2"><a href="register.php" class="table-a">Adicionar item</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>". $row['nome'] ."</td>
                            <td>". $row['destinatario'] ."</td>
                            <td>". $row['telefone'] ."</td>
                            <td>". $date = date('d/m/Y', strtotime($row['publicacao'])) ."</td>
                            <td>". $date = date('d/m/Y', strtotime($row['previsao'])) ."</td>
                            <td><a href='edit_item.php?id=". $row['id'] ."'>Editar</a></td>
                            <td><a href='delete_item.php?id=". $row['id'] ."'>Excluir</a></td>
                        </tr>";            
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>