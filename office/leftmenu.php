<?php 
$link = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
?>
<div class="templatemo-sidebar">
        <header class="templatemo-site-header">
          <div class="square"></div>
          <h1>Tawanshop</h1>
        </header>
        <div class="profile-photo-container">
          <img src="images/admin.png" alt="Profile Photo" class="img-responsive" style="height: 200px;margin:0 auto;">  
          
        </div>      
        
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
        </div>
        <nav class="templatemo-left-nav">          
          <ul>
            <li><a href="index.php" <?php echo $link=="index.php"|| $link=="" || $link=="office" ?'class="active"':''; ?>><i class="fa fa-home fa-fw"></i>หน้าแรก</a></li>
            <li><a href="order.php" <?php echo $link=="getorder.php"|| $link=="order.php" ?'class="active"':''; ?>><i class="fa fa-database fa-fw"></i>จัดการใบสั่งซื้อ</a></li>
            <li><a href="product.php" <?php echo $link=="editproduct.php" || $link=="product.php" || $link=="addproduct.php" || $link=="getproduct.php" ?'class="active"':''; ?>><i class="fa fa-bar-chart fa-fw"></i>จัดการสินค้า</a></li>
			<li><a href="circulation.php" <?php echo $link=="circulation.php" || $link=="getcirculation.php" || $link=="viewgraph.php" || $link=="generategraph.php" || $link=="circulationpermonth.php" || $link=="circulationperyear.php" ?'class="active"':''; ?>><i class="fa fa-map-marker fa-fw"></i>สรุปยอดขาย</a></li>
            <li><a href="javascript:logout();"><i class="fa fa-eject fa-fw"></i>ออกจากระบบ</a></li>
          </ul>  
        </nav>
      </div>