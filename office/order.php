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
        //$link = mysql_connect("localhost","root","1234");
        $link = mysql_connect("localhost","tawansho_db","123456");
        $status = "ชำระเงินเรียบร้อยแล้ว";
        if(!isset($_GET["s"])){
        	$_GET["s"] = 1;
        }
        
      	if($_GET["s"] == 1){
      		$status = "รอการชำระเงิน";
      	} else if($_GET["s"] == 2){
      		$status = "ชำระเงินเรียบร้อยแล้ว";
      	} else if($_GET["s"] == 3){
      		$status = "รอการจัดส่งสินค้า";
      	} else {
      		$status = "จัดส่งสินค้าเรียบร้อย";
      	}
        mysql_select_db("tawansho_db",$link);
        mysql_query("SET NAMES UTF8");
        $query = "SELECT * FROM orders o JOIN member m ON m.m_id = o.m_id WHERE o.o_status = '$status' ORDER BY o.o_id ASC";
        $result = mysql_query($query,$link);
        $row = mysql_num_rows($result);
        ?>
        <div class="templatemo-content-container">
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
              
              <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="images/admin.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">เลือกสถานะ</h2>
                  </div> <hr>
                  <select id="status" class="form-control" onchange="changeStatus()">
                  <option value="1" <?php echo $_GET["s"] == "1"?"selected":"";?>>รอการชำระเงิน</option>
                  <option value="2" <?php echo $_GET["s"] == "2"?"selected":"";?>>ชำระเงินเรียบร้อยแล้ว</option>
                  <option value="3" <?php echo $_GET["s"] == "3"?"selected":"";?>>รอการจัดส่งสินค้า</option>
                  <option value="4" <?php echo $_GET["s"] == "4"?"selected":"";?>>จัดส่งสินค้าเรียบร้อย</option>
                  </select>       
                </div>  
              </div>
              </div>
        <?php if($row > 0){?>
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
              
              <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="../images/status.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">รายการใบสั่งซื้อ</h2>
                  </div>        
                </div><hr>
              
    		<div class="panel-default table-responsive">
              <table id="example" class="display">
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
                  
       	
       	<?php $x++;}} ?>
       	</tbody>
              </table> 
          </div></div>
          </div>
          <?php } else {?>
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
              <i class="fa fa-times"></i>
              <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="../images/status.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">ไม่พบข้อมูลการสั่งซื้อ</h2>
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