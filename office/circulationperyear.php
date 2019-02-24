<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once 'head.php'?>
    <?php include_once 'pagination.php';?>
    <script>
    $(document).ready(function() {
        $('#example').dataTable( {
            "pagingType": "full_numbers"
        } );
    } );
    
    </script>
    <script>
    function changeShow(){
		var event = new Event('change');
		// Dispatch it.
		document.getElementsByTagName("select")[0].selectedIndex = 1;
		document.getElementsByTagName("select")[0].dispatchEvent(event);
	}
    </script>
  </head>
  <?php 
  if(!isset($_SESSION["admin"])){
  	header("Location: login.php");
  }
  ?>
  <body onload="changeShow()">  
    <!-- Left column -->
    <div class="templatemo-flex-row">
      <?php include_once 'leftmenu.php';?>
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <?php 
        
	date_default_timezone_set("Asia/Bangkok");
    $d = date('d'); 
    $m = date('m'); 
    $y = date('Y')+543;
    $month = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน", 
                                 "กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 
?> 
        <div class="templatemo-content-container">
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
              <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="images/admin.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">สรุปยอดขายประจำปี พ.ศ.  <?= ($_POST["y"]+543);?></h2>
                  <hr><h2 id="ok"></h2>
                  </div>        
                </div>  
              </div>
              </div>
        <?php 
        //$link = mysql_connect("localhost","root","1234");
       	$link = mysql_connect("localhost","tawansho_db","123456");
        mysql_select_db("tawansho_db",$link);
        mysql_query("SET NAMES UTF8");
        ?>
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
              
              <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="../images/money.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">รายละเอียดยอดขายในแต่ละเดือนของปี พ.ศ. <?= $_POST["y"]+543;?> </h2>
                    <label style="color:red;">*ยอดขายจะนับเฉพาะใบสั่งซื้อที่ชำระเงินแล้วเท่านั้น</label>
                  </div>        
                </div><hr>
              
    		<div class="panel-default table-responsive">
              <table id="example" class="display">
                <thead>
                  <tr align="center">
                    <td>#</td>
                    <td>วัน-เดือน-ปี</td>
                    <td>ยอดขายทั้งหมด</td>
                    <td>จำนวนใบสั่งซื้อ</td>
                    <td>รายละเอียดเพิ่มเติม</td>

                  </tr>
                </thead>
                <tbody>   
		<?php

		function getSum($date){
			//$link = mysql_connect("localhost","root","1234");
			$link = mysql_connect("localhost","tawansho_db","123456");
			mysql_select_db("tawansho_db",$link);
			mysql_query("SET NAMES UTF8");
			$q = "SELECT * FROM orders WHERE o_date LIKE ('%$date%') and (o_status='รอการจัดส่งสินค้า' or o_status='จัดส่งสินค้าเรียบร้อย')";
			$r = mysql_query($q,$link);
			$sum = 0;
			while ($dd = mysql_fetch_object($r)){
				$x = mysql_query("select sum(od_psum) AS sumx  From orderdetail where o_id = ".$dd->o_id);
				$y = mysql_fetch_object($x);
				$sum += $y->sumx;
			}
			return $sum;
		}
		function getCount($m){
			//$link = mysql_connect("localhost","root","1234");
			$link = mysql_connect("localhost","tawansho_db","123456");
			mysql_select_db("tawansho_db",$link);
			mysql_query("SET NAMES UTF8");
			$q = "SELECT count(o_id) as ox FROM orders WHERE o_date LIKE ('%".$m."-".$_POST["y"]."%')";
			$r = mysql_query($q,$link);
			$s = mysql_fetch_object($r);
			if(mysql_num_rows($r) > 0){
				return $s->ox;
			} else {
				return 0;
			}
		}
		$st = 0;
		for($q = 1; $q < 13; $q++){
			$tt = 0;
			$pp = "0".$q;
			$query = "SELECT DISTINCT SUBSTRING(o_date,1,10) AS o_date FROM orders WHERE o_date LIKE '%".$pp."-".$_POST["y"]."%'";
			$result = mysql_query($query,$link);
			$row = mysql_num_rows($result);
			if($row > 0){
				while($data = mysql_fetch_object( $result )){
					$sum = getSum($data->o_date);
					$count = getCount($pp);
					$tt += $sum;
				}
			} else {
				$count = 0;
			}
			$st += $tt;
		?>
                <tr align="center">
                    <td style="vertical-align: middle;"><?php echo $q;?></td>
                    <td style="vertical-align: middle;"><?php echo $month[number_format($q-1)].' '.($_POST["y"]+543)?></td>
                    <td style="vertical-align: middle;"><?php echo number_format($tt)?> บาท</td>
                    <td style="vertical-align: middle;"><?php echo $count?></td>
                    <td style="vertical-align: middle;"><a target="_blank" href="circulationpermonth.php?<?php echo "m=".$pp."&y=".$_POST["y"];?>" style="cursor: pointer;">รายละเอียด</a></td>
                   
                  </tr>
                  
       	<?php 
		
		}
		echo "<script>document.getElementById('ok').innerHTML = 'ยอดขายทั้งหมด ".number_format($st)." บาท'</script>";
		?>
       
       	</tbody>
              </table> 
          </div></div>
          </div>
  
        </div>
      </div>
    </div>

  </body>
</html>
