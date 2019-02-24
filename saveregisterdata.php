<?php

session_start();
require_once 'member.class.php';

//$link = mysql_connect("localhost","root","1234");
$link = mysql_connect("localhost","tawansho_db","123456");
mysql_select_db("tawansho_db",$link);
mysql_query("SET NAMES UTF8");
$email = $_POST["yemail"];
$name = $_POST["name"]; 
$lastname = $_POST["lastname"];
$password = $_POST["pwd"];
$tel = $_POST["tel"];
$query = "SELECT * FROM member";
$result = mysql_query($query,$link);
$chk = true;
while($data = mysql_fetch_object( $result ) ) {
	if($email == $data->m_email){
		$chk = false;
	}
}
if($chk){
	$query = "INSERT INTO member VALUES(NULL,'$name','$lastname','$tel','$email','$password')";
	mysql_query($query);
	$strTo = $email;
	$strSubject = "รายละเอียดการสมัครสมาชิกจากเว็บตะวันช็อป";
	$strHeader = "From: webmaster@tawashopcosmetics.com";
	$strMessage = " เรียนคุณ ".$name." ".$lastname." \r\n\r\n ท่านได้ทำการสมัครสมาชิกเว็บตะวันช็อปเรียบร้อยแล้ว \r\n\r\n Email ที่ใช้สำหรับเข้าสู่ระบบ : ".$email." \r\n\r\n รหัสผ่าน : ".$password." \r\n\r\n เชิญเลือกซื้อสินค้าได้ตามสะดวกที่ : http://www.tawanshopcosmetics.com \r\n\r\n ขอบคุณที่ใช้บริการ";
	$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
	header("Location: islogin.php?r=1&email=$email&password=$password");
} else {
	header("Location: register.php?err");
}

?>