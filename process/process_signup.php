<?php
session_start();
include_once("connection.php");

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

$sql = "select count(*) as total from usuarios where email = '$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
    $_SESSION['usuario_existe'] = true;
    header('Location: ../views/signup.php');
    exit;
}

$sql = "INSERT INTO usuarios (nome, sobrenome, email, senha, created) VALUES ('$name', '$lastname', '$email', md5('$password'), NOW())";

if($conn->query($sql) === TRUE) {
    $_SESSION['status_cadastro'] = true;
} 

$conn->close();

header('Location: ../views/signup.php');
exit;
?>