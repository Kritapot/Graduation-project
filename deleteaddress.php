<?php
session_start();
include_once 'member.class.php';
if(isset($_GET["id"])){
	//$link = mysql_connect("localhost","root","1234");
	$link = mysql_connect("localhost","tawansho_db","123456");
	mysql_select_db("tawansho_db",$link);
	mysql_query("SET NAMES UTF8");
	mysql_query("Delete from address WHERE a_address = '".$_GET["id"]."'");
	$m = unserialize($_SESSION["member"]);
	$query = "SELECT * FROM address where m_id = ".$m->id;
	$resultx = mysql_query($query,$link);
	if(mysql_num_rows($resultx) > 0){
		$add = array();
		while($data = mysql_fetch_object($resultx)){
			$add[] = $data->a_address;
		}
		$m->address = $add;
	} else {
		$m->address = "none";
	}
	$_SESSION["member"] = serialize($m);
	mysql_close($link);
	header("Location: member.php?");
}