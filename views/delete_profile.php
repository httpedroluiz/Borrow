<?php
include("../process/connection.php");
$id = $_GET['id'];

$sql = "DELETE FROM usuarios WHERE id = $id";
$result = mysqli_query($conn, $sql);
header("Location: index.php")
?>