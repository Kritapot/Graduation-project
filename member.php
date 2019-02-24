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
                
        
		
<div class="templatemo-content-widget white-bg">       
<h2>ข้อมูลส่วนตัว</h2>
<a href="editprofile.php" style="float:right;margin-top: -20px;">แก้ไขข้อมูลส่วนตัว</a>
<br>
<div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><div class="circle green-bg"></div></td>
                      <td>ชื่อ</td>
                      <td><?php echo $m->name;?></td>                    
                    </tr> 
                    <tr>
                      <td><div class="circle green-bg"></div></td>
                      <td>นามสกุล</td>
                      <td><?php echo $m->lastname;?></td>                    
                    </tr>
                    <tr>
                      <td><div class="circle pink-bg"></div></td>
                      <td>Email</td>
                      <td><?php echo $m->email;;?></td>                    
                    </tr>  
                    <tr>
                      <td><div class="circle blue-bg"></div></td>
                      <td>เบอร์โทรติดต่อ</td>
                      <td><?php echo $m->tel;;?></td>                    
                    </tr>  
                                                      
                  </tbody>
                </table>
              </div>
       	
</div>
<div class="templatemo-content-widget white-bg" style="padding: 15px;padding-left: 30px;">       
                <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="images/icon.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">ที่อยู่สำหรับจัดส่งสินค้า</h2>
                  </div>        
                </div>               
</div>

<?php 
$z = 1;
if($m->address == "none"){
	echo '<div class="templatemo-content-widget white-bg"> ';
	echo "<h2>ยังไม่มีที่อยู่สำหรับจัดส่งสินค้า</h2>";
	echo '</div>';
} else {
	for($i=0; $i<count($m->address); $i++){
		echo '<div class="templatemo-content-widget white-bg"> ';
		echo "<p style='font-size:14px;'><b>ที่อยู่ $z : </b>".$m->address[$i];
		echo '<a href="javascript:deleteAddress(\''.$m->address[$i].'\');" style="float:right;">ลบที่อยู่นี้</a></p>';
		
		echo '</div>';
		$z++;
	}
}
?>  
 
<div class="templatemo-content-widget white-bg"> 
<a href="newaddress.php">เพิ่มที่อยู่สำหรับจัดส่งสินค้า</a> 
</div>      	
 <?php if(isset($_GET["pf"])){?>
<script>alertify.warning('แก้ไขข้อมูลส่วนตัวเรียบร้อยแล้ว');</script>
<?php }?>
<?php if(isset($_GET["pwd"])){?>
<script>alertify.warning("เปลี่ยนรหัสผ่านเรียบร้อยแล้ว !");</script>
<?php }?>      	
       	
       	
		</div>
        </div>
      </div>
  </body>
</html>