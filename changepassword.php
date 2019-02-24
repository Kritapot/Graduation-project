<?php
session_start();
require_once 'member.class.php';

//$link = mysql_connect("localhost","root","1234");
mysql_select_db("tawansho_db",$link);
mysql_query("SET NAMES UTF8");
$password = $_POST["newpwd"]; 
$m = unserialize($_SESSION["member"]);
$query = "UPDATE member SET m_password='$password' WHERE m_id = ".$m->id;
mysql_query($query,$link);
$m->password = $password;
$_SESSION["member"] = serialize($m);
header("Location: member.php?pwd");


?>