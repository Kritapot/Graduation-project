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
        <div class="templatemo-content-widget white-bg" style="padding: 15px;padding-left: 30px;">       
                <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="images/icon.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">ตะกร้าสินค้า</h2>
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
                    <td>แก้ไขจำนวนสินค้า</td>
                    <td>ยกเลิกสินค้า</td>
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
                    <td style="vertical-align: middle;"><input id="am<?php echo $i;?>" type="number" class="form-control" value="<?php echo $obj->amount?>" min="0" max="50" style="min-width: 70px;"></td>
                    <td style="vertical-align: middle;"><?php echo number_format($obj->product->price*$obj->amount);?></td>
                    <td style="vertical-align: middle;"><a href="javascript:updateProduct(<?php echo $i;?>);" >ยืนยันการแก้ไข</a></td>
                    <td style="vertical-align: middle;"><a href="javascript:cancelProduct(<?php echo $i;?>);" >ยกเลิกสินค้า</a></td>
                  </tr>
                <?php }?>
                <tr align="center">
                <td colspan="6" style="font-weight: bold;">ราคาทั้งหมด</td>
                <td colspan="2" style="font-weight: bold;"><?php echo number_format($sum);?></td>
                </tr>
                </tbody>
              </table> 
                
            </div>                
          </div>
          <div class="templatemo-flex-row flex-content-row">
        <div class="templatemo-content-widget white-bg col-1 text-center">
       	<a class='templatemo-w-button' href='products.php' style="float: left;margin-right:10px; ">กลับไปเลือกซื้อสินค้าต่อ</a>
       	<a class='templatemo-w-button' href='order.php' style="float: left;">ดำเนินการต่อ >></a>
        </div>
        </div>
       	<?php } else {?>
       	<div class="templatemo-flex-row flex-content-row">
        <div class="templatemo-content-widget white-bg col-1 text-center">
        <h3>ไม่มีสินค้าภายในตะกร้า</h3>
        </div>
        </div>
       	<?php }?>
       	
		</div>
        </div>
      </div>
    
    
    

  </body>
</html>