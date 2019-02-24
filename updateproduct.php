<?php
session_start();
include_once 'order.class.php';
$point = $_GET["i"];
$obj = unserialize($_SESSION["list"][$point]);
$obj->amount = $_GET["amount"];
$_SESSION["list"][$point] = serialize($obj);
				
header("Location: cart.php?u");
?>