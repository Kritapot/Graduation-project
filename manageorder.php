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
        <div class="templatemo-content-container">
        <div class="templatemo-flex-row flex-content-row">
        <div class="templatemo-content-widget white-bg col-1 text-center">
        <h2>กรอกเลขที่ใบสั่งซื้อเพื่อดำเนินการต่อ</h2><hr>
        <form class="form-inline" role="search" action="getorder.php" method="get">
        	<div class="input-group">
      		<input name="code" type="text" class="form-control" placeholder="เลขที่ใบสั่งซื้อ">
      		<span class="input-group-btn">
        	<button class="btn btn-default" type="submit">ค้นหา</button>
      		</span>
    		</div><!-- /input-group -->
        </form>
        </div>
        </div>
        
</div>
        </div>
      </div>
    
    
    

  </body>
</html>