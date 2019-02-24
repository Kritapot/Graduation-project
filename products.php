<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once 'head.php';?>
  </head>
  <body>  
    <!-- Left column -->
    <div class="templatemo-flex-row">
      
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <?php include_once 'menu.php';?>
        <div class="templatemo-content-container" style="padding-top: 60px;">
        <!--
        <div class="templatemo-flex-row flex-content-row">
        <div class="templatemo-content-widget white-bg col-1 text-center">
        <form class="form-inline" role="search">
        	<div class="input-group">
      		<input type="text" class="form-control" placeholder="ค้นหาสินค้า">
      		<span class="input-group-btn">
        	<button class="btn btn-default" type="button">Go!</button>
      		</span>
    		</div>
        </form>
        </div>
        </div>
        --> 
        <?php
        $actual_link = basename($_SERVER['PHP_SELF']);
        if(isset($_GET["cate"])){
        	$c = $_GET["cate"];
        	//$link = mysql_connect("localhost","root","1234");
        	$link = mysql_connect("localhost","tawansho_db","123456");
        	mysql_select_db("tawansho_db",$link);
        	mysql_query("SET NAMES UTF8");
        	$ss = 0;
        	$cc = 8;
        	if(isset($_GET["page"])){
        		$cc = 8*$_GET["page"];
        		if($cc > 8){
        			$ss = $cc - 8;
        		}
        	}
        	$query = "select * from product where cate_id = $c limit $ss,8";
        	$result = mysql_query($query,$link);
        	$row = mysql_num_rows(mysql_query("select * from product where cate_id = $c",$link));
        
        	$i = 1;
        	if($row == 0){
        		echo '<div class="templatemo-flex-row flex-content-row"> ';
        		echo '<div class="templatemo-content-widget white-bg col-1 text-center">';
        		echo '<h3>ขออภัย ! ไม่พบสินค้าในหมวดนี้</h3>';
        		echo '</div></div> ';
        	}else {
        		while($data = mysql_fetch_object( $result ) ) {
        			if(($i == 1 or $i % 4 == 1)){
        				echo '<div class="templatemo-flex-row flex-content-row"> ';
        			}
        			?>
        		        	            <div class="templatemo-content-widget white-bg col-1 text-center">
        		        	              <h2 class="text-uppercase" style="margin-bottom: 20px;"><?php echo $data->p_name;?></h2>
        		        	              <img src="products/<?php echo $data->p_pic;?>" alt="Bicycle" class="img-circle img-thumbnail">
        		        	              <hr>
        		        	              <p><?php echo $data->p_detail;?> </p>
        		        	              <hr>
        		        	              <p><button class="templatemo-white-button1"disabled><?php echo $data->p_price;?> บาท</button></p>
        		        	              <input onclick="javascript:location.href='productdetail.php?id=<?php echo $data->p_id;?>'" type="button" class="templatemo-pink-button" value="สั่งซื้อสินค้า">
        		        	            </div>                    
        		        	          
        		         <?php 
        		        if($i % 4 == 0){
        		        echo '</div> ';
        		        }
        		         $i++;
        		       	}
        	}
        	
        }else{ 
		//$link = mysql_connect("localhost","root","1234");
		$link = mysql_connect("localhost","tawansho_db","123456");
		mysql_select_db("tawansho_db",$link);
		mysql_query("SET NAMES UTF8");
		$ss = 0;
		$cc = 8;
		if(isset($_GET["page"])){
			$cc = 8*$_GET["page"];
			if($cc > 8){
				$ss = $cc - 8;
			}
		}
		$query = "select * from product limit $ss,8";
		$result = mysql_query($query,$link);
		$row = mysql_num_rows(mysql_query("select * from product",$link));
		$i = 1;
		while($data = mysql_fetch_object( $result ) ) {
			if($i == 1 or $i % 4 == 1){
				echo '<div class="templatemo-flex-row flex-content-row"> ';
			}
		?>         
            <div class="templatemo-content-widget white-bg col-1 text-center">
              <h2 class="text-uppercase" style="margin-bottom: 20px;"><?php echo $data->p_name;?></h2>
              <img src="products/<?php echo $data->p_pic;?>" alt="Bicycle" class="img-circle img-thumbnail">
              <hr>
              <p><?php echo $data->p_detail;?> </p>
              <hr>
              <p><button class="templatemo-white-button1"disabled><?php echo $data->p_price;?> บาท</button></p>
              <input onclick="javascript:location.href='productdetail.php?id=<?php echo $data->p_id;?>'" type="button" class="templatemo-pink-button" value="สั่งซื้อสินค้า">
            </div>                    
          
          <?php 
          if($i % 4 == 0){
          	echo '</div> ';
          }
          $i++;
		}}
		?>
          

</div>
<?php if($row > 8){?>
<ul class="pagination" style="float:right;margin-right: 50px;">
  <?php for($x = 0; $x < ceil($row/8); $x++){?>
  <li <?php echo ($_GET["page"] == ($x+1) or (!isset($_GET["page"]) and $x == 0)) ?'class="active"':""; ?>><a href="<?php echo isset($_GET["cate"])?$actual_link."?cate=".$_GET["cate"]."&page=".($x+1):$actual_link."?page=".($x+1);?>"><?php echo $x+1;?></a></li>
  <?php }?>
</ul><?php }?>
        </div>
      </div>
    
    
    

  </body>
</html>