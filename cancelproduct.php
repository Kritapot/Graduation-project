<?php
session_start();
if(isset($_GET["i"])){
	$key = $_GET["i"];
	unset($_SESSION["list"][$key]);
	$_SESSION['list'] = array_values($_SESSION['list']);
	if(count($_SESSION['list']) == 0){
		unset($_SESSION['list']);
	}
} else {
	unset($_SESSION['list']);
}
header("Location: cart.php?d");
?>