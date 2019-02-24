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
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
              <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="images/admin.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">เพิ่มสินค้าใหม่</h2>
                  </div> <hr>
                 <form name="frm" method="post" action="addproduct2.php" onsubmit="return validateAddProduct();" enctype="multipart/form-data">
	<label>(1) รูปภาพสินค้า </label><br><br>
	<input name="pic" type="file" class="form-control" onchange="readURL(this)" required="required"><br>
	<img class="img-responsive" style="max-width: 300px;border: 2px #ddd solid;display:none;" id="preview" src="#" />
	<br>
	<label >(2) ชื่อสินค้า </label><br><br>
	<input name="name" type="text" class="form-control" placeholder="ชื่อสินค้า" style="width: 100%;" required="required">
	<br>
	<label >(3) หมวดหมู่ </label><br><br>
	
	<?php 
	//$link = mysql_connect("localhost","root","1234");
	$link = mysql_connect("localhost","tawansho_db","123456");
	mysql_select_db("tawansho_db",$link);
	mysql_query("SET NAMES UTF8");
	$query = "select * from category";
	$result = mysql_query($query,$link);
	$row = mysql_num_rows($result);
	if($row > 0){
		echo '<select class="form-control" name="category" style="border-radius: 5px;padding: 5px;width: auto;">';
		while($data = mysql_fetch_object( $result ) ) {
			echo "<option value='".$data->cate_id."'>".$data->cate_name."</option>";
		}
		echo '</select><br><br>';
	} else {
		echo "<span style='color:red;'><b>เกิดข้อผิดพลาด : </b>ไม่พบหมวดหมู่ กรุณาเพิ่มหมวดหมู่สินค้าก่อน !!</span><br><br>";
		echo '<a style="font-size:14px;" class="btn1 btn-primary1" href="#">คลิกที่นี่เพื่อไปยังหน้าเพิ่มหมวดหมู่สินค้า</a><br>';
	}

	mysql_close($link);
	
	?>
	<label>(4) ราคาสินค้า </label><br><br>
	<input name="price" type="text" class="form-control" placeholder="ราคา"  required="required">
	<br><br>
	<label>(5) น้ำหนัก / ขนาด </label><br><br>
	<input name="weight" type="text" class="form-control" placeholder="น้ำหนัก / ขนาด"  required="required">
	<br><br>
	<label>(6) รายละเอียดสินค้า </label><br><br>
	<textarea name="detail" class="form-control"></textarea>
	<br><br>
	<div style="float:left;width: 100%;margin-top: 50px;">
	<input type="submit" style="font-size:14px;" class="templatemo-blue-button" value="เพิ่มสินค้า">
	</div>
	</form>	
                </div>  
              </div>
              </div>
        
          
             
        </div>
      </div>
    </div>

  </body>
</html>