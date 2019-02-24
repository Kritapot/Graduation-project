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
                    <h2 class="media-heading text-uppercase">แก้ไขสินค้า</h2>
                  </div> <hr>
                  <?php 
		//$link = mysql_connect("localhost","root","1234");
		$link = mysql_connect("localhost","tawansho_db","123456");
		if(isset($_GET["id"])){
			$id = $_GET["id"];
		}
		mysql_select_db("tawansho_db",$link);
		mysql_query("SET NAMES UTF8");
		$query = "select * from product where p_id = $id";
		$result = mysql_query($query,$link);
		$data = mysql_fetch_object( $result );
		$row = mysql_num_rows($result);
		if($row > 0){
			$queryX = "select * from category where cate_id = ".$data->cate_id;
			$resultX = mysql_query($queryX,$link);
			$dataX = mysql_fetch_object( $resultX );
		}
		?> 
    <form name="frm" method="post" action="editproduct2.php" onsubmit="return validateAddProduct();" enctype="multipart/form-data">
	<input type="hidden" name="pid" value="<?php echo $data->p_id;?>">
	<label>(1) รูปภาพสินค้า </label><br><br>
	<input name="pic" type="file" class="form-control" onchange="readURL(this)" ><br>
	<img class="img-responsive" style="max-width: 300px;border: 2px #ddd solid;" id="preview" src="../products/<?php echo $data->p_pic?>" />
	<br>
	<label >(2) ชื่อสินค้า </label><br><br>
	<input name="name" type="text" class="form-control" value="<?php echo $data->p_name?>" style="width: 100%;" required="required">
	<br>
	<label >(3) หมวดหมู่ </label><br><br>
	
	<?php 
	
	$q = "select * from category";
	$r = mysql_query($q,$link);
	$row = mysql_num_rows($r);
	if($row > 0){
		echo '<select class="form-control" name="category" style="border-radius: 5px;padding: 5px;width: auto;">';
		while($d = mysql_fetch_object( $r ) ) {
			if($d->cate_id == $data->cate_id){
				echo "<option selected value='".$d->cate_id."'>".$d->cate_name."</option>";
			} else {
				echo "<option value='".$d->cate_id."'>".$d->cate_name."</option>";
			}
		}
		echo '</select><br><br>';
	} else {
		echo "<span style='color:red;'><b>เกิดข้อผิดพลาด : </b>ไม่พบหมวดหมู่ กรุณาเพิ่มหมวดหมู่สินค้าก่อน !!</span><br><br>";
		echo '<a style="font-size:14px;" class="btn1 btn-primary1" href="#">คลิกที่นี่เพื่อไปยังหน้าเพิ่มหมวดหมู่สินค้า</a><br>';
	}

	mysql_close($link);
	
	?>
	<label>(4) ราคาสินค้า </label><br><br>
	<input name="price" type="text" class="form-control" value="<?php echo $data->p_price?>"  required="required">
	<br><br>
	<label>(5) น้ำหนัก / ขนาด </label><br><br>
	<input name="weight" type="text" class="form-control" value="<?php echo $data->p_weight?>" required="required">
	<br><br>
	<label>(6) รายละเอียดสินค้า </label><br><br>
	<textarea name="detail" class="form-control"><?php echo $data->p_detail?></textarea>
	<br><br>
	<div style="float:left;width: 100%;margin-top: 50px;">
	<input type="submit" style="font-size:14px;" class="btn btn-primary btn-lg" value="แก้ไขสินค้า">
	<a href="product.php" style="font-size:14px;" class="btn btn-default btn-lg" >ยกเลิกการแก้ไขสินค้า</a>
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