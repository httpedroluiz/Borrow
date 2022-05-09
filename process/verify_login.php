<?php
if(!$_SESSION['email']) {
    header('Location: ../views/login.php');
    exit;
}
?>