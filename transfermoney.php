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
        <div class="templatemo-content-container" >
        <div class="templatemo-content-widget white-bg" style="padding: 15px;padding-left: 30px;">       
                <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="images/money.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">แจ้งชำระเงินใบสั่งซื้อเลขที่ <?php echo $_GET["code"];?></h2>
                  </div>        
                </div> 
        </div>               
               <div class="templatemo-content-widget white-bg" > 
		<h2>กรุณาอัพโหลดรูปภาพหลักฐานการชำระเงิน</h2><hr>
		<label>ใบสั่งซื้อเลขที่ </label>
		<form action="savetransferdata.php" method="post" enctype="multipart/form-data">
		<input name="code" type="text" class="form-control" readonly value="<?php echo $_GET["code"];?>"><br>
		<img class="img-responsive" style="border: 2px #ddd solid;display:none;" id="preview" src="#"/><br>
		<input name="pic" type="file" class="form-control" onchange="readURL(this)" required><br>
		<input type="submit" class="templatemo-pink-button" value="ยืนยันการชำระเงิน">
		</form>
		</div>
		</div>
        </div>
      </div>
    
    
    

  </body>
</html>