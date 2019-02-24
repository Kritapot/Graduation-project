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
        <div class="templatemo-content-container"  style="padding-top: 60px;">
        <div class="templatemo-content-widget white-bg" style="padding: 15px;padding-left: 30px;">       
                <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="images/information.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">ยินดีต้อนรับ คุณ <?php echo $m->name." ".$m->lastname;?></h2>
                  </div>        
                </div>               
        </div>
                
    	<?php
				//$link = mysql_connect("localhost","root","1234");
				$link = mysql_connect("localhost","tawansho_db","123456");
				if(isset($_GET["code"])){
					$oid = $_GET["code"];
				}
				mysql_select_db("tawansho_db",$link);
				mysql_query("SET NAMES UTF8");
				$query = "SELECT * FROM orders o JOIN member m ON m.m_id = o.m_id WHERE o.m_id = '".$m->id."' ORDER BY o.o_id DESC";
				$result = mysql_query($query,$link);
				$data = mysql_fetch_object( $result );
				$row = mysql_num_rows($result);
				if($row > 0){
		?>
		<div class="templatemo-content-widget white-bg" style="padding: 15px;padding-left: 30px;">       
                <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="images/icon.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">ข้อมูลการสั่งซื้อล่าสุด ใบสั่งซื้อเลขที่ <?php echo $data->o_code;?> 
                    </h2>
                    <a target="_blank" href="getorder.php?code=<?php echo $data->o_code;?>">แจ้งชำระเงินที่นี่</a>
                  </div>        
                </div>                
              </div>
           
       	<?php }?>
       	
		<div class="templatemo-content-widget white-bg" > 
		<h2>ประวัติการสั่งซื้อทั้งหมด</h2><hr>
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
		$query = "SELECT * FROM orders o JOIN member m ON m.m_id = o.m_id WHERE o.m_id = '".$m->id."' ORDER BY o.o_id DESC";
		$result = mysql_query($query,$link);
		$row = mysql_num_rows($result);
		$x = 0;
		if($row > 0){
			while($data = mysql_fetch_object( $result )){
			if($data->o_status == "ชำระเงินเรียบร้อยแล้ว"){
				$data->o_status = "<font color='green'>".$data->o_status."</font>";
			}else if($data->o_status == "รอการจัดส่งสินค้า"){
				$data->o_status = "<font color='blue'>".$data->o_status."</font>";
			}else if($data->o_status == "จัดส่งสินค้าเรียบร้อย"){
				$data->o_status = "<font color='#39ADB4'>".$data->o_status."</font>";
			}
			
		?>
                <tr align="center">
                    <td style="vertical-align: middle;"><?php echo $x+1;?></td>
                    <td style="vertical-align: middle;"><?php echo $data->o_code?></td>
                    <td style="vertical-align: middle;"><?php echo $data->o_date?></td>
                    <td style="vertical-align: middle;"><?php echo $data->o_status?></td>
                    <td style="vertical-align: middle;"><a target="_blank" href="getorder.php?code=<?php echo $data->o_code;?>" style="cursor: pointer;">รายละเอียด / แจ้งชำระเงิน</a></td>
                   
                  </tr>
                  
       	
       	<?php $x++;}}?>
       	</tbody>
              </table> 
                
                          
          </div>
    	</div>   
		</div>
        </div>
      </div>
  </body>
</html>