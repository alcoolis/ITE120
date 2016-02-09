<?php 
session_start();

if(isset($_SESSION['username']))
{
    session_destroy();
    header("location:index.php?q=logout");
}
?>

<div class="loginDiv">

	<div class="logTitle">
		<h1>Login</h1>
	</div>
	
	<div>
		<label for="error"> 
<?php
if (isset($_GET['q']))
{
    $request = $_GET['q'];
    
    if ($request == "error")
        echo "<div class='loginError'><p>Invalid username or password!</p><div>";
}
?>
		</label>
	</div>

	<!-- Form Module-->
	<div class="logForm-module">
	
		<div class="logToggle">
			<i class="fa fa-times fa-pencil"></i>
			<div class="logTooltip"></div>
		</div>
		
		<div id="firstLoginForm" class="logForm">
			<h2>Login to your account</h2>
			<form action='../loginAction.php?q=login' method='post'>
				<input type='text' placeholder='Username' name='login-username' required='required'/> 
				<input type='password' placeholder='Password' name='login-password' required='required'/>
				<button>Login</button>
			</form>
		</div>
		
		<div id="secondLoginForm"  class="logForm">
			<h2>Create an account</h2>
			<form action='../loginAction.php?q=register' method='post'>
				<input type='text' placeholder='Username'  name='register-username' required='required'/> 
				<input type='password' placeholder='Password' name='register-password' required='required'/> 
				<input type='password' placeholder='Repeat Password' name='register-repeat-password' required='required'/> 
				<input type='email' placeholder='Email Address' name='register-email' required='required'/>
				<input type='text' placeholder='First Name' name='register-first-name'/>
				<input type='text' placeholder='Last Name' name='register-last-name'/> 
				<input type='tel' placeholder='Phone Number' name='register-tel'/>
				<input type='text' placeholder='Photo ID' name='register-photo'/>
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
	loginFlag = (loginFlag==1) ? loginFlag=2 : loginFlag=1;
	
	// hide-show the button resetPass
	$('.resetPass').toggle('slow');
	
	// switch the text inside .logTooltip
	var text = $('.logTooltip').text();
    $('.logTooltip').text(
        text == "Click To Register" ? "Click To Login" : "Click To Register");

    toggleloginRegister(this);
});

</script>
