window.onload = function(){
	fillMenus();
	cartQuantity();
	scrollMenu();
	menuToggle();	
	fillProducts();
	fillUsers();
	fillCustomers();
	fillStaff();

	$(".admin-ctrl:not(:first)").hide();   
	$("#admin-tabs ul li a").click(function(e)
	{
		e.preventDefault();
		if($(this).hasClass("notsel"))
		 { 
		 	$("#admin-tabs ul li a").addClass("notsel");           
		   	$(this).removeClass("notsel");
		   	$(".admin-ctrl").slideUp("fast");
		   	$("#"+ $(this).attr("href")).slideDown("slow");
	 	 }
	 });

	$(".feed-content").hide();
	$(".feed-block a").click(function(e)
	{
		e.preventDefault();
		if($(this).hasClass("notsel"))
		 { 
		 	$(".feed-block a").addClass("notsel");    
		 	$(".feed-block a").html("Open");       
		   	$(this).removeClass("notsel");
		   	$(this).html("Close");
		   	$(".feed-content").slideUp("fast");
		   	$("#"+ $(this).attr("href")).slideDown("slow");
	 	 } else {

		   	$("#"+ $(this).attr("href")).slideUp("slow");           
		   	$(this).addClass("notsel");
		   	$(this).html("Open");
	 	 }
	 });

	$(document).on("click","#edit-products .save",function(){
		var id = $(this).data("id");
		fillProdEditor(id);
		$('#saveProd').attr('data-id' , id); 
	});

	$(document).on("click","#edit-users .save",function(){
		var id = $(this).data("id");
		fillUserEditor(id);
		$('#saveUser').attr('data-id' , id); 
	});

	$(document).on("click","#edit-staff .save",function(){
		var id = $(this).data("id");
		fillStaffEditor(id);
		$('#saveSta').attr('data-id' , id); 
	});

	$(document).on("click","#edit-customers .save",function(){
		var id = $(this).data("id");
		fillCusEditor(id);
		$('#saveCus').attr('data-id' , id); 
	});

	$(document).on("click","#edit-products .del",delProducts);
	$(document).on("click","#edit-staff .del",delStaff);
	$(document).on("click","#edit-customers .del",delCustomer);
	$(document).on("click","#edit-users .del",delUser);

	/*$("#insprodform").on("submit",function(e){
		e.preventDefault();
		insertProduct();
	});*/
	$("#insusform").on("submit",function(e){
		e.preventDefault();
		insertUser();
	});

}

function fillCusEditor(id){
	$.ajax({
		url:"../../models/fetch.php",
		method:"POST",
		dataType:"JSON",
		data:{
			action:"customers",
			id:id
		},
		success:function(c){
			$("#editcusform h3").html("Edit Customer "+c[0].IdCustomers);
			$("#ecuid").val(c[0].IdCustomers)
		},
		error:function(e){
			console.log(e);
		}
	});
}

function fillProdEditor(id){
	$.ajax({
		url:"../../models/fetch.php",
		method:"POST",
		dataType:"JSON",
		data:{
			action:"products",
			id:id
		},
		success:function(p){
			$("#epname").val(p[0].Name);
			$("#eplabel").val(p[0].Label);
			$("#epdesc").val(p[0].Description);
			$("#epcat").val(p[0].Category);
			$("#eprate").val(p[0].Rating);
			$("#eppnew").val(p[0].PriceNew);
			$("#eppold").val(p[0].PriceOld);
			$("#epid").val(p[0].Id);
			console.log(p);
		},
		error:function(e){
			console.log(e);
		}
	});
}

function fillUserEditor(id) {
	$.ajax({
		url:"../../models/fetch.php",
		method:"POST",
		dataType:"JSON",
		data:{
			action:"users",
			id:id
		},
		success:function(u){
			$("#euname").val(u[0].Username);
			$("#euemail").val(u[0].Email);
			$("#editusform input[name=eurole]").val([u[0].IdRole]);
			$("#euid").val(u[0].Id);

		},
		error:function(e){
			console.log(e);
		}
	});
}

function fillStaffEditor(id){
	$.ajax({
		url:"../../models/fetch.php",
		method:"POST",
		dataType:"JSON",
		data:{
			action:"staff",
			id:id
		},
		success:function(s){
			$("#estaname").val(s[0].Text);
			$("#ecid").val(s[0].IdStaff);
		},
		error:function(e){
			console.log(e);
		}
	});
}

function delProducts() {
	var id = $(this).data("id");
	if(confirm("Are you sure you want to delete this product?")){
		$.ajax({
		url:"../../models/fetch.php",
		method:"POST",
		data:{
			action:"delprod",
			id:id
		},
		success:function(response,status,jqXHR){
			if(jqXHR.status==200){
				fillProducts();
				alert(response);
			}
		},
		error:function(error){
			console.log(error);
		}
		});
	}
}

function delStaff() {
	var id = $(this).data("id");
	if(confirm("Are you sure you want to delete this staff member?")){
		$.ajax({
		url:"../../models/fetch.php",
		method:"POST",
		data:{
			action:"delstaff",
			id:id
		},
		success:function(response,status,jqXHR){
			if(jqXHR.status==200){
				fillStaff();
				alert(response);
			}
		},
		error:function(error){
			console.log(error);
		}
		});
	}
}

function delCustomer() {
	var id = $(this).data("id");
	if(confirm("Are you sure you want to delete this customer?")){
		$.ajax({
		url:"../../models/fetch.php",
		method:"POST",
		data:{
			action:"delcus",
			id:id
		},
		success:function(response,status,jqXHR){
			if(jqXHR.status==200){
				fillCustomers();
				alert(response);
			}
		},
		error:function(error){
			console.log(error);
		}
		});
	}
}

function delUser() {
	var id = $(this).data("id");
	if(confirm("Are you sure you want to delete this user?")){
		$.ajax({
		url:"../../models/fetch.php",
		method:"POST",
		data:{
			action:"deluser",
			id:id
		},
		success:function(response,status,jqXHR){
			if(jqXHR.status==200){
				fillUsers();
				alert(response);
			}
		},
		error:function(error){
			console.log(error);
		}
		});
	}
}

function insertUser() {
	var greske = 0;
	var username = $("#iuname").val();
	var usernameRX=/^\w{4,12}$/;
	if(!usernameRX.test(username)){
		greske++;
		$("#iuname").addClass("bad");
	} else {
		$("#iuname").removeClass("bad");	
	}


	var emailRX = /^(\w+(\.\w{2,})?){3,50}@(\w{2,10}(\.{1,1}[a-z]{2,3}){1,3})$/;
	var email = $("#iuemail").val();
	if(!emailRX.test(email)){
		greske++;
		$("#iuemail").addClass("bad");
	} else {
		$("#iuemail").removeClass("bad");
	}

	var pwRX = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])[A-Za-z0-9]{8,30}$/;
	var pass = $("#iupass").val();

	if(!pwRX.test(pass)){
		greske++;
		$("#iupass").addClass("bad");
	} else {
		$("#iupass").removeClass("bad");
	}

	var role = $("input[name='role']:checked").val();
	if(role==null){
		greske++;
		$(".ulabel").addClass("bad");
	} else {
		$(".ulabel").removeClass("bad");
	}
	if(greske==0){
		if(confirm("Are you sure you want to insert this user?")){
			$.ajax({
			url:"../../models/fetch.php",
			method:"POST",
			data:{
				action:"insertuser",
				username:username,
				email:email,
				pass:pass,
				role:role
			},
			success:function(response,status,jqXHR){
				if(jqXHR.status==200){
					if(response){
						alert(response);
						fillUsers();
					} else {
						alert("Invalid data");
					}
				}
			},
			error:function(error){
				console.log(error);
			}
		});
		}
	}
}


function fillProducts() {
	$.ajax({
		url:"../../models/fetch.php",
		method:"POST",
		dataType:"JSON",
		data:{
			action:"products"
		},
		success:function(products){
			var ispis="";
			products.forEach(function(p){

				ispis +=`<tr>
							<td><span class="aid">${p.Id}</span></td>
							<td><span class="aid">${p.Name}</span></td>
							<td><button data-id="${p.Id}" class="del">Delete</button></td>
							<td><button data-id="${p.Id}" class="save">Edit</button></td>
						</tr>`;
				
			});
			$("#edit-products table").html(ispis);
		}
	});
}

function fillUsers(){
		$.ajax({
		url:"../../models/fetch.php",
		method:"POST",
		dataType:"JSON",
		data:{
			action:"users"
		},
		success:function(users){
			var ispis="";
			users.forEach(function(p){
				ispis +=`<tr>
							<td><span class="aid">${p.Id}</span></td>
							<td><span class="aid">${p.Username}</span></td>
							<td><button data-id="${p.Id}" class="del">Delete</button></td>
							<td><button data-id="${p.Id}" class="save">Edit</button></td>
						</tr>`;
				
			});
			$("#edit-users table").html(ispis);
		}
	});
}
function fillStaff(){
		$.ajax({
		url:"../../models/fetch.php",
		method:"POST",
		dataType:"JSON",
		data:{
			action:"staff"
		},
		success:function(staff){
			var ispis="";
			staff.forEach(function(p){
				ispis +=`<tr>
							<td><span class="aid">${p.IdStaff}</span></td>
							<td><span class="aid">${p.Text}</span></td>
							<td><button data-id="${p.IdStaff}" class="del">Delete</button></td>
							<td><button data-id="${p.IdStaff}" class="save">Edit</button></td>
						</tr>`;
				
			});
			$("#edit-staff table").html(ispis);
		}
	});
}

function fillCustomers(){
		$.ajax({
		url:"../../models/fetch.php",
		method:"POST",
		dataType:"JSON",
		data:{
			action:"customers"
		},
		success:function(customers){
			var ispis="";
			customers.forEach(function(p){
				ispis +=`<tr>
							<td><span class="aid">${p.IdCustomers}</span></td>
							<td><span class="aid">${p.Alt}</span></td>
							<td><button data-id="${p.IdCustomers}" class="del">Delete</button></td>
							<td><button data-id="${p.IdCustomers}" class="save">Edit</button></td>
						</tr>`;
				
			});
			$("#edit-customers table").html(ispis);
		}
	});
}