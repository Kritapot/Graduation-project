<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once 'head.php'?>
    <?php include_once 'pagination.php';?>
    <script>
    $(document).ready(function() {
        $('#example').dataTable( {
            "pagingType": "full_numbers"
        } );
    } );
    </script>
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
        <?php 
        if(!isset($_GET["c"])){
        	$_GET["c"] = 0;
        }
        if($_GET["c"] == 0){
        	$query = "SELECT * FROM product p JOIN category c ON p.cate_id = c.cate_id";
        } else {
        	$query = "SELECT * FROM product p JOIN category c ON p.cate_id = c.cate_id WHERE p.cate_id = ".$_GET["c"];
        }
        //$link = mysql_connect("localhost","root","1234");
        $link = mysql_connect("localhost","tawansho_db","123456");
        mysql_select_db("tawansho_db",$link);
        mysql_query("SET NAMES UTF8");
        $result = mysql_query($query,$link);
        $row = mysql_num_rows($result);
        ?>
        <div class="templatemo-content-container">
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
              <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="images/admin.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">เรียงตามหมวดหมู่สินค้า</h2>
                  </div> <hr>
                  <select id="category" class="form-control" onchange="changeCategory()">
                  <option value="0" <?php echo $_GET["c"] == "0"?"selected":"";?>>ทั้งหมด</option>
                  <option value="7" <?php echo $_GET["c"] == "7"?"selected":"";?>>สินค้าขายดี</option>
                  <option value="8" <?php echo $_GET["c"] == "8"?"selected":"";?>>สินค้าแนะนำ</option>
                  <option value="1" <?php echo $_GET["c"] == "1"?"selected":"";?>>เมคอัพ</option>
                  <option value="2" <?php echo $_GET["c"] == "2"?"selected":"";?>>สกินแคร์</option>
                  <option value="3" <?php echo $_GET["c"] == "3"?"selected":"";?>>ดูแลผิวหน้า</option>
                  <option value="4" <?php echo $_GET["c"] == "4"?"selected":"";?>>ดูแลผิวกาย</option>
                  <option value="5" <?php echo $_GET["c"] == "5"?"selected":"";?>>อาหารเสริม</option>
                  <option value="6" <?php echo $_GET["c"] == "6"?"selected":"";?>>อื่นๆ</option>
                  </select>          
                </div>  
              </div>
              </div>
        <?php if($row > 0){?>
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
              <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="../images/status.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">รายการชื่อสินค้าทั้งหมด
                    <a style="float: right;" href="addproduct.php">เพิ่มสินค้าใหม่</a>
                    </h2>
                  </div>        
                </div><hr>
              
    		<div class="panel-default table-responsive">
              <table id="example" class="display" >
                <thead>
                  <tr align="center">
                    <td>#</td>
                    <td>ชื่อสินค้า</td>
                    <td>ราคาต่อหน่วย</td>
                    <td>ประเภทสินค้า</td>
                    <td>รายละเอียดเพิ่มเติม</td>

                  </tr>
                </thead>
                <tbody>   
		<?php 
		
		$x = 0;
		if($row > 0){
			while($data = mysql_fetch_object( $result )){

		?>
                <tr align="center">
                    <td style="vertical-align: middle;"><?php echo $x+1;?></td>
                    <td style="vertical-align: middle;" class="text-uppercase"><?php echo $data->p_name?></td>
                    <td style="vertical-align: middle;"><?php echo $data->p_price?></td>
                    <td style="vertical-align: middle;"><?php echo $data->cate_name?></td>
                    <td style="vertical-align: middle;"><a href="getproduct.php?id=<?php echo $data->p_id;?>" style="cursor: pointer;">รายละเอียด</a></td>
                   
                  </tr>
                  
       	
       	<?php $x++;}}?>
       
       	</tbody>
              </table> 
          </div></div>
          </div>
          <?php } else {?>
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
              <i class="fa fa-times"></i>
             <div class="media-left">
                      <img class="media-object img-circle" src="../images/status.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">ไม่พบข้อมูลรายการสินค้า</h2>
                  </div> 
              </div>
              </div>
              
          <?php }?>
          
             
        </div>
      </div>
    </div>

  </body>
</html>