function cartQuantity(){
	var cartp = JSON.parse(localStorage.getItem("Products"));
	if(cartp)
	{
		$(".cartnum").html(cartp.length);
	}
	else {
		$(".cartnum").html("0");
	}
}

function menuToggle(){
	$("#phone-nav").hide();

	$(".nav-bars").click(function(e){
		e.preventDefault();
		$("#phone-nav").slideToggle("slow");
	})
}

function fillMenus() {
	var urlS = window.location.href;
	var url = urlS.split("/");
	if(url[url.length-1].indexOf("index")!=-1)
	{
		$.ajax({
			url:"views/fixed/menu.php",
			method:"POST",
			data:{
				action:true,
				loc:"index"
			},
			success:function(ispis){
				$("nav ul").html(ispis);
			},
			error:function(error){
				console.log(error);
			}
		});
		$.ajax({
			url:"views/fixed/footer.php",
			method:"POST",
			data:{
				action:true,
				loc:"index"
			},
			success:function(ispis){
				$("footer").html(ispis);
			},
			error:function(error){
				console.log(error);
			}
		});
	}
	else {
		$.ajax({
			url:"../fixed/menu.php",
			method:"POST",
			data:{
				action:true,
				loc:"other"
			},
			success:function(ispis){
				$("nav ul").html(ispis);
			},
			error:function(error){
				console.log(error);
			}
		});
		$.ajax({
			url:"../fixed/footer.php",
			method:"POST",
			data:{
				action:true,
				loc:"other"
			},
			success:function(ispis){
				$("footer").html(ispis);
			},
			error:function(error){
				console.log(error);
			}
		});
	}
}