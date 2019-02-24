<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
if (isset($_POST ["name"])) {
	$name = $_POST["name"];
	$category = $_POST["category"];
	$price = $_POST["price"];
	$weight = $_POST["weight"];
	$detail = $_POST["detail"];
	// change file name
	$sur = strrchr($_FILES['pic']['name'], "."); 
	$newfilename = (Date("dmy_His").$sur); 
	$path = "../products/" . $newfilename;
	$upload = move_uploaded_file($_FILES["pic"]["tmp_name"],$path);
	if($upload){
		//$link = mysql_connect("localhost","root","1234");
		$link = mysql_connect("localhost","tawansho_db","123456");
		mysql_select_db("tawansho_db",$link);
		mysql_query("SET NAMES UTF8");
		$query = "INSERT INTO product VALUES(null,'$name','$price','$detail','$weight','$newfilename',$category)";
		$result = mysql_query($query);
		header("Location: product.php?action=addsuccess");
	} else {
		header("Location: addproduct.php?err");
	}
	mysql_close($link);
} 

?>