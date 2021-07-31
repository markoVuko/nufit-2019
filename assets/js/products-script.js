window.onload = function() {
	fillMenus();
	cartQuantity();
	scrollMenu();
	menuToggle();
	filterProducts();
	var labelName = "";
	var sortName = "";
	var searchName = "";
	$("#label a").click(function(e){
		e.preventDefault();
		labelName = $(this).html();
		if(labelName=="All")
		{
			var sortName = "";
			var searchName = "";
			$("#sidebar input:checkbox").prop("checked",false);
			$("#search").val("");
		}
		filterProducts(labelName,sortName,searchName);
	});
	$("#sortby a").click(function(e){
		e.preventDefault();
		sortName = $(this).html();
		filterProducts(labelName,sortName,searchName);
	});
	$("#sidebar input:checkbox").change(function(e){
		e.preventDefault();
		filterProducts(labelName,sortName,searchName);
	});
	$("#search-button").click(function(){
		searchName = $("#search").val();
		filterProducts(labelName,sortName,searchName);
	});
	$("#phone-side a").click(function(e){
		e.preventDefault();
		$("#sidebar").slideToggle("slow");
	});
	$("#pages a").click(function(e){
		e.preventDefault();
		filterProducts(labelName,sortName,searchName);
	});

	$(window).resize(viewport);

	$(document).on("click",".add-to-cart",addToCart);

	$("#rate-range").change(function(){
		var slideVal = $(this).val();
		$("#rating").html("Rating: "+slideVal);	
		filterProducts(labelName,sortName,searchName);
	});
	
}

function viewport() {
	if($(window).innerWidth()>550)
	{
		$("#sidebar").show();
	}
}

function filterProducts(labelName,sortName,searchName)
 {
        var action = true;
        var label = labelName;
        var sort = sortName;
        var search = searchName;
        var category = getChecks("category");
        var price = getChecks("bracket");
        var page = $("#inpage").val();
        var rating = $("#rate-range").val();
        $.ajax({
            url:"../../models/fetch-products.php",
            method:"POST",
            dataType:"JSON",
            data:{
            	action:action,
            	label:label,
            	category:category,
            	price:price,
            	sort:sort,
            	search:search,
            	rating:rating,
            	page:page
            },
            success:function(products){
                if(products[0]!=null)
                {
                	$("#products").html(products[0]);
                	pagination(products[1]);
                }
                else {
                	$("#products").html("<p>No products</p>");
                }
            }
        });

    function getChecks(n)
    {
        var chB = [];
        $('#'+n+' input:checked').each(function(){
            chB.push($(this).val());
        });
        return chB;
    }

    function pagination(data){
        var brstr = data;
        var pages = document.getElementById('pages');
        let html = ""
        for(var i = 1; i<=brstr; i++){
            html += `<a href="#" data-page="${i}">${i}</a>`;
        }
        pages.innerHTML = html;
        $('#pages a').click(function(e){
            e.preventDefault();
    
            var action = true;
	        var label = labelName;
	        var sort = sortName;
	        var search = searchName;
	        var category = getChecks("category");
	        var price = getChecks("bracket");
	        var page = $(this).data('page');
    
            $.ajax({
                url:"../../models/fetch-products.php",
                method:"POST",
                dataType:"JSON",
                data:{
                    action:action,
	            	label:label,
	            	category:category,
	            	price:price,
	            	sort:sort,
	            	search:search,
	            	page:page
                },
                success:function(data){
                    $("#products").html(data[0]);
                }
            });
        });
    }
 }


function addToCart(){

	let id = $(this).data("id");
	products = productsInCart();
	if(products){
		if(productIsAlreadyInCart())
		{
			updateQuantity();
			alert("Product quantity updated!");
			cartQuantity();
		}
		else {
			addProductToCart();
			alert("Product added to cart!");
			cartQuantity();
		}
	}
	else {
		addFirstProductToCart();
			alert("Product added to cart!");
			cartQuantity();
	}

	function addFirstProductToCart() {
		var products = [];
		products[0] = {
			id: id,
			quantity: 1
		};
		localStorage.setItem("Products",JSON.stringify(products));
	}

	function productsInCart(){
		return products = JSON.parse(localStorage.getItem("Products"));
	}

	function addProductToCart(){
		var products = productsInCart();
		products.push({
			id: id,
			quantity: 1
		});
		localStorage.setItem("Products",JSON.stringify(products));
	}

	function updateQuantity(){
		var products = productsInCart();
		for(var p in products)
		{
			if(products[p].id==id)
			{
				products[p].quantity++;
				break;
			}
		}
		localStorage.setItem("Products",JSON.stringify(products));
	}

	function productIsAlreadyInCart(){
		return products.filter(p => p.id == id).length;
	}
}