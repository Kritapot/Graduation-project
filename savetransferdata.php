<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
if (isset($_POST["code"])) {
	// change file name
	$code = $_POST["code"];
	$sur = strrchr($_FILES['pic']['name'], "."); 
	$newfilename = (Date("dmy_His").$sur); 
	$path = "orderimg/" . $newfilename;
	$upload = move_uploaded_file($_FILES["pic"]["tmp_name"],$path);
	if($upload){
		//$link = mysql_connect("localhost","root","1234");
		$link = mysql_connect("localhost","tawansho_db","123456");
		mysql_select_db("tawansho_db",$link);
		mysql_query("SET NAMES UTF8");
		$query = "INSERT INTO transfermoney VALUES(null,'$newfilename','$code')";
		$result = mysql_query($query);
		mysql_query("Update orders SET o_status='ชำระเงินเรียบร้อยแล้ว' WHERE o_code = '$code'");
		header("Location: getorder.php?code=$code");
	} else {
		header("Location: transfermoney.php?err");
	}
	mysql_close($link);
} 

?>