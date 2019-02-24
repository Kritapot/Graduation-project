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
  </head>
  <?php 
  if(!isset($_SESSION["admin"])){
  	header("Location: login.php");
  }
  ?>
  <body>  
    <!-- Left column -->
    <div class="templatemo-flex-row">
      <?php include_once 'leftmenu.php';?>
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <?php 
        if(isset($_POST["m"])){
        	$mmm = $_POST["m"];
        	$yyy = $_POST["y"];
        } else {
        	$mmm = $_GET["m"];
        	$yyy = $_GET["y"];
        }
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
                    <h2 class="media-heading text-uppercase">สรุปยอดขายประจำเดือน <?= $month[number_format($mmm)-1]." ปี พ.ศ. ".($yyy+543);?></h2>
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
        $query = "SELECT DISTINCT SUBSTRING(o_date,1,10) AS o_date FROM orders WHERE o_date LIKE '%".$mmm."-".$yyy."%'";
        $result = mysql_query($query,$link);
        $row = mysql_num_rows($result);
        $dx = $d."-".$m."-".($y-543);
        ?>
        <?php if($row > 0){?>
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
              
              <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="../images/money.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">รายละเอียดยอดขายในแต่ละวันของเดือน <?= $month[number_format($mmm)-1]." ปี พ.ศ. ".($yyy+543);?> </h2>
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
		function getCount($date){
			//$link = mysql_connect("localhost","root","1234");
			$link = mysql_connect("localhost","tawansho_db","123456");
			mysql_select_db("tawansho_db",$link);
			mysql_query("SET NAMES UTF8");
			$q = "SELECT count(o_id) as ox FROM orders WHERE o_date LIKE ('%$date%')";
			$r = mysql_query($q,$link);
			$s = mysql_fetch_object($r);
			return $s->ox;
		}
		$x = 0;
		$tt = 0;
		if($row > 0){
			while($data = mysql_fetch_object( $result )){
			$sum = getSum($data->o_date);
			$count = getCount($data->o_date);
			$df = split("-", $data->o_date);
			$tt += $sum;

		?>
                <tr align="center">
                    <td style="vertical-align: middle;"><?php echo $x+1;?></td>
                    <td style="vertical-align: middle;"><?php echo number_format($df[0]).' '.$month[number_format($df[1]-1)].' '.($df[2]+543)?></td>
                    <td style="vertical-align: middle;"><?php echo number_format($sum)?> บาท</td>
                    <td style="vertical-align: middle;"><?php echo $count?></td>
                    <td style="vertical-align: middle;"><a target="_blank" href="getcirculation.php?date=<?php echo $data->o_date;?>" style="cursor: pointer;">รายละเอียด</a></td>
                   
                  </tr>
                  
       	
       	<?php $x++;}
       	echo "<script>document.getElementById('ok').innerHTML = 'ยอดขายทั้งหมด ".number_format($tt)." บาท'</script>";
		}?>
       
       	</tbody>
              </table> 
          </div></div>
          </div>
          <?php } else {
          	echo "<script>document.getElementById('ok').innerHTML = 'ยอดขายทั้งหมด 0 บาท'</script>";
          	?>
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
             <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="../images/status.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">ไม่พบข้อมูลยอดขายของเดือนนี้
                    <a href="circulation.php">ย้อนกลับ</a>
                    </h2>
                  </div>        
                </div>
              </div></div>
          <?php }?>
          
             
        </div>
      </div>
    </div>

  </body>
</html>