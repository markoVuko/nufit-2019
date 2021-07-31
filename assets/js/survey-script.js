window.onload = function(){
	fillPolls();
	fillMenus();
	cartQuantity();
	scrollMenu();
	menuToggle();	

	$("#vote-label").click(voteLabel);
	$("#vote-services").click(voteServices);
	$("#vote-category").click(voteCategory);
}

function fillPolls(){
	$.ajax({
		url:"../../models/survey-handling.php",
		method:"POST",
		data:{
			action:"fillcat",
			userId:$("#vote-category").data("id")
		},
		dataType:"JSON",
		success:function(response){
			if(response[4]==1){
				$("input[name='category']").attr("disabled",true);
				$("#vote-category").attr("disabled",true);
			}
			var ispis="<h3>Poll results:</h3>";
			ispis+=`<div class="poll-chart" style="width:${response[0]}%">Accessories(${response[0]}%)</div>`;
			ispis+=`<div class="poll-chart" style="width:${response[1]}%">Cardio(${response[1]}%)</div>`;
			ispis+=`<div class="poll-chart" style="width:${response[2]}%">Stationary(${response[2]}%)</div>`;
			ispis+=`<div class="poll-chart" style="width:${response[3]}%">Weights(${response[3]}%)</div>`;
			$("#category-results").html(ispis);
		},
		error:function(error){
			console.log(error);
		}
	});

	$.ajax({
		url:"../../models/survey-handling.php",
		method:"POST",
		data:{
			action:"fillser",
			userId:$("#vote-services").data("id")
		},
		dataType:"JSON",
		success:function(response){
			if(response[4]==1){
				$("input[name='services']").attr("disabled",true);
				$("#vote-services").attr("disabled",true);
			}
			var ispis="<h3>Poll results:</h3>";
			ispis+=`<div class="poll-chart" style="width:${response[0]}%">Great(${response[0]}%)</div>`;
			ispis+=`<div class="poll-chart" style="width:${response[1]}%">Good(${response[1]}%)</div>`;
			ispis+=`<div class="poll-chart" style="width:${response[2]}%">Bad(${response[2]}%)</div>`;
			ispis+=`<div class="poll-chart" style="width:${response[3]}%">Terrible(${response[3]}%)</div>`;
			$("#services-results").html(ispis);
		},
		error:function(xhr){
			console.log(xhr);
		}
	});

	$.ajax({
		url:"../../models/survey-handling.php",
		method:"POST",
		data:{
			action:"filllab",
			userId:$("#vote-label").data("id")
		},
		dataType:"JSON",
		success:function(response){
				if(response[2]==1){
					$("input[name='label']").attr("disabled",true);
					$("#vote-label").attr("disabled",true);
				}	
				var ispis="<h3>Poll results:</h3>";
				ispis+=`<div class="poll-chart" style="width:${response[0]}%">Hammer(${response[0]}%)</div>`;
				ispis+=`<div class="poll-chart" style="width:${response[1]}%">Steelborn(${response[1]}%)</div>`;
				$("#label-results").html(ispis);
		},
		error:function(error){
			console.log(error);
		}
	});
}

function voteCategory(){
	var userId = $(this).data("id");
	var option = $("input[name='category']:checked").val();
	var pollId = $("#category-hid").val();
	if(option){
		$.ajax({
		url:"../../models/survey-handling.php",
		method:"POST",
		data:{
			action:"votecat",
			userId:userId,
			pollId:pollId,
			option:option
		},
		dataType:"JSON",
		success:function(response){
			$("input[name='category']").attr("disabled",true);
			$("#vote-category").attr("disabled",true);
			var ispis="<h3>Poll results:</h3>";
			ispis+=`<div class="poll-chart" style="width:${response[0]}%">Accessories(${response[0]}%)</div>`;
			ispis+=`<div class="poll-chart" style="width:${response[1]}%">Cardio(${response[1]}%)</div>`;
			ispis+=`<div class="poll-chart" style="width:${response[2]}%">Stationary(${response[2]}%)</div>`;
			ispis+=`<div class="poll-chart" style="width:${response[3]}%">Weights(${response[3]}%)</div>`;
			$("#category-results").html(ispis);
		},
		error:function(error){
			console.log(error);
		}
	});
	}
}

function voteServices(){
	var userId = $(this).data("id");
	var option = $("input[name='services']:checked").val();
	var pollId = $("#services-hid").val();
	if(option){
		$.ajax({
		url:"../../models/survey-handling.php",
		method:"POST",
		data:{
			action:"voteservices",
			userId:userId,
			pollId:pollId,
			option:option
		},
		dataType:"JSON",
		success:function(response,status,jqXHR){
			$("input[name='services']").attr("disabled",true);
			$("#vote-services").attr("disabled",true);
			var ispis="<h3>Poll results:</h3>";
			ispis+=`<div class="poll-chart" style="width:${response[0]}%">Great(${response[0]}%)</div>`;
			ispis+=`<div class="poll-chart" style="width:${response[1]}%">Good(${response[1]}%)</div>`;
			ispis+=`<div class="poll-chart" style="width:${response[2]}%">Bad(${response[2]}%)</div>`;
			ispis+=`<div class="poll-chart" style="width:${response[3]}%">Terrible(${response[3]}%)</div>`;
			$("#services-results").html(ispis);
		},
		error:function(xhr){
			console.log(xhr);
		}
	});
	}
}

function voteLabel() {
	var userId = $(this).data("id");
	var option = $("input[name='label']:checked").val();
	var pollId = $("#label-hid").val();
	if(option){
		$.ajax({
		url:"../../models/survey-handling.php",
		method:"POST",
		data:{
			action:"voteLabel",
			userId:userId,
			pollId:pollId,
			option:option
		},
		dataType:"JSON",
		success:function(response,status,jqXHR){
				$("input[name='label']").attr("disabled",true);
				$("#vote-label").attr("disabled",true);
				var ispis="<h3>Poll results:</h3>";
				ispis+=`<div class="poll-chart" style="width:${response[0]}%">Hammer(${response[0]}%)</div>`;
				ispis+=`<div class="poll-chart" style="width:${response[1]}%">Steelborn(${response[1]}%)</div>`;
				$("#label-results").html(ispis);
		},
		error:function(error){
			console.log(error);
		}
	});
	}
}
