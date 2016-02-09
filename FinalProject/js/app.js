var loginFlag = -1;

function init()
{
	//changePage('/homeDiv.html');
}

$(function()
{
	init();
	
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
		ajaxCall("div/searchDiv.html", 2); //flag true for calling doSearch(); inside ajaxCall function
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
	
	if (window.location.pathname === "/homeDiv.html" || window.location.pathname === "/logout.html" )
	{
		$('#menu').fadeIn(500);
	}
	else
	{
		$('#menu').fadeOut(100);
		
	}
}

function ok()
{
	$('#container').load(homeDiv.html);
	//$('#menu').fadeIn(500);
	alert("ok");
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
		$('#container').css('min-height', '0');
		
		if (flag==1)
		{
//
//			paypal.minicart.render();
//
//			paypal.minicart.cart.on('add', function (idx, product, isExisting) 
//			{
//				if (!product.get('cartProductColor')) 
//				{
//					this.remove(idx);
//					alert('Please select an option first!');
//				}
//			});
		}
		else if (flag == 2)
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
		else if (flag == 3)
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
		else if (flag == 4)
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
		else if (flag == 5)
		{
			/*
			$.getScript("plugins/thumbnail-slider/thumbnail-slider.js", function(){
			    //alert("Running test.js");
			});			
			$.getScript("plugins/thumbnail-slider/ninja-slider.js", function(){
			    //alert("Running test.js");
			});
			 */


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
		    
//			paypal.minicart.render();
//
//			paypal.minicart.cart.on('add', function (idx, product, isExisting) 
//			{
//				if (!product.get('cartProductColor')) 
//				{
//					this.remove(idx);
//					alert('Please select an option first!');
//				}
//			});
					    
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
		else if (flag == 6)
		{
//			$('#loginText p').html("<a href='/loginDiv.php' class='colorFontLink'>Log in</a><span style='color:white'> - </span><a href='/div/registerDiv.php' class='colorFontLink'>Sign up</a>");
//			$('#menu').addClass('visible');
//			$('#loginImage').attr("src", "img/lock.png");
			$('#loginFooter').text("login");
			ajaxCall('/logoutDiv.html', 1);
		}
			
		
		// scroll up to 0,0
		window.scrollTo(0, 0);
	});
	
}

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
