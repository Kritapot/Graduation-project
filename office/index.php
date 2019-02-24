<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once 'head.php'?>
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
        //$link = mysql_connect("localhost","root","1234");
       	$link = mysql_connect("localhost","tawansho_db","123456");
        mysql_select_db("tawansho_db",$link);
        mysql_query("SET NAMES UTF8");
        $query = "SELECT * FROM orders o JOIN member m ON m.m_id = o.m_id WHERE o.o_status = 'ชำระเงินเรียบร้อยแล้ว' ORDER BY o.o_id ASC";
        $result = mysql_query($query,$link);
        $row = mysql_num_rows($result);
        ?>
        <div class="templatemo-content-container">
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
              <i class="fa fa-times"></i>
              <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="images/admin.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">ยินดีต้อนรับเข้าสู่ระบบ</h2>
                  </div>        
                </div>  
              </div>
              </div>
        <?php if($row > 0){?>
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
              <i class="fa fa-times"></i>
              <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="../images/status.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">รายการใบสั่งซื้อที่รอการตรวจสอบการชำระเงิน</h2>
                  </div>        
                </div><hr>
              
    		<div class="panel panel-default table-responsive">
              <table class="table table-striped table-bordered templatemo-user-table">
                <thead>
                  <tr align="center">
                    <td>#</td>
                    <td>เลขที่ใบสั่งซื้อ</td>
                    <td>วันเวลาที่ทำการสั่งซื้อ</td>
                    <td>สถานะการสั่งซื้อ</td>
                    <td>รายละเอียดเพิ่มเติม</td>

                  </tr>
                </thead>
                <tbody>   
		<?php 
		
		$x = 0;
		if($row > 0){
			while($data = mysql_fetch_object( $result )){
			if($data->o_status == "ชำระเงินเรียบร้อยแล้ว"){
				$data->o_status = "<font color='green'>".$data->o_status."</font>";
			}
			
		?>
                <tr align="center">
                    <td style="vertical-align: middle;"><?php echo $x+1;?></td>
                    <td style="vertical-align: middle;"><?php echo $data->o_code?></td>
                    <td style="vertical-align: middle;"><?php echo $data->o_date?></td>
                    <td style="vertical-align: middle;"><?php echo $data->o_status?></td>
                    <td style="vertical-align: middle;"><a target="_blank" href="getorder.php?code=<?php echo $data->o_code;?>" style="cursor: pointer;">รายละเอียด</a></td>
                   
                  </tr>
                  
       	
       	<?php $x++;}}?>
       
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
                    <h2 class="media-heading text-uppercase">ไม่พบข้อมูลการชำระเงิน</h2>
                  </div>        
                </div>  
              </div>
              </div>
              
          <?php }?>
          
             
        </div>
      </div>
    </div>

  </body>
</html>