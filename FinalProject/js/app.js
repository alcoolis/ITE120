var loginFlag = -1;

function init()
{
	//create hidden red circle image inside shopping cart (created via JQuery to avoid to see the div when tha page first loaded)
	$('#cartImageItemsDiv').html("<div id='cartImageItemsNumberDiv'>0</div>" +
			"<!-- END of cartImageItemsNumberDiv -->" +
			"<div id='cartImageItemsImageDiv'>" +
				"<img id='itemsImage' src='img/cart_item.png' />" +
			"</div><!-- END of cartImageItemsImageDiv -->").hide();
	
	//initialize minicart
	paypal.minicart.render();
	
	//load items and price if session is open
	var total=parseInt(paypal.minicart.cart.total());
	var totalItems=0;
	
	var cartItems=paypal.minicart.cart.items();
	var cartItemsLength=cartItems.length;
	
	for (var i = 0; i < cartItemsLength; i++)
	{
		totalItems+=parseInt(cartItems[i].get('quantity'));
	}
	
	$('#cartPrice').text(total);
	
	if (totalItems > 0)
	{
		$('#cartImageItemsNumberDiv').text(totalItems);
		$('#cartImageItemsDiv').show();
	}
}

$(function()
{
	init();
	
	//change url in the adress bar when you click on .divLinks a link 
	//then binded function History.Adapter.bind call doClick function
	$(document).on(
	{
		click : function(e)
		{
			e.preventDefault();// prevents default click action of <a ...>
			
			var urlPath = $(this).attr('href');
			var title = $(this).text();
			

			changePage(urlPath);
		}
	}, '.divLinks a');
	

	
	//load searchDiv.html when search_button is clicked
	$('#search_button').click(function()
	{
		ajaxCall("div/searchDiv.html", 2); //flag 2 for calling doSearch(); inside ajaxCall function
		$('#menu').removeClass('visible');
	});
	
	// make .clickable div's elements clickable
	$('.clickable').click(function()
	{
		window.location = $(this).find("a").attr("href");
		return false;
	});
	
});

function doClick(urlFromHref)
{
	//z = b ? x : y // if (b) { z = x; } else { z = y; }
	//request = (typeof request == 'undefined') ? "" : request;
	//console.log('in updateContent, url =', div.url);
	
	//set flags 2based on state url //flags change the done function inside ajaxCall function
	switch(urlFromHref.url.substring(17,21))
	{
		case "home":
			var flag=1;
			break;
		case "cart":
			break;
		case "logi":
			var flag=3;
			break;
		case "regi":
			urlFromHref.url="http://localhost/loginDiv.php";
			var flag=4;
			break;
		case "prod":
			var flag=5;
			break;
		case "logo":
			urlFromHref.url="http://localhost/loginDiv.php";
			var flag=6;
			break;
	}
			
	ajaxCall(urlFromHref.url, flag);
	
	//hide-show sticky menu based on divs called
	if (window.location.pathname === "/homeDiv.html" || window.location.pathname === "/logout.html" )
	{
		$('#menu').fadeIn(500);
	}
	else
	{
		$('#menu').fadeOut(100);
		
	}
}

//calling for loading div's inside the container div of index.html
function ajaxCall(urlAjax, flag)
{
	
	$('#container').css('min-height', '1200px');
	
	$.ajax(
	{
		url : urlAjax,
		type : "post",
		dataType : "html",
		success : function(data)
		{
			$('#container').html(data);
			paypal.minicart.render();
		}
	}).done(function()
	{
		//change login and register anchors inside footer (index.php)
		if($('#unSession').text()=="Log in")
		{
			$('#loginFooter').text("login").attr("href", "/loginDiv.php");
		}
		else
		{
			$('#loginFooter').text("logout").attr("href", "/logoutDiv.html");
			$('#downNav2 li:nth-child(3)').html("<p class='colorFont'>Register</p>");
		}
		
		
		$('#container').css('min-height', '0');
		
		
		if (flag==1)//first flag //depricated
		{

			
				
		}
		else if (flag == 2)// for search div //not finished
		{
			// it runs after searchDiv is loaded
			var ss = $("#search_term").val();
			$("#search_term").val('');
			// Create a search control
			var searchControl = new google.search.SearchControl();
			
			searchControl.addSearcher(new google.search.WebSearch());
			
			searchControl.setResultSetSize(google.search.Search.LARGE_RESULTSET);
			
			searchControl.draw(document.getElementById("searchcontrol"));
			
			// execute an inital search
			searchControl.execute(ss);
			
			$("#search_form").fadeOut(200);
			$('#searchcontrol form').hide();
			$('#searchcontrol table').hide();
			$('.gsc-control').css("width", "80%");
			$('.gsc-control').css("margin", "0 auto");
		}
		else if (flag == 3)// toggle between login and register calls //4=login
		{
			$('.logTooltip').text('Click To Register');
			// hide-show the button resetPass
			$('.resetPass').show('slow');
			$('.logForm-module .logForm').css('display', 'none');
			$('.logForm-module .logForm:nth-child(2)').css('display', 'block');
			
			if (loginFlag == 1 || loginFlag < 0)
			{
				$('.logForm-module .logForm').css('display', 'block');
				$('.logForm-module .logForm:nth-child(2)').css('display', 'none');
				
				toggleloginRegister(this);
				
				loginFlag = 2;
			}
			
		}
		else if (flag == 4)// toggle between login and register calls //4=register
		{
			$('.logTooltip').text('Click To Login');
			// hide-show the button resetPass
			$('.resetPass').hide();
			$('.logForm-module .logForm').css('display', 'block');
			$('.logForm-module .logForm:nth-child(2)').css('display', 'none');
			
			if (loginFlag == 2 || loginFlag < 0)
			{
				$('.logForm-module .logForm').css('display', 'none');
				$('.logForm-module .logForm:nth-child(2)').css('display', 'block');
				
				toggleloginRegister(this);
				
				loginFlag = 1;
			}
		}
		else if (flag == 5)//loaded for product div
		{
			//bind paypall button to minicart
			var myForm = $("#productFormId")[0];
			paypal.minicart.view.bind(myForm);
			
			//called after cart checkout
			paypal.minicart.cart.on('checkout', function()
			{
				paypal.minicart.cart.destroy();
				$('#cartImageItemsNumberDiv').text("0");
				$('#cartImageItemsDiv').hide();
			});
			
			//called every time a product is removed from cart
			paypal.minicart.cart.on('remove', function (idx, product) 
			{
				var price = parseInt($('#cartPrice').text());
				var items = parseInt($('#cartImageItemsNumberDiv').text());
				
				var productQuantity = parseInt(product.get('quantity'));
				var productPrice = parseInt(product.get('amount'));
				
				
				$('#cartPrice').text(price-(productPrice*productQuantity));
				
				$('#cartImageItemsNumberDiv').text(items-productQuantity);
				
				if((items-productQuantity)==0)
					$('#cartImageItemsDiv').hide();
			});

			// product photo gallery // Vertical-jQuery-Product-Photo-Gallery-PhotoGallery plugin
			$(".preview a").on("click", function()
			{
				$(".selected").removeClass("selected");
				$(this).addClass("selected");
				var picture = $(this).data();
				
				event.preventDefault(); // prevents page from reloading every time you click a thumbnail
				
				$(".full img").fadeOut(100, function()
				{
					$(".full img").attr("src", picture.full);
					$(".full").attr("href", picture.full);
					$(".full").attr("title", picture.title);
				}).fadeIn();
			});// end on click
			$(".full").fancybox(
			{
			        helpers : {title: {type: 'inside'}},
			        closeBtn : true,
		    });
					    
			//product specifications tables toggle function
		    jQuery('.menuBarProductDiv .tab-links a').on('click', function(e)
			{
				var currentAttrValue = jQuery(this).attr('href');
				
				// Show/Hide Tabs
				jQuery('.specifictionsTables ' + currentAttrValue).slideDown(800).siblings().slideUp(800);
				
				// jQuery('.specifictionsTables ' + currentAttrValue).fadeIn(800).siblings().hide();
				
				// jQuery('.specifictionsTables ' + currentAttrValue).show().siblings().hide();
				
				// jQuery('.specifictionsTables ' + currentAttrValue).siblings().slideUp(400);
				// jQuery('.specifictionsTables ' + currentAttrValue).delay(400).slideDown(400);
				
				// Change/remove current tab to active
				jQuery(this).parent('li').addClass('productActive').siblings().removeClass('productActive');
				
				switch (currentAttrValue)
				{
					case "#engine":
						$('.menuBarProductDiv hr').css('margin-left', '5%');
						break;
					case "#chassis":
						$('.menuBarProductDiv hr').css('margin-left', '30%');
						break;
					case "#dimensions":
						$('.menuBarProductDiv hr').css('margin-left', '55%');
						break;
					case "#capacities":
						$('.menuBarProductDiv hr').css('margin-left', '80%');
						break;
				}
				e.preventDefault();
			});
		}
		else if (flag == 6)//for logout div
		{
			ajaxCall('/logoutDiv.html', 1);
		}
			
		
		// scroll up to 0,0
		window.scrollTo(0, 0);
	});
	
}

//called from flags 3-4 top toggle between login and register
function toggleloginRegister(element)
{
	
	// switch the icon
	$(element).children('i').toggleClass('fa-pencil');
	
	// switch the formes
	$('.logForm').animate(
	{
		height : "toggle",
		'padding-top' : 'toggle',
		'padding-bottom' : 'toggle',
		opacity : "toggle"
	}, "slow");
}

//called to change url in  address bar
function changePage(PageURI)
{
//	if (PageURI === null)
//	{
//		PageURI = '';
//	}
	
	var State = History.getState();
	
//	if (State.data.PageURL === PageURI)
//	{
//		History.replaceState(
//		{
//			PageURL : PageURI,
//			PageID : '1'
//		}, PageURI,  PageURI);
//	}
//	else
	{
		History.pushState(
		{
			PageURL : PageURI, 
			rand : Math.random()
		}, PageURI, PageURI);
	}
}

//called from cart button
function cartOnClick()
{
	var price = parseInt($('#cartPrice').text());
	var items = parseInt($('#cartImageItemsNumberDiv').text());
	var myForm = $("#productFormId")[0];
	
	var productColor = $('#productColorSelect').find(":selected").text();
	
	if (productColor === "")
	{
		sweetAlert("Oops...", "Please put a color!!!", "error");
	}
	else
	{
		var business,item_name,item_number,os0,amount,currency_code,color,shipping,shipping2,handling;
		
		business = myForm.business.value;
		item_name = myForm.item_name.value;
		item_number = myForm.item_number.value;
		os0 = myForm.os0.value;
		amount = myForm.amount.value;
		currency_code = myForm.currency_code.value;
        shipping = myForm.shipping.value;
        shipping2 = myForm.shipping2.value;
        handling = myForm.handling.value;
			
		paypal.minicart.cart.add(
		{
			"business" : business,
			"item_name" : item_name,
			"item_number" : item_number,
			"on0" : "Color",
			"os0" : productColor,
			"amount" : amount,
			"currency_code" : currency_code,        
			"shipping" : shipping,
        	"shipping2" : shipping2,
        	"handling" : handling
		});
		
		$('#cartImageItemsDiv').show();
		$('#cartPrice').text(price+parseInt(amount));
		items++;
		$('#cartImageItemsNumberDiv').text(items);
	}
}
