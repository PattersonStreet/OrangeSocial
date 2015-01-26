<?php include "./templates/nav.php"; ?>
<?php
if(isset($_SESSION['username'])) {
 header("location: home.php");   
}
?>
<!DOCTYPE html>
<html>
	<head>
	<link rel='stylesheet' type='text/css' href='css/main.css' />
	<script type='text/javascript' language='javscript' src='javascript/main.js'></script>
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	
	<script>
	$(document).ready(function() {
		$('#login-form').submit(function() {
			var username = $('#username').val();
			var password = $('#password').val();
			
			$.post('parse/login.php',{username: username, password: password},function(data) {
				$('#response').html(data);
			});
			return false
		});
	});
	</script>
	<title>Social web</title>
	</head>
	<body>
		<div id='middle'>
			<h1 id='welcome'>Welcome to Orange!</h1>
			<form action='' method='post' id='login-form'>
			<div id='response'></div>
				<input type='text' name='username' id='username' placeholder='Username' />
				<input type='password' name='password' id='password' placeholder='Password' />
				<input type='submit' name='submit' id='submit' value='Login!' />  <a id='link' href='signup.php'>Need an account? click here</a>
			</form>
		</div>
	</body>
</html>