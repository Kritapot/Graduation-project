
<?php

//$link = mysql_connect("localhost","root","1234");
$link = mysql_connect("localhost","tawansho_db","123456");
if(isset($_GET["code"])){
	$oid = $_GET["code"];
}
mysql_select_db("tawansho_db",$link);
mysql_query("SET NAMES UTF8");
$query = "SELECT * FROM transfermoney WHERE o_code = '$oid'";
$result = mysql_query($query,$link);
$data = mysql_fetch_object( $result );
$row = mysql_num_rows($result);
if($row > 0){
	echo "<img src='../orderimg/".$data->t_image."'>";
} else {
	echo "<h2>ไม่พบข้อมูล</h2>";
}
?>