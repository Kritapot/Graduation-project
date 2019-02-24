<?php
session_start();
include_once 'member.class.php';
include_once 'order.class.php';
include_once 'product.class.php';

function randomNo(){
	$dg = "TW";
	for ($i = 0; $i<6; $i++)
	{
	$dg .= mt_rand(0,9);
	}
	return $dg;
}
function generateCode(){
	$nnn = "";
	while(true){
		//$link = mysql_connect("localhost","root","1234");
		$link = mysql_connect("localhost","tawansho_db","123456");
		mysql_select_db("tawansho_db",$link);
		mysql_query("SET NAMES UTF8");
		$query = "select * from orders";
		$result = mysql_query($query);
		$nnn = randomNo();
		$chk = true;
		while($data = mysql_fetch_object( $result ) ) {
			if($nnn == $data->o_code){
				$chk = false;
			}
		}
		if($chk){
			break;
		}
	}
	return $nnn;
}
$no = generateCode();
$m = unserialize($_SESSION["member"]);
date_default_timezone_set("Asia/Bangkok");
$date = date('d-m-Y H:i:s');
$sendType = $_SESSION["sendType"];
$address = $_POST["address"];
//$link = mysql_connect("localhost","root","1234");
$link = mysql_connect("localhost","tawansho_db","123456");
mysql_select_db("tawansho_db",$link);
mysql_query("SET NAMES UTF8");
$query = "INSERT INTO orders VALUES(NULL,'$no','$date','รอการชำระเงิน','$address','',".$m->id.");";
mysql_query($query);
//echo $query;
$r = mysql_query ("select max(o_id) as oid from orders");
$o = mysql_fetch_object($r);
$total = 0;
for($i = 0; $i < count($_SESSION["list"]); $i++){
	$obj = unserialize($_SESSION["list"][$i]);
	$sum = $obj->product->price*$obj->amount;
	$total += $obj->product->price*$obj->amount;
	$q2 = "INSERT INTO orderdetail VALUES (NULL,'".$obj->product->name."','".$obj->product->price."','$obj->amount','$sum',$o->oid);";
	mysql_query($q2);
	//echo "<br><br>".$q2;
}

$strTo = $m->email;
$strSubject = "รายละเอียดการสั่งซื้อสินค้าจากเว็บตะวันช็อป";
$strHeader = "From: tawanshop@tawanshopcosmetics.com";
$strMessage = " เรียนคุณ ".$m->name." ".$m->lastname." \r\n\r\n ใบสั่งซื้อเลขที่ $no \r\n\r\n ดูข้อมูลใบสั่งซื้อและแจ้งชำระเงินได้ที่ : http://www.tawanshopcosmetics.com/getorder.php?code=$no \r\n\r\n ขอบคุณที่ใช้บริการ";
$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //

$st = split("-", $sendType);
$_SESSION["total"] = $total+$st[1];
$_SESSION["no"] = $no;
unset($_SESSION['list']);
unset($_SESSION['cust']);
header("Location: ordersuccess.php");
?>