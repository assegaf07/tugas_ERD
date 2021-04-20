<?php
session_start();
unset($_SESSION['MEMBER']);
header('location:http://localhost:8080/src/index.php?');
?>