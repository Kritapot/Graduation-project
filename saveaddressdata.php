<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
include_once 'member.class.php';
session_start();
if(isset($_POST["zipcode"])){
	//$link = mysql_connect("localhost","root","1234");
	$link = mysql_connect("localhost","tawansho_db","123456");
	//mysql_select_db("thailand_db",$link);
	mysql_select_db("tawansho_thailand",$link);
	mysql_query("SET NAMES UTF8");
	$result = mysql_query("
				SELECT
					PROVINCE_NAME AS name
				FROM
					province
				WHERE
					PROVINCE_ID = ".$_POST["address4"].";
			");
	$data = mysql_fetch_object($result);	
	$add4 = str_replace("*", "", $data->name);
	$add4 = "จ.".$add4;
	
	$result = mysql_query("
				SELECT
					AMPHUR_NAME AS name
				FROM
					amphur
				WHERE
					AMPHUR_ID = ".$_POST["address3"].";
			");
	$data = mysql_fetch_object($result);
	$add3 = str_replace("*", "", $data->name);

	if(strpos($add3, "เขต") !== false){
		
	} else {
		$add3 = "อ.".$add3;
	}
	
	$result = mysql_query("
				SELECT
					DISTRICT_NAME AS name
				FROM
					district
				WHERE
					DISTRICT_ID = ".$_POST["address2"].";
			");
	$data = mysql_fetch_object($result);
	$add2 = str_replace("*", "", $data->name);
	$add2 = "ต.".$add2;
	$add1 = $_POST["address1"];
	$zipcode = $_POST["zipcode"];
	$address = $add1.' '.$add2.' '.$add3.' '.$add4.' '.$zipcode;
	$m = unserialize($_SESSION["member"]);
	mysql_select_db("tawansho_db",$link);
	$q = "insert into address values(null,'$address',".$m->id.");";
	mysql_query($q);
	$query = "SELECT * FROM address where m_id = ".$m->id;
	$resultx = mysql_query($query,$link);
	if(mysql_num_rows($resultx) > 0){
		$add = array();
		while($data = mysql_fetch_object($resultx)){
			$add[] = $data->a_address;
		}
		$m->address = $add;
	}
	$_SESSION["member"] = serialize($m);
	header("Location: member.php");
} else {
	header("Location: newaddress.php?err");
}

?>