<?php
session_start();
unset($_SESSION["list"]);
session_destroy();
header("Location: products.php");
?>