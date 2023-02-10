<?php
session_start();
unset($_SESSION['nome']);
unset($_SESSION['email']);
unset($_SESSION['perfil']);
session_destroy();
header('location:../login.php?erro=3');
?>