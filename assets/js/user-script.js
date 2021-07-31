window.onload = function(){
	$(".val-error").hide();
	$(".tab-block:not(:first)").hide();   
	$("#tabs a").click(function(e)
	{
		e.preventDefault();
		if($(this).hasClass("notsel"))
		 { 
		 	$("#tabs a").addClass("notsel");           
		   	$(this).removeClass("notsel");
		   	$(".tab-block").slideUp("fast");
		   	$("#"+ $(this).attr("href")).slideDown("slow");
	 	 }
	 });

	$("#log-form").on("submit",function(e){
		e.preventDefault();
		logVal();
	});
	$("#reg-form").on("submit",function(e){
		e.preventDefault();
		regVal();
	});
}

function logVal() {
	var greske = 0;
	var username = document.getElementById("l-username")
	var usernameRX=/^\w{4,12}$/;
	if(!usernameRX.test(username.value))
	{
		greske++;
		username.classList.add("bad");
		$("#l-username").next().next().show();
	} else {
		username.classList.remove("bad");
		$("#l-username").next().next().hide();
	}

	var pw = document.getElementById("l-password");
	var pwRX = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])[A-Za-z0-9]{8,30}$/;
	if(!pwRX.test(pw.value))
	{
		greske++;
		pw.classList.add("bad");
		$("#l-password").next().next().show()
	} else {
		pw.classList.remove("bad");
		$("#l-password").next().next().hide();
	}

	if(greske==0)
	{
		$.ajax({
			url:"../../models/login.php",
			method:"POST",
			data: {
				login:true,
				username:username.value,
				pw:pw.value
			},
			success:function(data,status,jqXHR){
				if(jqXHR.status==200){
					  if(data.length==0){
					      alert("You've successfully logged in!");
					      $("#return").click();
					  }
					  else {
					      alert(data);
					  }
					
				}
				else {
					alert(data);
					
				}
			},
			error:function(xhr){
				if(xhr.status==422){
					alert("Invalid login info.");
				}
			}
		});
	}
}

function regVal() {
	var greske = 0;
	var username = document.getElementById("r-username");
	var usernameRX=/^\w{4,12}$/;
	if(!usernameRX.test(username.value))
	{
		greske++;
		username.classList.add("bad");
		$("#r-username").next().next().show();
	} else {
		username.classList.remove("bad");
		$("#r-username").next().next().hide();
	}

	var email = document.getElementById("email");
	var emailRX = /^(\w+(\.\w{2,})?){3,50}@(\w{2,10}(\.{1,1}[a-z]{2,3}){1,3})$/;
	if(!emailRX.test(email.value))
	{
		greske++;
		email.classList.add("bad");
		$("#email").next().next().show();
	} else {
		email.classList.remove("bad");
		$("#email").next().next().hide();
	}

	var pw1 = document.getElementById("pw1");
	var pwRX = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])[A-Za-z0-9]{8,30}$/;
	if(!pwRX.test(pw1.value))
	{
		greske++;
		pw1.classList.add("bad");
		$("#pw1").next().next().show();
	} else {
		pw1.classList.remove("bad");
		$("#pw1").next().next().hide();
	}
	var pw2 = document.getElementById("pw2");
	if(pw1.value!=pw2.value)
	{
		greske++;;
		pw2.classList.add("bad");
		$("#pw2").next().next().show();
	} else {
		pw2.classList.remove("bad");
		$("#pw2").next().next().hide();
	}

	if(greske==0)
	{
		$.ajax({
			url:"../../models/register.php",
			method:"POST",
			data: {
				register:true,
				username:username.value,
				email:email.value,
				pw1:pw1.value,
				pw2:pw2.value
			},
			success:function(data,status,jqXHR){
				if(jqXHR.status==200)
				{	
				    if(data.indexOf("error")!=-1){
				        alert("That username/email is already taken.");
				    }
				    else {
					    location.reload();
				    }
				}
				else {
					alert(data);
				}
			},
			error:function(xhr){
				if(xhr.status==422){
					alert("Invalid registration information");
				}
			}
		});
	}
}