window.onload=function(){
	fillMenus();
	cartQuantity();
	scrollMenu();
	menuToggle();
	var raz = $("#menu").offset().top;
	$(window).scroll(function() {
	    if ( $(this).scrollTop() > raz ) {
	        $("#menu").addClass("fix");
	    } else {
	        $("#menu").removeClass("fix");
	    }
	});
	let products = productsInCart();
	if(products==null)
	{
		$("#cart-table").html("<span id='noprod'>No products in cart</span>");
	}
	else {
		fillTableWithProducts();
	}
	$(document).on("click",".up",increaseQuantity);
	$(document).on("click",".down",decreaseQuantity);
	$(document).on("click",".remove",removeFromCart);
}

function productsInCart(){
		return products = JSON.parse(localStorage.getItem("Products"));
	}

function fillTableWithProducts(){
	$.ajax({
		url:"../../models/fetch-products.php",
		method:"POST",
		dataType:"JSON",
		data: {
			cart:true
		},
		success:function(products){
			let display = productsInCart();
			var newProducts = [];
			var tempProducts = [];
			if(display!=null){
				display.forEach(function(d){
				tempProducts = products.filter(function(p){
					if(p.Id==d.id)
					{
						p.Quantity=d.quantity;
						return true;
					}
					return false;
				});
				tempProducts.forEach(function(t){
					newProducts.push(t);
				});
				});
				var ispis="";
				var br=1;
				var price = 0;
				newProducts.forEach(function(p){
					ispis+=`<tr>
								<td>${br++}</td>
								<td><span class="caprname">${p.Name}</span></td>
								<td><span class="quantity">${p.Quantity}</span><button class="up">&uarr;</button><button class="down">&darr;</button></td>
								<td><span class="cashout-price">$${p.Quantity * p.PriceNew}</span><input type="hidden" value="${p.PriceNew}"></td>
								<td><button class="remove" data-id="${p.Id}">Remove</button></td>
							</tr>`;
					price+=p.Quantity * p.PriceNew;
				});
				
				$("#cart-table").html(ispis);
				$("#final-price").html(`$${price}`);
				$("#final-price-hidden").val(price);
			}
			else {
				$("#cart-table").html("<span id='noprod'>No products in cart</span>");
				$("#final-price").html(`$0`);
				$("#final-price-hidden").val(0);
			}
		},
		error:function(error){
			console.log(error);
		}
	});
}

function increaseQuantity(){
	var quantity = parseInt($(this).prev().html());
	quantity++;
	var price = parseInt($(this).parent().next().children().eq(1).val());
	var cashoutPrice = price*quantity;
	$(this).parent().next().children().eq(0).html(`$${cashoutPrice}`);
	$(this).prev().html(quantity);
	var totalPrice = parseInt($("#final-price-hidden").val());
	totalPrice+=price;
	$("#final-price").html(`$${totalPrice}`);
	$("#final-price-hidden").val(totalPrice);
	let products = productsInCart();
		var rId = parseInt($(this).parent().next().next().children().eq(0).data("id"));
		console.log(rId);
		for(var f in products)
		{
			if(products[f].id==rId)
			{
				products[f].quantity=quantity;
				break;
			}
		}
		localStorage.setItem("Products",JSON.stringify(products));
}

function decreaseQuantity(){
	var quantity = parseInt($(this).prev().prev().html());
	if(quantity>1)
	{
		quantity--;
		var price = parseInt($(this).parent().next().children().eq(1).val());
		var cashoutPrice = price*quantity;
		$(this).parent().next().children().eq(0).html(`$${cashoutPrice}`);
		$(this).prev().prev().html(quantity);
		var totalPrice = parseInt($("#final-price-hidden").val());
		totalPrice-=price;
		$("#final-price").html(`$${totalPrice}`);
		$("#final-price-hidden").val(totalPrice);
		let products = productsInCart();
		var rId = parseInt($(this).parent().next().next().children().eq(0).data("id"));
		for(var f in products)
		{
			if(products[f].id==rId)
			{
				products[f].quantity=quantity;
				break;
			}
		}
		localStorage.setItem("Products",JSON.stringify(products));
	}	
}

function removeFromCart() {
	var rId = $(this).data("id");
	let forRemoving = productsInCart();
	if(forRemoving.length>1)
	{
		var i = 0;
		for(var f in forRemoving)
		{
			if(forRemoving[f].id==rId)
			{
				forRemoving.splice(i,1);
				break;
			}
			i++;
		}
		localStorage.setItem("Products",JSON.stringify(forRemoving));
	}
	else {
		localStorage.removeItem("Products");
	}
	
	fillTableWithProducts();
	cartQuantity();
}