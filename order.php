
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once 'head.php';?>
    <?php if(!isset($_SESSION["member"])){
    	header("Location: login.php?p");
    }?>
  </head>
  <body>  
    <!-- Left column -->
    <div class="templatemo-flex-row">
      
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <?php include_once 'menu.php';?>
        <div class="templatemo-content-container" style="padding-top: 60px;">
        <div class="templatemo-content-widget white-bg" style="padding: 15px;padding-left: 30px;">       
                <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="images/icon.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">ยืนยันรายการสินค้าเพื่อทำการสั่งซื้อ</h2>
                  </div>        
                </div>                
              </div>
       	<?php if(isset($_SESSION["list"])){?>
       	<div class="templatemo-content-widget no-padding">
            <div class="panel panel-default table-responsive">
              <table class="table table-striped table-bordered templatemo-user-table">
                <thead>
                  <tr align="center">
                    <td>#</td>
                    <td>รูปภาพสินค้า</td>
                    <td>ชื่อสินค้า</td>
                    <td>ราคาต่อหน่วย</td>
                    <td>จำนวน</td>
                    <td>ราคารวม</td>

                  </tr>
                </thead>
                <tbody>
                <?php 
                $sum = 0;
                for($i = 0; $i < count($_SESSION["list"]); $i++){
					$obj = unserialize($_SESSION["list"][$i]);
					$sum += $obj->product->price*$obj->amount;
				?>
                  <tr align="center">
                    <td style="vertical-align: middle;"><?php echo $i+1;?></td>
                    <td style="vertical-align: middle;"><img class="img-cart" style="width: 50px;" src="products/<?php echo $obj->product->pic?>"></td>
                    <td style="vertical-align: middle;" class="text-uppercase"><?php echo $obj->product->name?></td>
                    <td style="vertical-align: middle;"><?php echo $obj->product->price?></td>
                    <td style="vertical-align: middle;"><?php echo $obj->amount?></td>
                    <td style="vertical-align: middle;"><?php echo number_format($obj->product->price*$obj->amount);?></td>
                  </tr>
                <?php }?>
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
                    <img class="media-object img-circle templatemo-img-bordered" src="images/information.png" style="width: 100px; ">
                </div>
                <div class="media-body">
                  <h2 class="media-heading text-uppercase blue-text">รายละเอียดข้อมูลการจัดส่งสินค้า</h2>
                  <p>*กรุณาตรวจสอบข้อมูลให้ถูกต้อง</p>
                </div>        
              </div>
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><div class="circle green-bg"></div></td>
                      <td>ชื่อ-นามสกุล</td>
                      <td><?php echo $m->name.' '.$m->lastname;?></td>                    
                    </tr> 
                    <tr>
                      <td><div class="circle pink-bg"></div></td>
                      <td>Email</td>
                      <td><?php echo $m->email;?></td>                    
                    </tr>  
                    <tr>
                      <td><div class="circle blue-bg"></div></td>
                      <td>เบอร์โทรติดต่อ</td>
                      <td><?php echo $m->tel;?></td>                    
                    </tr>                                   
                  </tbody>
                </table>
              </div>
              </div>
                          
              <div class="templatemo-content-widget white-bg" style="text-align: left;  margin-top: -10px;">
              <h2>กรุณาเลือกที่อยู่สำหรับจัดส่งสินค้า</h2>
              <br><br>
              <form action="saveorderdata.php" method="post">
               <div class="table-responsive">
               
                <table class="table">
                  <tbody>
                    <?php 
$z = 1;
if($m->address == "none"){
	echo '<div class="templatemo-content-widget white-bg"> ';
	echo "<b>ยังไม่มีที่อยู่สำหรับจัดส่งสินค้า</b>";
	echo '</div>';
} else {
	for($i=0; $i<count($m->address); $i++){
		echo '<tr>
              <td><input required type="radio" name="address" style="display:block" value="'.$m->address[$i].'"></td>
              <td>ที่อยู่ '.$z.'</td>
              <td> '.$m->address[$i].'</td>                    
              </tr>';
		$z++;
	}
}
?>                                   
                  </tbody>
                </table>
                </div>
              <hr>

       	<?php if($m->address == "none"){?>
       	<a href="newaddress.php">เพิ่มที่อยู่สำหรับจัดส่งสินค้า</a>
       	<?php } else {?>
       	<a class='templatemo-w-button' href='javascript:history.back();' style="float: left;margin-right:10px; text-decoration: none;">กลับไปแก้ไขข้อมูล</a>
       	<button type="submit" class='templatemo-w-button' style="float: left;">ยืนยันการสั่งซื้อ >></button>
       	<?php }?>
       	</form>
                 
            </div>
       
        </div>
		</div>
        </div>
      </div>
    
    
    

  </body>
</html>