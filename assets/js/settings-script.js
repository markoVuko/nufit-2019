window.onload = function(){
	fillMenus();
	cartQuantity();
	scrollMenu();
	menuToggle();	
}

function validacija() {
	var mail = $("#setmail").val();
	var pw1 = $("#setpw1").val();
	var pw2 = $("#setpw2").val();
	var pwRX =/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])[A-Za-z0-9]{8,30}$/;
	var emailRX = /^(\w+(\.\w{2,})?){3,50}@(\w{2,10}(\.{1,1}[a-z]{2,3}){1,3})$/;
	if(!emailRX.test(mail)) {
		alert("Your email is invalid.");
		return false;
	}
	else if(pw1!=null){
		if(!pwRX.test(pw1)){
		alert("Your password must be at least 8 characters, 1 capital, 1 small, 1 number");
		return false;
		} else if(pw1!=pw2){
			alert("Your passwords don't match.");
			return false;
		}
	} 
	return true;
}