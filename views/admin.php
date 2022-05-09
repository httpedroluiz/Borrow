<?php
session_start();
include('../process/connection.php');
include('../process/verify_login.php');
include('../process/verify_admin.php');
$sql = "SELECT id, nome, sobrenome, email, created FROM usuarios";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
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

    <header class="header" >
        <img src="../img/logo.svg" class="logo" />
        <nav>
            <ul class="nav-links">
                <li><a href="../process/logout.php" class="nav-a">Sair</a></li>
            </ul>
        </nav>
    </header>

    <h1 class="h1">Contas criadas</h1>

    <div class="itens">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Email</th>
                    <th>Data de criação</br>da conta</th>
                    <th>Excluir conta</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>". $row['id'] ."</td>
                            <td>". $row['nome'] ."</td>
                            <td>". $row['sobrenome'] ."</td>
                            <td>". $row['email'] ."</td>
                            <td>". $date = date('d/m/Y', strtotime($row['created'])) ."</td>
                            <td><a href='delete_profile.php?id=". $row['id'] ."'>Excluir</a></td>
                        </tr>";            
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>