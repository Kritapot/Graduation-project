<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once 'head.php';?>
  	<script src="ajax.js"></script>
  </head>
<body onload="Add();">  
    <!-- Left column -->
    <div class="templatemo-flex-row">
      
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <?php include_once 'menu.php';?>
        <div class="templatemo-content-container"  style="padding-top: 60px;">
        <div class="templatemo-content-widget white-bg" style="padding: 15px;padding-left: 30px;">       
                <div class="media">
                  <div class="media-left">
                      <img class="media-object img-circle" src="images/information.png" alt="Sunset" width="50px;">
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">ยินดีต้อนรับ คุณ <?php echo $m->name." ".$m->lastname;?></h2>
                  </div>        
                </div>               
        </div>
<div class="templatemo-content-widget white-bg">       
<h2>เพิ่มข้อมูลที่อยู่สำหรับจัดส่งสินค้า</h2>
<hr>
<div class="table-responsive">
<form name="frm" class="form-inline" action="saveaddressdata.php" method="post" onsubmit="return validateCustomerForm()">
<label style="color:#bb0000;">* กรุณากรอกที่อยู่จริง</label><br>
<br>
<table class="tbt" >
<tr>
<td>ที่อยู่</td>
<td>
<input required name="address1" type="text" class="form-control" placeholder="ที่อยู่ของคุณ" style="margin-left: 10px;width: 80%" >
</td>
</tr>
<tr>
<td>จังหวัด</td>
<td>
<select required id="Proviance" name="address4" class="form-control" style="margin-left: 10px;width: 200px;">
</select>
</td>
</tr>
<tr>
<td>เขต/อำเภอ</td>
<td >
<select required id="District" name="address3" class="form-control" style="margin-left: 10px;width: 200px;">
    	<option value=""> --- เลือกอำเภอ --- </option>
    </select>
</td>
</tr>
<tr>
<td>แขวง/ตำบล</td>
<td>
<select required id="Subdistrict" name="address2" class="form-control" style="margin-left: 10px;width: 200px;">
    	<option value=""> --- เลือกตำบล --- </option>
    </select>
</td>
</tr>
<tr>
<td>รหัสไปรษณีย์</td>
<td>
<select required id="Postcode" name="zipcode" class="form-control" style="margin-left: 10px;width: 200px;">
    	<option value=""> --- เลือกรหัสไปรษณีย์ --- </option>
    </select>
</td>
</tr>
</table>
<br><br>
<input id="btnSubmit" type="submit" class="templatemo-w-button" style="font-size:14px;" value="เพิ่มที่อยู่ >>">
</form>
              </div>
       	
</div>
       	
       	
		</div>
        </div>
      </div>
  </body>
</html>