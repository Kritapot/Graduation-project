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
        <?php 
        date_default_timezone_set("Asia/Bangkok");
        $month = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน",
        		"กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
        
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
        function toDate($date){
        	$df = split("-", $date);
        	return number_format($df[0])." ".$GLOBALS['month'][number_format($df[1]-1)]." ".($df[2]+543);
        }
        $d1 = $_POST["d1"];
        $d2 = $_POST["d2"];
        $m = $_POST["m"];
        $y = $_POST["y"];
        $date1 = $d1."-".$m."-".$y;
        $date2 = $d2."-".$m."-".$y;
        ?>
        <div class="templatemo-content-container">
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
              <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="images/admin.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">สรุปยอดขายประจำวันแบบกราฟ</h2>
                  </div>        
                </div>  
              </div>
              </div>
              <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">
             <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="../images/status.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">รายละเอียดยอดขายวันที่ <?php echo toDate($date1)." - ".toDate($date2);?></h2><hr>
					
 <?php 

        //$link = mysql_connect("localhost","root","1234");
       	$link = mysql_connect("localhost","tawansho_db","123456");
        mysql_select_db("tawansho_db",$link);
        mysql_query("SET NAMES UTF8");
        $query = "SELECT DISTINCT SUBSTRING(o_date,1,10) AS datex FROM orders WHERE o_date >= '$date1' and o_date <= '$date2%'";
        $result = mysql_query($query,$link);
        $row = mysql_num_rows($result);

        if($row > 0){
        	$str = "";
        	while($data = mysql_fetch_object($result)){
        		$sum = getSum($data->datex);
        		$count = getCount($data->datex);
        		$df = split("-", $data->datex);
        		$str .= "['".number_format($df[0])." ".$month[number_format($df[1]-1)]." ".($df[2]+543)."', ".$sum."],";
        	}
        	$str = substr($str, 0,strlen($str)-1);
        	$str = "['วันที่', 'ยอดขาย (บาท)'],".$str;

?>   
<div style="margin:auto;width:100%;">
					<div id="chart_div" style="margin:auto;width:600px;height:400px;"></div>  
					</div>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() {
    // สร้างตัวแปร array เก็บค่า ข้อมูล
    var dataArray1=[
      <?php echo $str;?>          
    ];
        
    // แปลงข้อมูลจาก array สำหรับใช้ในการสร้าง กราฟ
    var data = google.visualization.arrayToDataTable(dataArray1);

    // ตั้งค่าต่างๆ ของกราฟ
    var options = { 
        title: "รายละเอียด ",
        hAxis: {title: 'วันเดือนปี', titleTextStyle: {color: 'blue'}},
        vAxis: {title: 'ยอดขาย (บาท)', titleTextStyle: {color: 'blue'}},
        width: 600,
        height: 400,
        bar: {groupWidth: "70%"},
        legend: { position: 'right', maxLines: 3 },
        tooltip: { trigger: 'select' }
    };

    // สร้างกราฟแนวตั้ง แสดงใน div id = chart_div
    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
    chart.draw(data, options); // สร้างกราฟ
    
}
</script>  
<?php } else {?>
<h2>ไม่พบข้อมูล
<a href="viewgraph.php">ย้อนกลับ</a>
</h2>
<?php }?>
                  </div>        
                </div>
              </div></div>
        
          
             
        </div>
      </div>
    </div>

  </body>
</html>