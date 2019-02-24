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
<h2>แก้ไขข้อมูลส่วนตัว</h2>     
<hr>
<form name="frmx" action="updateprofile.php" method="post" onsubmit="return validateEditProfileForm()">
<label>Email</label>
<input type="text" class="form-control" value="<?php echo $m->email;?>" readonly="readonly"><br>
<label>ชื่อ</label>
<input name="name" type="text" class="form-control" value="<?php echo $m->name;?>" required><br>
<label>นามสกุล</label>
<input name="lastname" type="text" class="form-control" value="<?php echo $m->lastname;?>" required><br>
<label>หมายเลขโทรศัพท์</label>
<input name="tel" type="text" class="form-control" value="<?php echo $m->tel;?>" required maxlength="10"><br>
<input type="submit" class="templatemo-pink-button" value="ยืนยันการแก้ไขข้อมูล">
</form>
</div>

<div class="templatemo-content-widget white-bg">  
<h2>เปลี่ยนรหัสผ่าน</h2>
<a href="javascript:changeTypePwd()" style="float:right;margin-top: -20px;">แสดงรหัสผ่าน / ซ่อนรหัสผ่าน</a>     
<hr>
<form name="frmz" action="changepassword.php" method="post" onsubmit="return validateChangePwdForm()">
<input type="hidden" value="<?php echo $m->password?>" name="cpwd" >
<label>รหัสผ่านเดิม</label>
<input name="oldpwd" type="password" class="form-control" required><br>
<label>รหัสผ่านใหม่</label>
<input name="newpwd" type="password" class="form-control" required><br>
<label>ยืนยันรหัสผ่านใหม่</label>
<input name="cfnewpwd" type="password" class="form-control" required><br>

<input type="submit" class="templatemo-pink-button" value="ยืนยันการเปลี่ยนรหัสผ่าน">
</form>
</div>


       	
       	
       	
		</div>
        </div>
      </div>
  </body>
</html>