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
                    <h2 class="media-heading text-uppercase">สมัครสมาชิก</h2>
                  </div>        
                </div>               
        </div>
<div class="templatemo-content-widget white-bg">       
<form name="frm" class="form-inline" action="saveregisterdata.php" method="post" onsubmit="return validateRegisterForm()">
<label style="color:#bb0000;">* กรุณากรอกรายละเอียดให้ครบทุกช่อง</label><br>
<br>
<table class="tbt" >
<tr>
<td style="width: 30px;"><div class="circle pink-bg"></div></td>
<td>Email (ใช้ในการ Login)</td>
<td ><input required name="yemail" type="email" class="form-control" placeholder="อีเมลของคุณ" style="margin-left: 10px;width: 80%" ></td>
</tr>
<tr>
<td style="width: 30px;"><div class="circle pink-bg"></div></td>
<td>รหัสผ่าน</td>
<td>
<input required name="pwd" type="password" class="form-control" placeholder="รหัสผ่าน" style="margin-left: 10px;width: 80%" onchange="chk_pwd()">
</td>
<td><div id="c1" style="visibility: hidden;"><img src="images/x.png" style="width: 20px;"></div></td>
</tr>
<tr>
<td style="width: 30px;"><div class="circle pink-bg"></div></td>
<td>ยืนยันรหัสผ่าน</td>
<td ><input required name="cf_pwd" type="password" class="form-control" placeholder="ยืนยันรหัสผ่าน" style="margin-left: 10px;width: 80%" onchange="chk_pwd()"></td>
<td><div id="c2" style="visibility: hidden;"><img src="images/x.png" style="width: 20px;"></div></td>
</tr>
<tr>
<td style="width: 30px;"><div class="circle pink-bg"></div></td>
<td>ชื่อ</td>
<td ><input required name="name" type="text" class="form-control" placeholder="ชื่อของคุณ" style="margin-left: 10px;width: 80%" ></td>
</tr>
<tr>
<td style="width: 30px;"><div class="circle pink-bg"></div></td>
<td>นามสกุล</td>
<td><input required name="lastname" type="text" class="form-control" placeholder="นามสกุลของคุณ" style="margin-left: 10px;width: 80%" ></td>
</tr>
<tr>
<td style="width: 30px;"><div class="circle pink-bg"></div></td>
<td>โทรศัพท์มือถือ</td>
<td><input maxlength="10" required name="tel" type="text" class="form-control" placeholder="08XXXXXXXX" style="margin-left: 10px;width: 80%" ></td>
</tr>

</table>
<br><br>
<input type="reset" class="templatemo-w-button" style="font-size:14px;" value="รีเซ็ตค่า">
<input id="btnSubmit" type="submit" class="templatemo-w-button" style="font-size:14px;" value="สมัครสมาชิก">
</form>
       	
       	</div>
       	
       	
		</div>
        </div>
      </div>
    
<?php if(isset($_GET["err"])){?>
<script>alertify.alert("<h2>ขออภัย มีคนใช้ Email นี้ลงทะเบียนเรียบร้อยแล้ว</h2>");</script>
<?php }?>    
    

  </body>
</html>