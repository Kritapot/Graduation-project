function strOnly(e){
	return /^[a-zA-Zก-๙()]+$/.test(e);
}
function numOnly(e){
	return /^\d+$/.test(e);
}
function doubleOnly(e){
	var pattern = /^\d+.?\d*$/;
	if (e.match(pattern) == null)
		return false;
	else
		return true;
}
function addToCart(id) {

	var amount = 1;
	var http1 = new XMLHttpRequest();
	;
	http1.onreadystatechange = function() {
		if (http1.readyState == 4 && http1.status == 200) {
			document.getElementById("mycart").innerHTML = http1.responseText;
		}
	}
	http1.open("GET", "addtocart.php?id=" + id + "&a=" + amount, true);
	http1.send();
	$.notify.defaults({ className: "success" });
	setTimeout(function(){
		$("#btn_cart")[0].click();	
	},200)
	setTimeout(function(){
		$("#p_cart").notify("เพิ่มสินค้าเรียบร้อยแล้ว", {position:"right"});
	},700);

}

function cancelProduct(i){
	if(confirm("ยืนยันการยกเลิกสินค้า ?")){
		location.href="cancelproduct.php?i="+i;
	} 
}

function updateProduct(i){
	if(confirm("ยืนยันการแก้ไขรายการสินค้า ?")){
		var amount = document.getElementById("am"+i).value;
		if(numOnly(amount) && amount > 0){
			location.href = "updateproduct.php?i="+i+"&amount="+amount;
		} else {
			alert("กรุณากรอกข้อมูลเป็นตัวเลขที่มีค่ามากกว่า 1 !");
		}
		
	}
}

function validateRegisterForm(){
	var chk = true;
	var alt = "";
	if(!strOnly(frm.name.value)){
		alt += "- กรุณากรอกชื่อเป็นตัวหนังสือเท่านั้น !!\n";
		chk = false;
	}
	if(!strOnly(frm.lastname.value)){
		alt += "- กรุณากรอกนามสกุลเป็นตัวหนังสือเท่านั้น !!\n";
		chk = false;
	}
	if(!numOnly(frm.tel.value) || frm.tel.value.length != 10){
		alt += "- กรุณากรอกเบอร์โทรศัพท์เป็นตัวเลขจำนวน 10 หลักเท่านั้น !!\n";
		chk = false;
	}
	if(frm.pwd.value.length < 6){
		alt += "- รหัสผ่านต้องมีความยาวไม่ต่ำกว่า 6 ตัวอักษร !!\n";
		chk = false;
	}
	if(frm.pwd.value != frm.cf_pwd.value){
		alt += "- กรุณากรอกรหัสผ่านให้ตรงกัน !!\n";
		chk = false;
	}
	if(!chk){
		alert(alt);
		return false;
	}
}
function validateEditProfileForm(){
	var chk = true;
	var alt = "";
	if(!strOnly(frmx.name.value)){
		alt += "- กรุณากรอกชื่อเป็นตัวหนังสือเท่านั้น !!\n";
		chk = false;
	}
	if(!strOnly(frmx.lastname.value)){
		alt += "- กรุณากรอกนามสกุลเป็นตัวหนังสือเท่านั้น !!\n";
		chk = false;
	}
	if(!numOnly(frmx.tel.value) || frmx.tel.value.length != 10){
		alt += "- กรุณากรอกเบอร์โทรศัพท์เป็นตัวเลขจำนวน 10 หลักเท่านั้น !!\n";
		chk = false;
	}
	if(!chk){
		alert(alt);
		return false;
	}
}
function validateChangePwdForm(){
	var chk = true;
	var alt = "";
	if(frmz.oldpwd.value != frmz.cpwd.value){
		alt += "- รหัสผ่านเดิมไม่ถูกต้อง !!\n";
		chk = false;
	}
	if(frmz.newpwd.value.length < 6){
		alt += "- รหัสผ่านต้องมีความยาวไม่ต่ำกว่า 6 ตัวอักษร !!\n";
		chk = false;
	}
	if(frmz.newpwd.value != frmz.cfnewpwd.value){
		alt += "- กรุณากรอกรหัสผ่านให้ตรงกัน !!\n";
		chk = false;
	}
	if(!chk){
		alert(alt);
		return false;
	}
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('preview').src=e.target.result;
            document.getElementById('preview').style.display = "";
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function chk_pwd(){
	if(frm.pwd.value != frm.cf_pwd.value){
		document.getElementById("c1").style.visibility = "visible";
		document.getElementById("c2").style.visibility = "visible";
	} else {
		document.getElementById("c1").style.visibility = "hidden";
		document.getElementById("c2").style.visibility = "hidden";
	}
}
function logout(){
	if(confirm("ยืนยันการออกจากระบบ ?")){
		location.href = "logout.php";
	}
}
function deleteAddress(id){
	if(confirm("ยืนยันการลบที่อยู่ ?")){
		location.href = "deleteaddress.php?id="+id;
	}
}
function changeTypePwd(){

	if(frmz.oldpwd.type == "password"){
		frmz.oldpwd.type = "text"
		frmz.newpwd.type = "text"
		frmz.cfnewpwd.type = "text"
	} else {
		frmz.oldpwd.type = "password"
		frmz.newpwd.type = "password"
		frmz.cfnewpwd.type = "password"
	}
	
}