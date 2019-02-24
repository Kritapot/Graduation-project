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
                    <h2 class="media-heading text-uppercase"><?php echo isset($_GET["p"])?"กรุณาเข้าสู่ระบบก่อนทำการสั่งซื้อสินค้า":"เข้าสู่ระบบ";?></h2>
                  </div>        
                </div>               
        </div>
<div class="templatemo-content-widget white-bg">       
<form action="islogin.php" method="get">
<label>Email</label>
<input name="email" type="text" class="form-control"><br>
<label>Password</label>
<input name="password" type="password" class="form-control"><br>
<input type="submit" class="templatemo-pink-button" value="Login">

&nbsp;&nbsp;&nbsp;หรือ
<a href="register.php" style="cursor:pointer;margin-left: 5px;">สมัครสมาชิก</a>
<a href="forgotpassword.php" style="float:right;cursor:pointer;">ลืมรหัสผ่าน ?</a>


</form>
<?php if(isset($_GET["p"])){?>
<script>alertify.alert("<h2>กรุณาเข้าสู่ระบบก่อนทำการสั่งซื้อ</h2>");</script>
<?php }?>
       	
</div>
       	
       	
		</div>
        </div>
      </div>
    
    
    

  </body>
</html>