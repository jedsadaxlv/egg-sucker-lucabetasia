let toast = Swal.mixin({
	buttonsStyling: false,
	customClass: {
	confirmButton: 'btn btn-alt-success m-5',
	cancelButton: 'btn btn-alt-danger m-5',
	input: 'form-control'
	}
});
function alertmsg(i,msg){
if(i==0){var ico = 'fa fa-check';var type = 'success';var delay = 5000;}
else if(i==1){var ico = 'fa fa-info-circle';var type = 'info';var delay = 5000;}
else if(i==2){var ico = 'fa fa-warning';var type = 'warning';var delay = 5000;}
else if(i==3){var ico = 'fa fa-times';var type = 'danger';var delay = 0;}
$.notify({
	icon: ico,
	message: msg
},{
	type: type,
	placement: {
    from: 'bottom',
    align: 'right'
    },
	delay: delay
});
}
function doLogout(){
var req = $.get("login.php", {act:2}, 0, "json");
req.fail(function(){toast.fire('แจ้งเตือน', "เกิดปัญหาการเชื่อมต่อไปยังเซิร์ฟเวอร์ กรุณาตรวจสอบการเชื่อมต่ออินเตอร์เน็ต", 'error');});
req.always(function(){});
req.done(function(data){
	if(data.status=="0"){
		document.location = "login.php?redirect="+redirect;
		}else{
		toast.fire('แจ้งเตือน', "เกิดปัญหาบางประการ ไม่สามารถดำเนินการต่อไปได้ กรุณาติดต่อทีมงาน", 'error');
		}
	});
}