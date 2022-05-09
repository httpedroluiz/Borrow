<?php
session_start();
include_once("connection.php");

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$receiver = filter_input(INPUT_POST, 'receiver', FILTER_SANITIZE_STRING);
$cellphone = filter_input(INPUT_POST, 'cellphone', FILTER_SANITIZE_STRING);
$prevdate = filter_input(INPUT_POST, 'prevdate', FILTER_SANITIZE_STRING);

$sql = "INSERT INTO itens (nome, destinatario, telefone, publicacao, previsao) 
VALUES ('$name', '$receiver', '$cellphone', NOW(), '$prevdate')";
$result = mysqli_query($conn, $sql);

if($sql) {
    $_SESSION['item_cadastrado'] = true;
    header('Location: ../views/register.php');
    exit;
} else {
    header('Location: ../views/register.php');
    exit;
}