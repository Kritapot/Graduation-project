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
		?>     
		<div class="templatemo-flex-row flex-content-row">    
            <div class="templatemo-content-widget white-bg col-1 text-center">
              <h2 class="text-uppercase" style="margin-bottom: 20px;"><?php echo $data->p_name;?></h2>
              <img src="products/<?php echo $data->p_pic;?>" alt="Bicycle" class=" img-thumbnail">
             
            </div>
            <div class="templatemo-content-widget white-bg col-1 text-center" style="text-align: left; ">

              <div class="media margin-bottom-30">
                <div class="media-left padding-right-25">
                    <img class="media-object img-circle templatemo-img-bordered" src="products/<?php echo $data->p_pic;?>" style="width: 100px; ">
                </div>
                <div class="media-body">
                  <h2 class="media-heading text-uppercase blue-text"><?php echo $data->p_name;?></h2>
                  <p>ประเภทสินค้า :  <?php echo $dataX->cate_name;?></p>
                </div>        
              </div>
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><div class="circle green-bg"></div></td>
                      <td>รหัสสินค้า</td>
                      <td><?php echo "TW".$data->p_id;?></td>                    
                    </tr> 
                    <tr>
                      <td><div class="circle pink-bg"></div></td>
                      <td>ราคาต่อหน่วย</td>
                      <td><?php echo $data->p_price;?> บาท</td>                    
                    </tr>  
                    <tr>
                      <td><div class="circle blue-bg"></div></td>
                      <td>น้ำหนัก / ขนาด</td>
                      <td><?php echo $data->p_weight;?></td>                    
                    </tr>  
                    <tr>
                      <td><div class="circle yellow-bg"></div></td>
                      <td style="width: 150px;">รายละเอียดสินค้า</td>
                      <td><?php echo $data->p_detail;?></td>                    
                    </tr>                                      
                  </tbody>
                </table>
              </div>
               <hr>
               
  <a href="addtocart.php?id=<?php echo $data->p_id;?>&a=1" type="submit" class="btn btn-default">สั่งซื้อสินค้า</a>
       	<label style="padding-left: 20px;">* สินค้าทุกชิ้นเป็นของแท้</label>
        		             
            </div>                    
          </div>
          <?php }?>
          
</div>
        </div>
      </div>
    
    
    

  </body>
</html>