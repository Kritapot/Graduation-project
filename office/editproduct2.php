<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
if (isset($_POST ["name"])) {
	$name = $_POST["name"];
	$category = $_POST["category"];
	$price = $_POST["price"];
	$weight = $_POST["weight"];
	$detail = $_POST["detail"];
	$pid = $_POST["pid"];
	// change file name
	$sur = strrchr($_FILES['pic']['name'], "."); 
	$newfilename = (Date("dmy_His").$sur); 
	$path = "../products/" . $newfilename;
	//$link = mysql_connect("localhost","root","1234");
	$link = mysql_connect("localhost","tawansho_db","123456");
	mysql_select_db("tawansho_db",$link);
	mysql_query("SET NAMES UTF8");
	if($_FILES['pic']['name'] != ""){
		$query = "UPDATE product SET p_name='$name',p_price='$price',cate_id=$category,p_pic='$newfilename',p_weight='$weight',p_detail='$detail' WHERE p_id=$pid";
		mysql_query($query);
		if (move_uploaded_file ($_FILES["pic"]["tmp_name"], $path ))
		{
			unlink("../products/$oldpic");
			header("Location: product.php?action=editsuccess");
		}
	} else {
		$query = "UPDATE product SET p_name='$name',p_price='$price',cate_id=$category,p_weight='$weight',p_detail='$detail' WHERE p_id=$pid";
		mysql_query($query);
		header("Location: product.php?action=editsuccess");
	}
	
	mysql_close($link);
} 

?>