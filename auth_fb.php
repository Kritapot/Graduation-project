<?php
 session_start();
 
 require("class/facebook.php");  
 define("FB_APP_ID" , "1477882625838147");  // App ID ที่ได้จากการสร้าง App
 define("FB_APP_SECRET" , "40e9d19b84a8c199b6c5d904a4c99c13"); // App Secret ที่ได้จากการสร้าง App
 $FB = new Facebook(array(
           'appId'  => FB_APP_ID,
           'secret' => FB_APP_SECRET,
         ));
 $user = NULL;
 $user = $FB->getUser();  // Get User
 
 if ($user) { // ตรวจสอบว่าสามารถ Login แล้ว Get ข้อมูลได้หรือไม่
 
  try { 
  
   $FB_ME_INFO = $FB->api('/me'); // เป็นการเรียก Method /me ซึ่งเป็นข้อมูลเกี่ยวกับผู้ใช้ท่านนั้นๆ ที่ได้ทำการ Login
   
   $_SESSION['LOGIN_FB_ID'] = $FB_ME_INFO["id"];
   $_SESSION['LOGIN_FB_FULLNAME'] = $FB_ME_INFO["name"];
   
   print_r($FB_ME_INFO);
   //header("Location:./index.php"); 
   
  } catch(FacebookApiException $e) { 
   echo $e;  // print Error
   header("Location:./index.php?Login=fail"); 
  }
  
 } else {
  header("Location:./index.php?Login=fail");
 }

?>
