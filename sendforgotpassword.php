<?php
session_start();
//$link = mysql_connect("localhost","root","1234");
$link = mysql_connect("localhost","tawansho_db","123456");
mysql_select_db("tawansho_db",$link);
mysql_query("SET NAMES UTF8");

$email = $_GET["email"];
echo $email;
$query = "SELECT * FROM member";
$result = mysql_query($query,$link);
$chk = false;
$pwd = "";
$name = "";
while($data = mysql_fetch_object( $result ) ) {
	if($email == $data->m_email){
		$chk = true;
		$pwd = $data->m_password;
		$name = $data->m_name." ".$data->m_lastname;
	}
}
echo "ccc = ".$chk;
if($chk){
	$strTo = $email;
	$strSubject = "รหัสผ่านของคุณจากเว็บตะวันช็อป";
	$strHeader = "From: tawanshop@tawanshopcosmetics.com";
	$strMessage = " เรียนคุณ ".$name." \r\n\r\n รหัสผ่านของคุณคือ : ".$pwd." \r\n\r\n เชิญเลือกซื้อสินค้าได้ตามสะดวกที่ : http://www.tawanshopcosmetics.com \r\n\r\n ขอบคุณที่ใช้บริการ";
	$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
	header("Location: forgotpassword.php?sc");
} else {
	header("Location: forgotpassword.php?err");
}


?>