<?php
session_start();
require_once 'member.class.php';

//$link = mysql_connect("localhost","root","1234");
$link = mysql_connect("localhost","tawansho_db","123456");
mysql_select_db("tawansho_db",$link);
mysql_query("SET NAMES UTF8");
$name = $_POST["name"]; 
$lastname = $_POST["lastname"];
$tel = $_POST["tel"];
$m = unserialize($_SESSION["member"]);
$query = "UPDATE member SET m_name='$name',m_lastname='$lastname',m_tel='$tel' WHERE m_id = ".$m->id;
mysql_query($query,$link);
$m->name = $name;
$m->lastname = $lastname;
$m->tel = $tel;
$_SESSION["member"] = serialize($m);
header("Location: member.php?pf");


?>