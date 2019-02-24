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
                      <img class="media-object img-circle" src="images/icon.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">ลืมรหัสผ่าน</h2>
                  </div>        
                </div>               
        </div>
<div class="templatemo-content-widget white-bg">       
<form action="sendforgotpassword.php" method="get">
<label>กรอก Email ที่ใช้ในการสมัคร</label>
<input name="email" type="text" class="form-control" required><br>
<input type="submit" class="templatemo-pink-button" value="ส่งรหัสผ่านไปยัง Email">


</form>
<?php if(isset($_GET["err"])){?>
<script>alertify.alert("<h2>Email นี้ไม่มีอยู่ในระบบ !</h2>");</script>
<?php }?>
<?php if(isset($_GET["sc"])){?>
<script>alertify.alert("<h2>ขณะนี้ระบบได้ทำการส่งรหัสผ่านไปยัง Email ของท่านเรียบร้อยแล้ว กรุณารอสักครู่ !</h2>");</script>
<?php }?> 	
</div>
       	
       	
		</div>
        </div>
      </div>
    
    
    

  </body>
</html>