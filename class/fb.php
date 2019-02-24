<?php

 // Facebook API
 require("class/facebook.php");  
 define("FB_APP_ID" , "1477882625838147");  // App ID ที่ได้จากการสร้าง App
 define("FB_APP_SECRET" , "40e9d19b84a8c199b6c5d904a4c99c13"); // App Secret ที่ได้จากการสร้าง App
 $FB = new Facebook(array(
           'appId'  => FB_APP_ID,
           'secret' => FB_APP_SECRET,
         ));
 $param['redirect_uri'] = "http://localhost/tawanshop/auth_fb.php"; // เมื่อ Login ผ่าน Facebook สำเร็จให้วิ่งกลับไป Link ดังกล่าว
 $param['scope'] = "public_profile ,email"; // คือ Permission ที่เราต้องการ เช่น publish_stream = อนุญาติให้โพสผ่านหน้า wall ได้
 $param['popup'] = 1; // เพื่อให้ App ใน Facebook ขึ้นว่า Login With Facebook
  
 $FB_ME_INFO = NULL;
 $FB_LOGIN_URL = "";
 $FB_LOGOUT_URL = "";

 $FB_LOGIN_URL = $FB->getLoginUrl( $param );
  
 define("FB_LOGIN_URL" , $FB_LOGIN_URL);
 echo '<a href="'.FB_LOGIN_URL.'"><img src="images/fb-login.png" style="height:44px;margin-top:-3px;"></a>';

?>