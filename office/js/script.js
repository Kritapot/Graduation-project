function confirmChangeStatus(code,status){
	if(status == "รอการจัดส่งสินค้า"){
		alertify.prompt('กรุณากรอกหมายเลขพัสดุที่จัดส่งสินค้า', 'EH123456789TH', 
			    function(evt, value){ 
			alertify.confirm(value+' กรุณายืนยันว่าหมายเลขนี้ถูกต้อง !').set({
				'onok':function(){
					location.href = "updatestatus.php?code="+code+"&status="+status+"&ems="+value+"&email="+document.getElementById("m_email").value+"&name="+document.getElementById("m_name").value;
				}
			});
		}
			);
	}else{
		if(confirm("ยืนยันการทำรายการ ?")){
			location.href = "updatestatus.php?code="+code+"&status="+status;
		}
	}
}

function changeStatus(){
	location.href = "order.php?s="+document.getElementById("status").value;
}
function changeCategory(){
	location.href = "product.php?c="+document.getElementById("category").value;
}
function logout(){
	if(confirm('ยืนยันการออกจากระบบ ?')){
		location.href = "logout.php";
	}
}
function deleteProduct(id){
	if(confirm('ยืนยันการลบสินค้า?')){
		location.href = "deleteproduct.php?id="+id;
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