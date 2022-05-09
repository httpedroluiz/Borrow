<?php
session_start();
include_once("connection.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

$sql = "UPDATE usuarios SET nome='$name', sobrenome='$lastname', email='$email', senha=md5('$password'), modified=NOW() WHERE id='$id'";
$result = mysqli_query($conn, $sql);

if($sql) {
    $_SESSION['perfil_editado'] = true;
    header('Location: ../views/profile.php');
    exit;
} else {
    header("Location: ../views/profile.php");
    exit;
}
?>