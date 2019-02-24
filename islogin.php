<?php
session_start();
require_once 'member.class.php';

//$link = mysql_connect("localhost","root","1234");
$link = mysql_connect("localhost","tawansho_db","123456");
mysql_select_db("tawansho_db",$link);
mysql_query("SET NAMES UTF8");

$email = $_GET["email"];
$password = $_GET["password"];

$query = "SELECT * FROM member";
$result = mysql_query($query,$link);
while($data = mysql_fetch_object( $result ) ) {
	if($email == $data->m_email){
		if($password == $data->m_password){
			$m = new Member();
			$m->id = $data->m_id;
			$m->name = $data->m_name;
			$m->lastname = $data->m_lastname;
			$m->email = $data->m_email;
			$m->password = $data->m_password;
			$m->tel = $data->m_tel;
			$query = "SELECT * FROM address where m_id = ".$data->m_id;
			$result = mysql_query($query,$link);
			$add = array();
			if(mysql_num_rows($result) > 0){
				while($data2 = mysql_fetch_object($result)){
					$add[] = $data2->a_address;
				}
				$m->address = $add;
			} else {
				$m->address = "none";
			}
			$_SESSION["member"] = serialize($m);
			header("Location: member.php");
		} else {
			header("Location: login.php?err");
		}
	} else {
		header("Location: login.php?err");
	}
}


?>