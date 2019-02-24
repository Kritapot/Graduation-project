<?php
include_once 'product.class.php';
include_once 'order.class.php';
session_start();

if($_GET["id"] != "none"){
	if(isset($_GET["a"])){
		if(isset($_SESSION["list"])){
			$isAvalible = false;
			$point = 0;
			for($i = 0; $i < count($_SESSION["list"]); $i++){
				$obj = unserialize($_SESSION["list"][$i]);
				if($obj->product->id == $_GET["id"]){
					$isAvalible = true;
					$point = $i;
					break;
				}
			}
			if($isAvalible){
				$obj = unserialize($_SESSION["list"][$point]);
				$obj->amount += $_GET["a"];
				$_SESSION["list"][$point] = serialize($obj);
			} else{
				//$link = mysql_connect("localhost","root","1234");
				$link = mysql_connect("localhost","tawansho_db","123456");
				mysql_select_db("tawansho_db",$link);
				mysql_query("SET NAMES UTF8");
				$query = "select * from product where p_id=".$_GET["id"];
				$result = mysql_query($query,$link);
				$data = mysql_fetch_object( $result );
				$p = new Product();
				$p->id = $data->p_id;
				$p->name = $data->p_name;
				$p->pic = $data->p_pic;
				$p->detail = $data->p_detail;
				$p->price = $data->p_price;
				$o = new Order();
				$o->product = $p;
				$o->amount = $_GET["a"];
				$_SESSION["list"][] = serialize($o);
				mysql_close($link);
			}
		} else {
			//$link = mysql_connect("localhost","root","1234");
			$link = mysql_connect("localhost","tawansho_db","123456");
			mysql_select_db("tawansho_db",$link);
			mysql_query("SET NAMES UTF8");
			$query = "select * from product where p_id=".$_GET["id"];
			$result = mysql_query($query,$link);
			$data = mysql_fetch_object( $result );
			$p = new Product();
			$p->id = $data->p_id;
			$p->name = $data->p_name;
			$p->pic = $data->p_pic;
			$p->detail = $data->p_detail;
			$p->price = $data->p_price;
			$o = new Order();
			$o->product = $p;
			$o->amount = $_GET["a"];
			$_SESSION["list"][] = serialize($o);
			mysql_close($link);
		}
		header("Location: cart.php");
	}
}


?>