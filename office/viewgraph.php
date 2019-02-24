<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once 'head.php'?>
    <script type="text/javascript">

	function getDay(){
		var x = document.getElementById("m").value;
		if(x != 0){
			var m = parseInt(x);
			var d = daysInMonth(m,document.getElementById("y").value);
			var str = "<option disabled selected>เลือกวันที่</option>";
			for(var i = 1; i <= d; i++){
				if( i < 10){
					str += "<option value='0"+(i)+"'>"+(i)+"</option>";
				} else {
					str += "<option value='"+(i)+"'>"+(i)+"</option>";
				}
			}
			document.getElementById("d1").innerHTML = str;
		}
	}
	function getDay2(){
		var d1 = parseInt(document.getElementById("d1").value);
		var d2 = daysInMonth(document.getElementById("m").value,document.getElementById("y").value);
		var str = "";
		for(var i = 1; i <= d2; i++){
			if(d1 <= i){
				if( i < 10){
					str += "<option value='0"+(i)+"'>"+(i)+"</option>";
				} else {
					str += "<option value='"+(i)+"'>"+(i)+"</option>";
				}
			}
		}
		document.getElementById("d2").innerHTML = str;
	}
	function verifyForm(){
		var chk = true;
		if(document.getElementById("d1").value == 0){
			chk = false;
		}
		if(document.getElementById("d2").value == 0){
			chk = false;
		}
		if(document.getElementById("m").value == 0){
			chk = false;
		}
		if(!chk){
			alert("กรุณาเลือกข้อมูลให้ครบทุกช่อง");
			return false;
		}else{
			return true;
		}
	}
	function daysInMonth(month,year) {
	    return new Date(year, month, 0).getDate();
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
                    <h2 class="media-heading text-uppercase">กรุณาเลือกช่วงเวลา</h2><hr>
<?php 
	date_default_timezone_set("Asia/Bangkok");
    $d = date('d'); 
    $m = date('m'); 
    $y = date('Y')+543;
    $month = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน", 
                                 "กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 
?> 
<form action="generategraph.php" method="post" onsubmit="return verifyForm();">
<label>เลือกปี : </label>
<select id="y" name="y" style="padding:7px 10px;border-radius:5px;" onchange="getDay()"> 
  <?php foreach (range (2557, 2600) as $val) { ?> 
  <option value="<?=$val-543?>" <?=($val == $y) ? 'selected="selected"' : '' ?>><?=$val?></option> 
  <?php } ?> 
</select> <br><br>
<label>เลือกเดือน : </label>
<select id="m" name="m" style="padding:7px 10px;border-radius:5px;" onchange="getDay()"> 
<option value="0" disabled selected>กรุณาเลือกเดือน</option> 
  <?php foreach ($month as $key=>$val) { ?> 
  <option value="<?= ($key < 9 )? '0'.($key+1) :$key+1;?>"><?=$val?></option> 
  <?php } ?> 
</select> <br><br>
<label>เลือกช่วงวันที่ : </label>
<select id="d1" name="d1" style="padding:7px 10px;border-radius:5px;min-width: 100px;" onchange="getDay2()"> 
  <option value="0">กรุณาเลือกเดือนก่อน</option> 
</select> 
<label>ถึงวันที่ : </label>
<select id="d2" name="d2" style="padding:7px 10px;border-radius:5px;min-width: 100px;"> 
    <option value="0">กรุณาเลือกวันที่เริ่มต้น</option> 
</select> 
<br><br>
<button type="submit" class="btn btn-default" >ดูข้อมูลกราฟ</button>
</form>
                  </div>        
                </div>
              </div></div>
        
          
             
        </div>
      </div>
    </div>

  </body>
</html>