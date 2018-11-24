<?php
session_start();

unset($_SESSION['name']);
unset($_SESSION['typeUser']);

session_destroy();

header("Location: index.php");

?>