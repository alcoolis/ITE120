<!-- 
<div class="loginDiv">

	<div class="pen-title">
		<h1>Login Form</h1>
		<span>Week 9 <i class='fa fa-code'></i> ITE220: Web Development II
		</span>
	</div>
	<div class="containerLogin">
		<div class="card"></div>
		<div class="card">
			<div class="input-container">
				<label for="error"> 
				
<?php
if (isset($_GET['q']))
{
    $request = $_GET['q'];
    
    if ($request == "error")
        echo "Invalid username or password!";
}
?>

				</label>
			</div>
			<h1 class="title">Login</h1>
			<form action="action.php?q=login" method="post">
				<div class="input-container">
					<input type="text" name="login-username" required="required" /> <label
						for="Username"
					>Username</label>
					<div class="bar"></div>
				</div>
				<div class="input-container">
					<input type="password" name="login-password" required="required" />
					<label for="Password">Password</label>
					<div class="bar"></div>
				</div>
				<div class="button-container">
					<button>
						<span>Go</span>
					</button>
				</div>
			</form>
		</div>
		<div class="card alt">
			<div class="toggle"></div>
			<h1 class="title">
				Register
				<div class="close"></div>
			</h1>
			<form>
				<div class="input-container">
					<input type="text" id="register-username" required="required" /> <label
						for="Username"
					>Username</label>
					<div class="bar"></div>
				</div>
				<div class="input-container">
					<input type="password" id="register-password" required="required" />
					<label for="Password">Password</label>
					<div class="bar"></div>
				</div>
				<div class="input-container">
					<input type="password" id="register-repeat-password"
						required="required"
					/> <label for="Repeat Password">Repeat Password</label>
					<div class="bar"></div>
				</div>
				<div class="button-container">
					<button>
						<span>Next</span>
					</button>
				</div>
			</form>
		</div>
	</div>
	<a id="portfolio" href="http://andytran.me/" title="View my portfolio!"><i
		class="fa fa-link"
	></i></a>
	<a id="codepen" href="http://codepen.io/andytran/" title="Follow me!"><i
		class="fa fa-codepen"
	></i></a>
	<script src='js/jquery.min.js'></script>
	<script src="js/index.js"></script>

</div>
-->

<div class="loginDiv">

	<div class="logTitle">
		<h1>Login</h1>
	</div>
	
	<!-- Form Module-->
	<div class="logForm-module">
	
		<div class="logToggle">
			<i class="fa fa-times fa-pencil"></i>
			<div class="logTooltip">Click To Register</div>
		</div>
		
		<div class="logForm">
			<h2>Login to your account</h2>
			<form>
				<input type="text" placeholder="Username" /> 
				<input type="password" placeholder="Password"/>
				<button>Login</button>
			</form>
		</div>
		
		<div class="logForm">
			<h2>Create an account</h2>
			<form>
				<input type="text" placeholder="Username" /> <input type="password" placeholder="Password"/> 
				<input type="email" placeholder="Email Address" /> <input type="tel" placeholder="Phone Number"/>
				<button>Register</button>
			</form>
		</div>
		
		<div class="resetPass">
			<a href="#">Forgot your password?</a>
		</div>
		
	</div>
</div>

<script type="text/javascript">

//toggle from login to register
$('.logToggle').click(function()
{
	// switch the icon
	$(this).children('i').toggleClass('fa-pencil');
	
	// hide-show the button resetPass
	$('.resetPass').toggle('slow');
	
	// switch the text inside .logTooltip
	var text = $('.logTooltip').text();
    $('.logTooltip').text(
        text == "Click To Register" ? "Click To Login" : "Click To Register");

	// switch the formes
	$('.logForm').animate(
	{
		height : "toggle",
		'padding-top' : 'toggle',
		'padding-bottom' : 'toggle',
		opacity : "toggle"
	}, "slow");
});

</script>

