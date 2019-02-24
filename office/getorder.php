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
        <div class="templatemo-content-container">
          
            <?php
				//$link = mysql_connect("localhost","root","1234");
				$link = mysql_connect("localhost","tawansho_db","123456");
				if(isset($_GET["code"])){
					$oid = $_GET["code"];
				}
				mysql_select_db("tawansho_db",$link);
				mysql_query("SET NAMES UTF8");
				$query = "SELECT * FROM orders o JOIN member m ON m.m_id = o.m_id WHERE o_code = '$oid'";
				$result = mysql_query($query,$link);
				$data = mysql_fetch_object( $result );
				$row = mysql_num_rows($result);
				if($row > 0){
		?>
		
          <div class="templatemo-content-widget white-bg" style="padding: 15px;padding-left: 30px;">       
                <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="../images/icon.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">รายละเอียดใบสั่งซื้อเลขที่ <?php echo $data->o_code;?></h2>
                  </div>        
                </div>                
              </div>
       	<div class="templatemo-content-widget white-bg" style="padding: 15px;padding-left: 30px;">       
                <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="../images/status.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">สถานะการสั่งซื้อ : 
                    <?php if($data->o_status == "รอการชำระเงิน"){
                    	echo $data->o_status;
					} else if($data->o_status == "ชำระเงินเรียบร้อยแล้ว"){?>
						<font color="green"><?php echo $data->o_status?></font>
						<a href="javascript:confirmChangeStatus('<?php echo $data->o_code;?>','<?php echo $data->o_status;?>')" style="float: right;cursor: pointer;">ยืนยันการชำระเงิน</a>
					<?php } else if($data->o_status == "รอการจัดส่งสินค้า"){?>
						<input type="hidden" id="m_email" value="<?php echo $data->m_email?>">
						<input type="hidden" id="m_name" value="<?php echo $data->m_name." ".$data->m_lastname?>">
						
						<font color="blue"><?php echo $data->o_status?></font>
						<a href="javascript:confirmChangeStatus('<?php echo $data->o_code;?>','<?php echo $data->o_status;?>')" style="float: right;cursor: pointer;">ยืนยันการจัดส่งสินค้า</a>
					<?php } else if($data->o_status == "จัดส่งสินค้าเรียบร้อย"){?>
						<font color="#39ADB4"><?php echo $data->o_status?></font>
						<span style="float: right;"><font>หมายเลขพัสดุ : </font><font color="red"><?php echo $data->o_sendcode?></font></span>
					<?php }?>
                    </h2>
                  </div>        
                </div>                
              </div>
              <div class="templatemo-content-widget white-bg" style="padding: 15px;padding-left: 30px;">       
                <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="../images/money.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">แจ้งชำระเงิน : 
                    <?php if($data->o_status == "รอการชำระเงิน"){?>
                   	<font color="red">ยังไม่ได้ชำระเงิน</font>
                    <?php } else{?>
                    <font color="green">ชำระเงินเรียบร้อยแล้ว</font>
                    <a href="orderimg.php?code=<?php echo $data->o_code;?>" style="float: right;cursor: pointer;"
                    onclick="window.open(this.href, 'หลักฐานการชำระเงิน',
'left=50,top=50,width=800,height=600,toolbar=1,resizable=0'); return false;">หลักฐานการชำระเงิน</a>
                    <?php }?>
                    </h2>
                  </div>        
                </div>                
              </div>
       	<div class="templatemo-content-widget no-padding">
            <div class="panel panel-default table-responsive">
              <table class="table table-striped table-bordered templatemo-user-table">
                <thead>
                  <tr align="center">
                    <td>#</td>
                    <td>ชื่อสินค้า</td>
                    <td>ราคาต่อหน่วย</td>
                    <td>จำนวน</td>
                    <td>ราคารวม</td>

                  </tr>
                </thead>
                <tbody>
                
                <?php 
                $query2 = "SELECT * FROM orderdetail od where od.o_id = $data->o_id";
                $result2 = mysql_query($query2,$link);
                $sum = 0;
                $i = 0;
                while($obj = mysql_fetch_object($result2)){
					$sum += $obj->od_psum;
				?>
                  <tr align="center">
                    <td style="vertical-align: middle;"><?php echo $i+1;?></td>
                    <td style="vertical-align: middle;" class="text-uppercase"><?php echo $obj->od_pname?></td>
                    <td style="vertical-align: middle;"><?php echo $obj->od_pprice?></td>
                    <td style="vertical-align: middle;"><?php echo $obj->od_pamount?></td>
                    <td style="vertical-align: middle;"><?php echo number_format($obj->od_psum);?></td>
                  </tr>
                <?php $i++;}?>
                <tr align="center">
                <td colspan="4" style="font-weight: bold;">ค่าจัดส่ง</td>
                <td colspan="2" style="font-weight: bold;">50</td>
                </tr>
                <tr align="center">
                <td colspan="4" style="font-weight: bold;">ราคาทั้งหมด</td>
                <td colspan="2" style="font-weight: bold;"><?php echo number_format($sum+50);?></td>
                </tr>
                </tbody>
              </table> 
                
            </div>                
          </div>
       	<?php } else {?>
       	<div class="templatemo-flex-row flex-content-row">
        <div class="templatemo-content-widget white-bg col-1 text-center">
        <h3>ไม่มีสินค้าภายในตะกร้า</h3>
        </div>
        </div>
       	<?php }?>
       	<div class="templatemo-flex-row flex-content-row">
        <div class="templatemo-content-widget white-bg col-1 text-center" style="text-align: left;  margin-top: -10px;">

              <div class="media margin-bottom-30">
                <div class="media-left padding-right-25">
                    <img class="media-object img-circle templatemo-img-bordered" src="../images/information.png" style="width: 100px; ">
                </div>
                <div class="media-body">
                  <h2 class="media-heading text-uppercase blue-text">รายละเอียดเพิ่มเติม</h2>
                  <p>วัน-เวลา ที่ทำการสั่งซื้อ : <?php echo $data->o_date;?></p>
                </div>        
              </div>
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><div class="circle green-bg"></div></td>
                      <td>ชื่อ-นามสกุล</td>
                      <td><?php echo $data->m_name." ".$data->m_lastname;?></td>                    
                    </tr> 
                    <tr>
                      <td><div class="circle pink-bg"></div></td>
                      <td>Email</td>
                      <td><?php echo $data->m_email;?></td>                    
                    </tr>  
                    <tr>
                      <td><div class="circle blue-bg"></div></td>
                      <td>เบอร์โทรติดต่อ</td>
                      <td><?php echo $data->m_tel;?></td>                    
                    </tr>  
                    <tr>
                      <td><div class="circle yellow-bg"></div></td>
                      <td>ที่อยู่สำหรับจัดส่งสินค้า</td>
                      <td><?php echo $data->o_address;?></td>                    
                    </tr>                                      
                  </tbody>
                </table>
              </div>
                        
            </div></div>
               
        </div>
      </div>
    </div>

  </body>
</html>