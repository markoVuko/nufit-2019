window.onload = function() {
	fillMenus();
	fillGalleries();
	cartQuantity();
	scrollMenu();
	menuToggle();
	gallery();
	staffGallery();
	counter();
	offer();
	about();
}

function fillGalleries() {
	$.ajax({
		url:"models/index-handling.php",
		method:"POST",
		data:{
			action:"customers"
		},
		success:function(customers){
			console.log(customers);
			var ispis = "<h3>Satisfied Customers</h3>"+customers;
			$("#customers").html(ispis);
		}
	});

	$.ajax({
		url:"models/index-handling.php",
		method:"POST",
		data:{
			action:"staff"
		},
		success:function(staff){
			var ispis = "<h3>Our Staff</h3>"+staff;
			$("#staff").html(ispis);
		}
	});
}

function gallery(){
	$(document).on("click","#customers a",function(e){
		e.preventDefault();
		$("#lightbox-content img").attr("src",$(this).children().eq(0).attr("src"));
		$("#lightbox").show();
	});

	$("#close").click(function(e){
		e.preventDefault();
		$("#lightbox").hide();
	});

	$(document).keyup(function(e){
    	if(e.key === "Escape")
    	{
    		$("#lightbox").hide();
    	}
	});

	$("#next").click(function(e){
		e.preventDefault();
		$.ajax({
		url:"models/fetch-customers.php",
		method:"POST",
		dataType:"JSON",
		success:function(customers){
			var lsrc=$("#lightbox-content img").attr("src");
			var newSrc = "";
			for(var i=0;i<customers.length;i++)
			{
				if(customers[i].Path==lsrc)
				{
					if(i==customers.length-1)
					{
						newSrc=customers[0].Path;
					}
					else {
						newSrc=customers[i+1].Path;
					}
					break;
				}
			}
			$("#lightbox-content img").attr("src",newSrc);
		},
		error:function(error){
			console.log(error);
		}
	});
	});

	$("#prev").click(function(e){
		e.preventDefault();
		$.ajax({
		url:"models/fetch-customers.php",
		method:"POST",
		dataType:"JSON",
		success:function(customers){
			var lsrc=$("#lightbox-content img").attr("src");
			var newSrc = "";
			for(var i=0;i<customers.length;i++)
			{
				if(customers[i].Path==lsrc)
				{
					if(i==0)
					{
						newSrc=customers[customers.length-1].Path;
					}
					else {
						newSrc=customers[i-1].Path;
					}
					break;
				}
			}
			$("#lightbox-content img").attr("src",newSrc);
		},
		error:function(error){
			console.log(error);
		}
	});
	});
}

function staffGallery(){
	$(document).on("click","#staff a",function(e){
		e.preventDefault();
		$("#staff-lightbox-content img").attr("src",$(this).children().eq(0).attr("src"));
		$("#staff-lightbox").show();
	});

	$("#staff-close").click(function(e){
		e.preventDefault();
		$("#staff-lightbox").hide();
	});

	$(document).keyup(function(e){
    	if(e.key === "Escape")
    	{
    		$("#staff-lightbox").hide();
    	}
	});

	$("#staff-next").click(function(e){
		e.preventDefault();
		$.ajax({
		url:"models/fetch-staff.php",
		method:"POST",
		dataType:"JSON",
		success:function(staff){
			var lsrc=$("#staff-lightbox-content img").attr("src");
			var newSrc = "";
			console.log(staff[0].Path);
			for(var i=0;i<staff.length;i++)
			{
				if(staff[i].Path==lsrc)
				{
					if(i==staff.length-1)
					{
						newSrc=staff[0].Path;
					}
					else {
						newSrc=staff[i+1].Path;
					}
					break;
				}
			}
			$("#staff-lightbox-content img").attr("src",newSrc);
		},
		error:function(error){
			console.log(error);
		}
	});
	});

	$("#staff-prev").click(function(e){
		e.preventDefault();
		$.ajax({
		url:"models/fetch-staff.php",
		method:"POST",
		dataType:"JSON",
		success:function(staff){
			var lsrc=$("#staff-lightbox-content img").attr("src");
			var newSrc = "";
			for(var i=0;i<staff.length;i++)
			{
				if(staff[i].Path==lsrc)
				{
					if(i==0)
					{
						newSrc=staff[staff.length-1].Path;
					}
					else {
						newSrc=staff[i-1].Path;
					}
					break;
				}
			}
			$("#staff-lightbox-content img").attr("src",newSrc);
		},
		error:function(error){
			console.log(error);
		}
	});
	});
}

function counter(){
	$(".stats-block").hide();
	br=0;
	var t = $("#stats").offset().top - 750;
	$(window).scroll(function() {
		if ( $(this).scrollTop() >= t) 
		{
			br++;
			$(".stats-block").fadeIn(1000);
			if(br==1){
				$(".stats-block h4").each(function () {
					$(this).prop("Counter",0).animate({Counter: $(this).text()}, 
					{
					    duration: 6000,
					    easing: "swing",
					    step: function (now) { $(this).text(Math.ceil(now));}
					});
				});
			}
		}
		else {
			$(".stats-block").fadeOut(1000);
		} 
	});
	

}

function offer(){
	$(".offer-block").hide();
	var t = $("#offer").offset().top - 750;
	$(window).scroll(function() {
		if ( $(this).scrollTop() >= t) 
		{
			$(".offer-block").fadeIn(2500);		
		}
		else {
			$(".offer-block").fadeOut(2000);
		} 
	});
}

function about(){
	$("#about-us-text").hide();
	var t = $("#about-us").offset().top - 750;
	$(window).scroll(function() {
		if ( $(this).scrollTop() >= t) 
		{
			$("#about-us-text").slideDown(2000);		
		}
		else {
			$("#about-us-text").slideUp(2000);
		} 
	});
}
