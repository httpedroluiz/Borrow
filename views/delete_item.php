<?php
include("../process/connection.php");
$id = $_GET['id'];

$sql = "DELETE FROM itens WHERE id = $id";
$result = mysqli_query($conn, $sql);
header("Location: index.php")
?>