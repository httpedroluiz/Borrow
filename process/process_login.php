<?php 
session_start();
include('connection.php');

if(empty($_POST['email']) || empty($_POST['password'])) {
    header('Location: ../views/login.php');
    exit;
}

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

$sql = "SELECT id, email, senha from usuarios where email = '{$email}' and senha = md5('{$password}')";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$rows = mysqli_num_rows($result);
$_SESSION['id'] = $row['id'];

if($rows == 1) {
    $_SESSION['email'] = $email;
    header('Location: ../views/index.php');
    exit;
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: ../views/login.php');
    exit;
}
?>