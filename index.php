<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include_once 'head.php';?>
  <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.3&appId=1477882625838147";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
  </head>
  <body>  
    <!-- Left column -->
    <div class="templatemo-flex-row">
      
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <?php include_once 'menu.php';?>
        <div class="templatemo-content-container">

          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-2">

              <h2 class="templatemo-inline-block">Tawan Shop Cosmetics เครื่องสำอางเกาหลีของแท้ ราคาถูกสุดๆ</h2><hr>
              <img class="img-responsive" src="images/web_detail.jpg" style="width: 100%;">
            </div>
            <div class="templatemo-content-widget white-bg col-1">
			
<div class="fb-page"
	data-href="https://www.facebook.com/TawanShopCosmetics"
	data-width="300" data-height="500" data-small-header="false"
	data-adapt-container-width="true" data-hide-cover="false"
	data-show-facepile="true" data-show-posts="true">
	<div class="fb-xfbml-parse-ignore">
		<blockquote cite="https://www.facebook.com/TawanShopCosmetics">
			<a href="https://www.facebook.com/TawanShopCosmetics">ร้าน
				Tawanshop.com</a>
		</blockquote>
	</div>
</div>
            </div>
           
            
          </div>
                     
        <?php
        //$link = mysql_connect("localhost","root","1234");
		$link = mysql_connect("localhost","tawansho_db","123456");
		mysql_select_db("tawansho_db",$link);
		mysql_query("SET NAMES UTF8");
		$query = "select * from product where cate_id = 7";
		$result = mysql_query($query,$link);
		$row = mysql_num_rows($result);

		$i = 1;
		if($row > 0){
			echo '<div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
              <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="images/icon.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">ตัวอย่างสินค้าขายดี
  		<img src="images/newx.gif">
  		</h2>
  		<a style="float: right;margin-top:-40px;font-size:14px;" href="products.php?cate=7">ดูทั้งหมด</a>
  		
                  </div>        
                </div>  
              </div>
              </div>';

		}
		echo '<div class="templatemo-flex-row flex-content-row"> ';
		while($data = mysql_fetch_object( $result ) ) {
			if($i == 4){
				break;
			}
		?>         
            <div class="templatemo-content-widget white-bg col-1 text-center">
              <h2 class="text-uppercase" style="margin-bottom: 20px;"><?php echo $data->p_name;?></h2>
              <img src="products/<?php echo $data->p_pic;?>" alt="Bicycle" class="img-circle img-thumbnail">
              <hr>
              <p><?php echo $data->p_detail;?> </p>
              <hr>
              <p><button class="templatemo-white-button1"disabled><?php echo $data->p_price;?> บาท</button></p>
              <input onclick="javascript:location.href='productdetail.php?id=<?php echo $data->p_id;?>'" type="button" class="templatemo-pink-button" value="สั่งซื้อสินค้า">
            </div>                    
          
          <?php 
       
          $i++;
		}
		echo '</div> ';
		?>
        
        <?php
        //$link = mysql_connect("localhost","root","1234");
		$link = mysql_connect("localhost","tawansho_db","123456");
		mysql_select_db("tawansho_db",$link);
		mysql_query("SET NAMES UTF8");
		$query = "select * from product where cate_id = 8";
		$result = mysql_query($query,$link);
		$row = mysql_num_rows($result);

		$i = 1;
		if($row > 0){
			echo '<div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
              <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="images/icon.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">ตัวอย่างสินค้าแนะนำ
  		<img src="images/newx.gif">
  		</h2>
  		<a style="float: right;margin-top:-40px;font-size:14px;" href="products.php?cate=8" >ดูทั้งหมด</a>
                  </div>        
                </div>  
              </div>
              </div>';

		}
		echo '<div class="templatemo-flex-row flex-content-row"> ';
		while($data = mysql_fetch_object( $result ) ) {
			if($i == 4){
				break;
			}
		?>         
            <div class="templatemo-content-widget white-bg col-1 text-center">
              <h2 class="text-uppercase" style="margin-bottom: 20px;"><?php echo $data->p_name;?></h2>
              <img src="products/<?php echo $data->p_pic;?>" alt="Bicycle" class="img-circle img-thumbnail">
              <hr>
              <p><?php echo $data->p_detail;?> </p>
              <hr>
              <p><button class="templatemo-white-button1"disabled><?php echo $data->p_price;?> บาท</button></p>
              <input onclick="javascript:location.href='productdetail.php?id=<?php echo $data->p_id;?>'" type="button" class="templatemo-pink-button" value="สั่งซื้อสินค้า">
            </div>                    
          
          <?php 
       
          $i++;
		}
		echo '</div> ';
		?>              
            
                      
       
          <footer class="text-center">
            <p>Copyright &copy; 2015 Tawan Shop
            | Designed by <a href="http://www.tawanshopcosmetics.com" target="_parent">Tawan Shop</a> | Office <a href="http://www.tawanshopcosmetics.com/office" target="_parent">Administrator</a></p>
          </footer>         
        </div>
      </div>
    </div>
   

  </body>
</html>