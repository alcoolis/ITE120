<?php 
    session_start();

    $productPrice = 19000;
    $clientMail = "your_mail@domain.com";
    
?>
    
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Final Project</title>

<link rel="stylesheet" href="css/reset.css" type="text/css" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/home.css" type="text/css" />
<link rel="stylesheet" href="css/login.css" type="text/css" />
<link rel="stylesheet" href="css/logout.css" type="text/css" />
<link rel="stylesheet" href="css/cart.css" type="text/css" />
<link rel="stylesheet" href="css/aboutus.css" type="text/css" />
<link rel="stylesheet" href="css/contactus.css" type="text/css" />
<link rel="stylesheet" href="css/sitemap.css" type="text/css" />
<link rel="stylesheet" href="css/product.css" type="text/css" />
<link rel="stylesheet" href="css/search.css" type="text/css" />

<link rel="stylesheet" type="text/css" href="plugins/scroll-effects/animate.css"/>
<link rel="stylesheet" type="text/css" href="plugins/slick-master/slick.css"/>
<link rel="stylesheet" type="text/css" href="plugins/slick-master/slick-theme.css"/>
<link rel="stylesheet" type="text/css" href="plugins/parallax-effect/style.css">
<link rel="stylesheet" type="text/css" href="plugins/fancybox/jquery.fancybox.css">

<link href='https://fonts.googleapis.com/css?family=Seaweed+Script' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Jura" rel="stylesheet" type="text/css">

<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>


</head>
<body>

	<div id="navBar">

		<div id="logo">
			<a href="javascript:changePage('/homeDiv.html');"><img src="img/logo.png" alt="logo" /></a>
		</div>
		<!-- END of logo -->

		<div id="upperNav" class="divLinks colorFont">

			<ul>
				<li><a class="colorFontLink" id="homeDiv" href="/homeDiv.html">Home</a></li>
				<li>|</li>
				<li><a class="colorFontLink" id="contactusDiv" href="/contactusDiv.html">Contact Us</a></li>
				<li>|</li>
				<li><a class="colorFontLink" id="aboutusDiv" href="/aboutusDiv.html">About Us</a></li>
				<li>|</li>
				<li><a class="colorFontLink" id="sitemapDiv"  href="/sitemapDiv.html">Sitemap</a></li>
				<li>|</li>
				<li><a class="colorFontLink" id="search_link" href="#">Search</a></li>
			</ul>
			
			<form id="search_form" action="" method="get">
<!-- contenu of this form will be created inside init_ui function inside app_ui.js -->
			</form>

		</div>
		<!-- END upperNav-->

		<div id="contactNav" class="italictext">
			<a class="colorFontLinkNotUnderlined" href="#"><img src="img/phone.png" alt="phone" /> 2310-461512</a>
		</div>
		<!-- END contactNav-->


		<div id="cartDiv" class="clickable colorFontLinkNotUnderlined hoverClass">
			<a href="javascript:ajaxCall('/cartDiv.php', 1);"></a>

			<div id="cartImageDiv">
				<img id="cartImage" src="img/cart.png" />
				<div id="cartImageItemsDiv">
<!-- contenu of this div will be created inside init_ui function inside app_ui.js -->
				</div>
				<!-- END of cartImageItemsDiv -->
			</div>
			<!-- END of cartImageDiv -->

			<div id="cartText" class="colorFontLink">
				<p>PRICE: $0</p>
			</div>
			<!-- END of cartText -->
			
		</div>
		<!-- END of cartDiv -->



		<div id="logIn" class="hoverClass">
			<div id="loginImageDiv">
				<img id="loginImage" src=
				
				
		<?php
            if(isset($_SESSION['username']) && !empty($_SESSION['username']))
                echo "img/user.png";
            else
                echo "img/lock.png";
        ?>
				
				
				
				/>
			</div>
			<!-- END of loginImageDiv -->

			<div id="loginText" class="divLinks">
				<p>
				
				
		<?php
            if(isset($_SESSION['username']) && !empty($_SESSION['username'])) 
            {
                $username=$_SESSION["username"]; 
                
                echo <<<EOF
                    <a id="unSession" href="#" class="colorFontLink">$username</a><span style="color:white">-</span><a href="/logoutDiv.html" class="colorFontLink">Logout</a>
                
EOF;
            }
            else
            {
                echo <<<EOF
                    <a id="unSession"  href="/loginDiv.php" class="colorFontLink">Log in</a><span style="color:white"> - </span><a href="/registerDiv.php" class="colorFontLink">Sign up</a>
                
                
EOF;
            }

        ?>
        
        
        		</p>
			</div>
			<!-- END of loginText -->
		</div>
		<!-- END of login-->

		<div id="menu" class="stickyMenu">
			
			<div id="centerPartOfMenu">
				<div id="fleche">
					<a class="colorFontLinkNotUnderlined" href="#navBar">&#x26FA;</a>
				</div>
				<!-- END of fleche -->
				
				<ul>
					<li class="liMenu active"><a class="colorFontLinkNotUnderlined" id="favorites" href="#contentFavorites">FAVORITES</a></li>
					<li class="liMenu"><a class="colorFontLinkNotUnderlined" id="cont1" href="#content1">SUPERSPORT</a></li>
					<li class="liMenu"><a class="colorFontLinkNotUnderlined" id="cont2" href="#content2">NAKED</a></li>
					<li class="liMenu"><a class="colorFontLinkNotUnderlined" id="cont3" href="#content3">ON-OFF</a></li>
					<li class="liMenu"><a class="colorFontLinkNotUnderlined" id="cont4" href="#content4">OFF-ROAD</a></li>
				</ul>
			</div>
			<!-- END of centerPartOfMenu -->
		</div>
		<!-- END of menu -->
	</div>
	<!-- END of navBar -->
	
	<div id="container">
	
	
	
	
	
	
	
	
	
	
	
			<!-- ***CONTENU TO BE ADDED HERE WITH AJAX CALLS*** -->
			
			
			
			
			
			
			
			

	</div>
	<!-- END of container -->
	
		
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
        		<fieldset>
        			<input type="hidden" name="cmd" value="_cart" />
        			<input type="hidden" name="add" value="1" />
        			<input type="hidden" name="business" value="V96EYD2M4YEV4" />
        			<input type="hidden" name="item_name" value="malakia" />
        			<p class="productFormLabels">
                		<label>
            				Price $120
                			<input type="hidden" name="amount" value="120" />
                			<input type="hidden" name="currency_code" value="USD" />
            			</label>
        			</p>
        			<input type="hidden" name="return" value="http://localhost/minicartjs.com/?success" />
        			<input type="hidden" name="cancel_return" value="http://localhost/minicartjs.com/?cancel" />
        			<p class="productFormLabels">
        				<label>
        					Choose Color:
        					<input type="hidden" name="on0" value="Color" />
        					<select name="cartProductColor">
        						<option value="Bi">Bi</option>
        						<option value="Black">Black</option>
        						<option value="Red">Red</option>
        						<option value="Yellow">Yellow</option>
        						<option value="Green">Green</option>
        						<option value="Blue">Blue</option>
        					</select>
        				</label>
        			</p>
        			<input class="productFormSubmit" type="submit" value="Add to cart" />
        		</fieldset>
        	</form>
    	

	<div id="footer">

		<div id="downNav1" class="downNav divLinks colorFont italictext">

			<ul>
				<li>INFORMATION</li>
				<li><a class="colorFontLink" id="homeDiv" href="#homeDiv">Home</a></li>
				<li><a class="colorFontLink" id="contactusDiv" href="/contactusDiv.html">Contact Us</a></li>
				<li><a class="colorFontLink" id="aboutusDiv" href="/aboutusDiv.html">About Us</a></li>
				<li><a class="colorFontLink" id="sitemapDiv" href="/sitemapDiv.html">Sitemap</a></li>
			</ul>
		</div>
		<!-- END of downNav1 -->


		<div id="downNav2" class="downNav colorFont italictext divLinks">

			<ul>
				<li>MY ACCOUNT</li>
				<li><a id="loginFooter" class="colorFontLink" href="/loginDiv.php">Login</a></li>
				<li><a id="registerFooter"  class="colorFontLink" href="/registerDiv.php">Register</a></li>
				<li><a class="colorFontLink" href="#">Cart</a></li>
			</ul>
		</div>
		<!-- END of downNav2 -->


		<div id="downNav3" class="downNav colorFont" class="italictext">

			<iframe id="googleMapsFrame" frameborder="0"
				src="https://www.google.com/maps/embed/v1/place?key=AIzaSyASMrodCUgRato-a8YYcnflIlRGot8YAi8
				&q=40.5521185,23.0203891&zoom=17&maptype=roadmap"> 
			</iframe>
			<p>
				Kolokotroni 55, 57001, Thermi Thessaloniki<br> 
				Tel.2310-461512
				<img id="socialImage" src="img/social.png" alt="social"
					usemap="#logos"/>
				<map name="logos">
					<area shape="circle" coords="17,17,17"
						href="http://www.facebook.com/alcoolis" title="facebook"
						target="_blank" alt="facebook">
					<area shape="circle" coords="61,17,17"
						href="http://www.twitter.com/alcoolis" title="twitter"
						target="_blank" alt="twitter">
					<area shape="circle" coords="105,17,17"
						href="https://plus.google.com/" title="google"
						target="_blank" alt="google">
					<!-- <area shape="default" nohref="nohref" title="" alt="Default"> -->
				</map>
			</p>
		</div>
		<!-- END of downNav3 -->

		<div id="copyright" class="colorFont">
			<hr>
			<p>
				<span>&#169</span> Designed by <a class="colorFontLink" href="mailto:miltos@altintzis.com">CN_Prod</a>
				for <a class="colorFontLink" href="http://www.Stamford.edu" target="_blank">Stamford
					University</a>, ITE120 Web Developing I.
			</p>
		</div>
		<!-- END of copyright -->
		
		
	</div>
	<!-- END of footer -->
	


	<!-- jquery module -->
	<script src="js/jquery-1.12.0.min.js" type="text/javascript"></script>
	
	<!-- stick up the menu bar -->
	<script src="plugins/stick-Up/stickUp.min.js" type="text/javascript"></script>
	
	<!-- smooth scroll to content divs -->
	<script src="plugins/scroll-effects/viewportchecker.js" type="text/javascript"></script>
	
	<!-- imageDivs scroll with diferent speed from texts -->
	<script src="plugins/parallax-effect/modernizr.js" type="text/javascript"></script>
	
	<!-- carousell efect -->
	<script src="plugins/slick-master/slick.min.js" type="text/javascript"></script>
	
	<!-- animate colors -->
	<script src="plugins/jquery-color/jquery.color-2.1.2.min.js" type="text/javascript"></script>
	
	<!-- add easing to animations -->
	<script src="plugins/jquery-easing/jquery.easing.1.3.js" type="text/javascript"></script>
	
	<!-- add product image gallery -->
	<script src="plugins/fancybox/jquery.fancybox.js"></script>
	
	<!-- add shopping cart -->
	<script src="plugins/minicart-master/minicart.js"></script>
	
	<script type="text/javascript">delete History</script>
	<script src="plugins/browserstate-history/jquery.history.js"></script>
	
	<!-- my modules -->
	<script src="js/app.js"></script>
	<script src="js/app_ui.js"></script>

    
	<!-- Google search module -->
 	<!-- 
  	<script src="https://www.google.com/jsapi" type="text/javascript"></script>
 	
	<script language="Javascript" type="text/javascript">
		google.load("search", "1");
	</script>
	 -->

	<script type="text/javascript">
		//initiating jQuery
		
		jQuery(function($)
		{
			$(document).ready(function()
			{
				//enabling stickUp on the '.navbar-wrapper' class
				$('.stickyMenu').stickUp();
				/*
				{
					parts :
					{
						0 : 'homeDiv',
						1 : 'content1',
						2 : 'content2',
						3 : 'content3',
						4 : 'content4'
					},
					itemClass : 'liMenu',
					itemHover : 'active'
				}*/
			});
		});

		paypal.minicart.render();

// 		paypal.minicart.cart.on('add', function (idx, product, isExisting) 
// 		{
// 			if (!product.get('cartProductColor')) 
// 			{
// 				this.remove(idx);
// 				alert('Please select an option first!');
// 			}
// 		});

	// Content update and back/forward button handler
	History.Adapter.bind(window, 'statechange', function()
	{
		doClick(History.getState(), 1);
	});

		
<?php 

if(isset($_GET['q']))
{
    $request=$_GET['q'];
    
//     if ($request=="logout")
//        echo "alert('papala');";
    
    if ($request=="error")
       echo "changePage('/loginDiv.php?q=error');";
}
else 
    echo   "changePage('/homeDiv.html');";

    
?>
		
	</script>
	
</body>
</html>