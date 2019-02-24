<?php
if(isset($_GET["id"])){
	//$link = mysql_connect("localhost","root","1234");
	$link = mysql_connect("localhost","tawansho_db","123456");
	mysql_select_db("tawansho_db",$link);
	mysql_query("SET NAMES UTF8");
	mysql_query("Delete from product WHERE p_id = ".$_GET["id"]);
	mysql_close($link);
	//unlink("../njberry/images/products/")
	header("Location: product.php?action=deletesuccess");
}