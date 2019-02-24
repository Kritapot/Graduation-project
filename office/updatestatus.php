<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
if (isset($_GET["status"])) {
	$status = $_GET["status"];
	$oid = $_GET["code"];
	$ems = "";
	if($status == "ชำระเงินเรียบร้อยแล้ว"){
		$status = "รอการจัดส่งสินค้า";
	} else if($status == "รอการจัดส่งสินค้า"){
		$status = "จัดส่งสินค้าเรียบร้อย";
		$ems = $_GET["ems"];
		$name = $_GET["name"];
		$strTo = $_GET["email"];
		$strSubject = "จัดส่งสินค้าเรียบร้อย";
		$strHeader = "From: tawanshop@tawanshopcosmetics.com";
		$strMessage = " เรียนคุณ ".$name." \r\n\r\n ใบสั่งซื้อเลขที่ $oid \r\n\r\n ขณะนี้้เราได้ทำการจัดส่งสินค้าไปให้ท่านเรียบร้อยแล้ว \r\n\r\n ดูข้อมูลหมายเลขพัสดุได้ที่ : http://www.tawanshopcosmetics.com/getorder.php?code=$oid \r\n\r\n ขอบคุณที่ใช้บริการ";
		$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
	}
	//$link = mysql_connect("localhost","root","1234");
	$link = mysql_connect("localhost","tawansho_db","123456");
	mysql_select_db("tawansho_db",$link);
	mysql_query("SET NAMES UTF8");
	$query = "UPDATE orders SET o_status = '$status',o_sendcode = '$ems' WHERE o_code = '$oid'";
	mysql_query($query);
	mysql_close($link);
	header("Location: getorder.php?code=$oid");  
} 

?>