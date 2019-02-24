<?php
session_start();
if($_POST["username"] == "tawanshop" and $_POST["password"] == "1234"){
	$_SESSION["admin"] = "Tawanshop";
	header("Location: index.php");
} else {
	header("Location: login.php?err");
}
?>