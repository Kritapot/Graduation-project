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
        
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1">

              <div class="media margin-bottom-30">
                <div class="media-left padding-right-25">
                    <img class="media-object img-circle templatemo-img-bordered" src="images/information.png" style="width: 100px; ">
                </div>
                <div class="media-body">
                  <h2 class="media-heading text-uppercase blue-text">ขอบคุณที่ใช้บริการ กรุณารอสักครู่ .. ระบบกำลังส่งรายละเอียดการสั่งซื้อไปที่ Email ของท่าน</h2>
                  <p>*กรุณาบันทึกรายละเอียดการชำระเงิน</p>
                </div>        
              </div>
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><div class="circle green-bg"></div></td>
                      <td>เลขที่ใบสั่งซื้อ</td>
                      <td><?php echo $_SESSION["no"]?></td>                    
                    </tr> 
                    <tr>
                      <td><div class="circle pink-bg"></div></td>
                      <td>จำนวนเงินที่ต้องชำระ</td>
                      <td><?php echo number_format($_SESSION["total"]);?> บาท</td>                    
                    </tr>  
                                                      
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>
          <div class="templatemo-flex-row flex-content-row">             
              <div class="templatemo-content-widget white-bg col-2">                
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object img-circle" src="images/ktb_bank.jpg" alt="Sunset" style="width: 100px;">
                    </a>
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">ช่องทางการโอนเงิน</h2>
                    <p>ธนาคารกรุงไทย <br>บัญชีออมทรัพย์เลขที่ 455-0-22187-9<br>นางสาวอุไรวรรณ พิมเถื่อน</p>  
                  </div>        
                </div>                
              </div>            
              <div class="templatemo-content-widget white-bg col-2">
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object img-circle" src="images/k_bank.jpg" alt="Sunset" style="width: 100px;">
                    </a>
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">ช่องทางการโอนเงิน</h2>
                    <p>ธนาคารกสิกรไทย <br>บัญชีออมทรัพย์เลขที่ 792-2-06270-0<br>นางสาวอุไรวรรณ พิมเถื่อน</p>  
                  </div>
                </div>                
              </div>            
            
                      
          </div> <!-- Second row ends -->
                
        </div>
      </div>
    </div>
   

  </body>
</html>