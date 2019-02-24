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
    <script type="text/javascript">
	function searchCirculation(){
		var d = document.getElementById("dx").value;
		var m = document.getElementById("mx").value;
		var y = document.getElementById("yx").value;
		location.href = "getcirculation.php?date="+d+"-"+m+"-"+y;
	}
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
	date_default_timezone_set("Asia/Bangkok");
    $d = date('d'); 
    $m = date('m'); 
    $y = date('Y')+543;
    $month = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน", 
                                 "กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 
?> 
        <div class="templatemo-content-container">
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
              <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="../images/money.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">สรุปยอดขายประจำเดือน</h2>
                    <hr>
<form action="circulationpermonth.php" method="post">
<label>เลือกปี : </label>
<select id="y" name="y" style="padding:7px 10px;border-radius:5px;"> 
  <?php foreach (range (2557, 2600) as $val) { ?> 
  <option value="<?=$val-543?>" <?=($val == $y) ? 'selected="selected"' : '' ?>><?=$val?></option> 
  <?php } ?> 
</select>
<label>เลือกเดือน : </label>
<select id="m" name="m" style="padding:7px 10px;border-radius:5px;"> 
  <?php foreach ($month as $key=>$val) { ?> 
  <option value="<?= ($key < 9 )? '0'.($key+1) :$key+1;?>"><?=$val?></option> 
  <?php } ?> 
</select>
<button type="submit" class="btn btn-default" style="margin-top: -5px;">สรุปยอดขาย</button>
</form>
                  </div>        
                </div>  
              </div>
              </div>
              <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
              <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="../images/money.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">สรุปยอดขายประจำปี</h2>
                    <hr>
<form action="circulationperyear.php" method="post">
<label>เลือกปี : </label>
<select id="y" name="y" style="padding:7px 10px;border-radius:5px;"> 
  <?php foreach (range (2557, 2600) as $val) { ?> 
  <option value="<?=$val-543?>" <?=($val == $y) ? 'selected="selected"' : '' ?>><?=$val?></option> 
  <?php } ?> 
</select>
<button type="submit" class="btn btn-default" style="margin-top: -5px;">สรุปยอดขาย</button>
</form>
                  </div>        
                </div>  
              </div>
              </div>
              <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
             <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="../images/money.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">ค้นหาข้อมูลยอดขายตามวันที่
                    
                    </h2><hr>

<select id="dx" name="sDay" style="padding:7px 10px;border-radius:5px;"> 
    <?php foreach (range (1, 31) as $val) { ?> 
  <option value="<?=($val < 10)?'0'.$val:$val;?>" <?=($val == $d) ? 'selected="selected"' : '' ?>><?=$val?></option> 
  <?php } ?> 
</select> 
<select id="mx" name="sMonth" style="padding:7px 10px;border-radius:5px;"> 
  <?php foreach ($month as $key=>$val) { ?> 
  <option value="<?= ($key < 9 )? '0'.($key+1) :$key+1;?>" <?=($key == $m-1) ? 'selected="selected"' : '' ?>><?=$val?></option> 
  <?php } ?> 
</select> 
<select id="yx" name="sYear" style="padding:7px 10px;border-radius:5px;"> 
  <?php foreach (range (2557, 2600) as $val) { ?> 
  <option value="<?=$val-543?>" <?=($val == $y) ? 'selected="selected"' : '' ?>><?=$val?></option> 
  <?php } ?> 
</select>
<a href="javascript:searchCirculation();" class="btn btn-default" style="margin-top: -3px;margin-left: 10px;">ค้นหาข้อมูล</a>
                  </div>        
                </div>
              </div></div>
        <?php 
        //$link = mysql_connect("localhost","root","1234");
       	$link = mysql_connect("localhost","tawansho_db","123456");
        mysql_select_db("tawansho_db",$link);
        mysql_query("SET NAMES UTF8");
        $query = "SELECT DISTINCT SUBSTRING(o_date,1,10) AS o_date FROM orders order by o_date desc";
        $result = mysql_query($query,$link);
        $row = mysql_num_rows($result);
        $dx = $d."-".$m."-".($y-543);
        ?>
        <?php if($row > 0){?>
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
              
              <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="../images/money.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">ประวัติยอดขายในแต่ละวัน 
                    <a href="viewgraph.php" style="float: right;">ดูกราฟเปรียบเทียบยอดขาย</a>
                    </h2>
                    <label style="color:red;">*ยอดขายจะนับเฉพาะใบสั่งซื้อที่ชำระเงินแล้วเท่านั้น</label>
                  </div>        
                </div><hr>
              
    		<div class="panel-default table-responsive">
              <table id="example" class="display">
                <thead>
                  <tr align="center">
                    <td>#</td>
                    <td>วัน-เดือน-ปี</td>
                    <td>ยอดขายทั้งหมด</td>
                    <td>จำนวนใบสั่งซื้อ</td>
                    <td>รายละเอียดเพิ่มเติม</td>

                  </tr>
                </thead>
                <tbody>   
		<?php 
		function getSum($date){
			//$link = mysql_connect("localhost","root","1234");
			$link = mysql_connect("localhost","tawansho_db","123456");
			mysql_select_db("tawansho_db",$link);
			mysql_query("SET NAMES UTF8");
			$q = "SELECT * FROM orders WHERE o_date LIKE ('%$date%') and (o_status='รอการจัดส่งสินค้า' or o_status='จัดส่งสินค้าเรียบร้อย')";
			$r = mysql_query($q,$link);
			$sum = 0;
			while ($dd = mysql_fetch_object($r)){
				$x = mysql_query("select sum(od_psum) AS sumx  From orderdetail where o_id = ".$dd->o_id);
				$y = mysql_fetch_object($x);
				$sum += $y->sumx;
			}
			return $sum;
		}
		function getCount($date){
			//$link = mysql_connect("localhost","root","1234");
			$link = mysql_connect("localhost","tawansho_db","123456");
			mysql_select_db("tawansho_db",$link);
			mysql_query("SET NAMES UTF8");
			$q = "SELECT count(o_id) as ox FROM orders WHERE o_date LIKE ('%$date%')";
			$r = mysql_query($q,$link);
			$s = mysql_fetch_object($r);
			return $s->ox;
		}
		$x = 0;
		if($row > 0){
			while($data = mysql_fetch_object( $result )){
			$sum = getSum($data->o_date);
			$count = getCount($data->o_date);
			$df = split("-", $data->o_date);

		?>
                <tr align="center">
                    <td style="vertical-align: middle;"><?php echo $x+1;?></td>
                    <td style="vertical-align: middle;"><?php echo number_format($df[0]).' '.$month[number_format($df[1]-1)].' '.($df[2]+543)?></td>
                    <td style="vertical-align: middle;"><?php echo number_format($sum)?> บาท</td>
                    <td style="vertical-align: middle;"><?php echo $count?></td>
                    <td style="vertical-align: middle;"><a target="_blank" href="getcirculation.php?date=<?php echo $data->o_date;?>" style="cursor: pointer;">รายละเอียด</a></td>
                   
                  </tr>
                  
       	
       	<?php $x++;}}?>
       
       	</tbody>
              </table> 
          </div></div>
          </div>
          <?php } else {?>
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
             <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="../images/status.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">ไม่พบข้อมูลของวันนี้</h2>
                  </div>        
                </div>
              </div></div>
          <?php }?>
          
             
        </div>
      </div>
    </div>

  </body>
</html>