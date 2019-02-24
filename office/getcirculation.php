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
	date_default_timezone_set("Asia/Bangkok");
    $d = date('d'); 
    $m = date('m'); 
    $y = date('Y')+543;
    $month = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน", 
                                 "กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 
    $df = split("-", $_GET["date"]);
?> 
        <div class="templatemo-content-container">
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
              <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="images/admin.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">สรุปยอดขายประจำวันที่ <?= number_format($df[0]).' '.$month[number_format($df[1]-1)].' '.($df[2]+543)?></h2>
                  <br><label style="color:red;">*ยอดขายจะนับเฉพาะใบสั่งซื้อที่ชำระเงินแล้วเท่านั้น</label>
                  </div>        
                </div>  
              </div>
              </div>
              
        <?php 
        //$link = mysql_connect("localhost","root","1234");
       	$link = mysql_connect("localhost","tawansho_db","123456");
        mysql_select_db("tawansho_db",$link);
        mysql_query("SET NAMES UTF8");
        $date = $_GET["date"];
        $query = "SELECT * FROM orders WHERE o_date LIKE ('%$date%')";
        $result = mysql_query($query,$link);
        $row = mysql_num_rows($result);
        ?>
        <?php if($row > 0){?>
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
              
              <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="../images/status.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">รายละเอียดใบสั่งซื้อ</h2>
                  </div>        
                </div><hr>
              
    		<div class="panel-default table-responsive">
              <table id="example" class="display">
                <thead>
                  <tr align="center">
                    <td>#</td>
                    <td>เลขที่ใบสั่งซื้อ</td>
                    <td>วัน เวลาที่สังซื้อ</td>
                    <td>ยอดขายทั้งหมด</td>
                    <td>สถานะใบสั่งซื้อ</td>
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
			$q = "SELECT * FROM orders WHERE o_date LIKE ('%$date%')";
			$r = mysql_query($q,$link);
			$sum = 0;
			while ($dd = mysql_fetch_object($r)){
				$x = mysql_query("select sum(od_psum) AS sumx  From orderdetail where o_id = ".$dd->o_id);
				$y = mysql_fetch_object($x);
				$sum += $y->sumx;
			}
			return $sum;
		}
		
		$x = 0;
		$total = 0;
		if($row > 0){
			while($data = mysql_fetch_object( $result )){
			$sum = getSum($data->o_date);
			if($data->o_status != "รอการชำระเงิน"){
				$total += $sum;
			}
		?>
		
                <tr align="center">
                    <td style="vertical-align: middle;"><?php echo $x+1;?></td>
                    <td style="vertical-align: middle;"><?php echo $data->o_code?></td>
                    <td style="vertical-align: middle;"><?php echo $data->o_date?></td>
                    <td style="vertical-align: middle;"><?php echo $data->o_status == "รอการชำระเงิน"?'ไม่นับรวม':number_format($sum)." บาท";?></td>
                    <td style="vertical-align: middle;">
                    <?php if($data->o_status == "รอการชำระเงิน"){
                    	echo $data->o_status;
					} else if($data->o_status == "ชำระเงินเรียบร้อยแล้ว"){?>
						<font color="green"><?php echo $data->o_status?></font>
						<a href="javascript:confirmChangeStatus('<?php echo $data->o_code;?>','<?php echo $data->o_status;?>')" style="float: right;cursor: pointer;">ยืนยันการชำระเงิน</a>
					<?php } else if($data->o_status == "รอการจัดส่งสินค้า"){?>
						<font color="blue"><?php echo $data->o_status?></font>
						<a href="javascript:confirmChangeStatus('<?php echo $data->o_code;?>','<?php echo $data->o_status;?>')" style="float: right;cursor: pointer;">ยืนยันการจัดส่งสินค้า</a>
					<?php } else if($data->o_status == "จัดส่งสินค้าเรียบร้อย"){?>
						<font color="#39ADB4"><?php echo $data->o_status?></font>
						<span style="float: right;"></span>
					<?php }?>
                    </td>
                    <td style="vertical-align: middle;"><a target="_blank" href="getorder.php?code=<?php echo $data->o_code;?>" style="cursor: pointer;">รายละเอียด</a></td>
                   
                  </tr>
                  
       	
       	<?php $x++;}}?>
       	<tr  align="center">
       	<td colspan="4" style="vertical-align: middle;"><b>ยอดขายทั้งหมด ( ไม่นับใบสั่งซื้อที่ยังไม่ได้ชำระเงิน )</b></td>
       	<td colspan="1" style="vertical-align: middle;"><b><?php echo number_format($total);?> บาท</b></td>
       	</tr>
       	</tbody>
              </table> 
          </div></div>
          </div>
          <?php } else {?>
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
             <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="../images/status.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">ไม่พบข้อมูลยอดขายของวันนี้
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