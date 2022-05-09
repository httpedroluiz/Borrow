<?php
session_start();
include_once("connection.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$receiver = filter_input(INPUT_POST, 'receiver', FILTER_SANITIZE_STRING);
$cellphone = filter_input(INPUT_POST, 'cellphone', FILTER_SANITIZE_STRING);
$prevdate = filter_input(INPUT_POST, 'prevdate', FILTER_SANITIZE_STRING);

$sql = "UPDATE itens SET nome='$name', destinatario='$receiver', telefone='$cellphone', previsao='$prevdate' WHERE id='$id'";
$result = mysqli_query($conn, $sql);

if($sql) {
    $_SESSION['item_editado'] = true;
    header('Location: ../views/edit_item.php');
    exit;
} else {
    header("Location: ../views/edit_item.php");
    exit;
}
?>