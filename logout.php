<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['checkout']);
header('Location: login.php')
?>