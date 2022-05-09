<?php
if($_SESSION['email'] != 'admin') {
    header('Location: ../views/index.php');
    exit;
}
?>