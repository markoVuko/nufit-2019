window.onload=function(){
	fillMenus();
	cartQuantity();
	scrollMenu();
	menuToggle();
	$("#submit-contact").click(validate);
	$("#contact-form").submit(function(e){
		e.preventDefault();
	})
}

function validate(){
	var firstName = document.getElementById("firstname");
	var firstNameRX = /^[A-Z][a-z]{2,11}$/;
	var greske = [];
	if(!firstNameRX.test(firstName.value))
	{
		
		firstName.classList.add("bad");
		greske.push("The first name must start with a capital letter and contain 3-12 letters");
	} 
	else {
		firstName.classList.remove("bad");
	}

	var lastName = document.getElementById("lastname");
	var lastNameRX = /^[A-Z][a-z]{2,19}$/;
	if(!lastNameRX.test(lastName.value))
	{
		
		lastName.classList.add("bad");
		greske.push("The last name must start with a capital letter and contain 3-12 letters");
	} 
	else {
		lastName.classList.remove("bad");
	}

	var email = document.getElementById("email");
	var emailRX = /^(\w+(\.\w{2,})?){3,50}@(\w{2,10}(\.{1,1}[a-z]{2,3}){1,3})$/;
	if(!emailRX.test(email.value))
	{
		email.classList.add("bad");
		greske.push("You've entered an invalid email.");
	}
	else {
		email.classList.remove("bad");
	}

	var num = document.getElementById("number");
	var numRX = /^06[1-9](\s|-|\/)?[0-9]{3}(\s|-|\/)?[0-9]{3,4}$/;
	if(!numRX.test(num.value))
	{
		num.classList.add("bad");
		greske.push("You've entered an invalid number.<br> Try: 06X( -/)XXX( -/)XXX(X)")
	}
	else {
		num.classList.remove("bad");
	}

	var gend = document.getElementsByName("gender");
	var pick = false;

	for(var i=0;i<gend.length;i++)
	{
		if(gend[i].checked)
		{
			pick=true;
			break;
		}
	}
	if(!pick)
	{
		greske.push("Choose a gender!");
	}

	var txt = document.getElementById("feedback");
	if(txt.value.length==0)
	{
		greske.push("Write your feedback!");
	}
	var ispis="";
	if(greske.length>0){
		ispis+=`<div id="bad-val">`;
		for(var i=0;i<greske.length;i++)
		{
			ispis+=`<p>${greske[i]}</p>`;
		}
		ispis+=`</div>`;
		$("#val-message").html(ispis);
	}
	if(greske.length==0) {
		$.ajax({
			url:"../../models/contact-fetch.php",
			method:"POST",
			data:{
				action:true,
				firstName:firstName.value,
				lastName:lastName.value,
				email:email.value,
				num:num.value,
				gender:$("input[name='gender']:checked").val(),
				text:txt.value
			},
			success:function(response,status,jqXHR){
				if(jqXHR.status==204){
					ispis=`<div id="good-val"><p>Your feedback was sent successfully!</p></div>`;
					$("#val-message").html(ispis);
				}
			},
			error:function(error){
				if(error.status==409){
					ispis=`<div id="bad-val"><p>Failed to send feedback, please check your input.</p></div>`;
					$("#val-message").html(ispis);
				}
				if(error.status==412){
					var res = response.json();
					let odg="";
					res.forEach(function(r){
						odg += r+"\n";
					});
					alert(odg);
				}
			}
		});
		
	}
}