<?php 
require_once 'member.class.php';
$link = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
?>
<!--  <div class="templatemo-top-nav-container" style="position: fixed;z-index: 300;width: 100%;">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href="index.php" <?php echo $link=="index.php"|| $link=="" || $link=="tawanshop"?'class="active"':''; ?> >หน้าแรก</a></li>
                <li><a href="products.php" <?php echo $link=="products.php"?'class="active"':''; ?> >รายการสินค้า</a></li>
                <li><a <?php echo $link=="products.php"?'href="#popup"':'href="cart.php"'; ?> id="btn_cart" <?php echo $link=="cart.php"?'class="active"':''; ?>>ตะกร้าสินค้า</a></li>
                <li><a href="howto.php" <?php echo $link=="howto.php"?'class="active"':''; ?>>วิธีการสั่งซื้อ</a></li>
                <li><a href="manageorder.php" <?php echo $link=="manageorder.php" || $link=="getorder.php"?'class="active"':''; ?>>จัดการใบสั่งซื้อ/แจ้งชำระเงิน</a></li>
                <li><a href="talk.php" <?php echo $link=="talk.php"?'class="active"':''; ?>>พูดคุย</a></li>
              </ul>  
            </nav> 
          </div>
</div>-->

<div id='cssmenu'>
<ul>
	<li><a style="color:#E687B6;font-weight: bold;text-decoration: none;cursor: default;">Tawan Shop</a></li>
   <li><a href='index.php'>หน้าแรก</a></li>
   <li><a href='products.php'>รายการสินค้า</a>
      <ul>
      	<li><a href='products.php?cate=7'>สินค้าขายดี</a></li>
         <li><a href='products.php?cate=8'>สินค้าแนะนำ</a></li>
         <li><a href='products.php?cate=1'>เมคอัพ</a></li>
         <li><a href='products.php?cate=2'>สกินแคร์</a></li>
         <li><a href='products.php?cate=3'>ดูแลผิวหน้า</a></li>
         <li><a href='products.php?cate=4'>ดูแลผิวกาย</a></li>
         <li><a href='products.php?cate=5'>อาหารเสริม</a></li>
         <li><a href='products.php?cate=6'>อื่นๆ</a></li>
      </ul>
   </li>
   <li><a id="btn_cart" href="cart.php">ตะกร้าสินค้า</a></li>
   <li><a href='howto.php'>วิธีการสั่งซื้อ</a></li>
   <li><a href='talk.php'>พูดคุย</a></li>
   <?php if(isset($_SESSION["member"])){
   $m = unserialize($_SESSION["member"]);
   	?>
   	<li style="float:right;"><a href='#'>สมาชิก</a>
   <ul>
         <li><a href='member.php'>ข้อมูลส่วนตัว</a></li>
         <li><a href='history.php'>ประวัติการสั่งซื้อ</a></li>
         <li><a href='javascript:logout()'>ออกจากระบบ</a></li>
    </ul>
   </li>
   <?php } else {?>
   <li style="float:right;"><a href='#'>สมาชิก</a>
   <ul>
         <li><a href='login.php'>เข้าสู่ระบบ</a></li>
         <li><a href='register.php'>สมัครสมาชิก</a></li>
    </ul>
   </li>
   <?php }?>
</ul>
</div>