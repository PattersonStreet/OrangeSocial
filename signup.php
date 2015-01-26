<?php include 'templates/nav.php'; ?>
<html>
<head>
<link rel='stylesheet' type='text/css' href='css/main.css' />
<link rel='stylesheet' type='tex/css' href='css/signup/main.css' />
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script>
$(document).ready(function() {
	$("#signup-form").submit(function() {
		var username = $('#username').val();
		var email = $('#email').val();
		var password = $('#password').val();
		var rpassword = $('#password2').val();
		var firstname = $('#firstname').val();
		var lastname = $('#lastname').val();
		
		$.post('parse/signup.php',{username: username, email: email, password: password, password2: rpassword, firstname: firstname, lastname: lastname},function(data) {
			$('#response').html(data);
		});
		return false;
	});
});
</script>
</head>
<body>
<div class='middle'>
	<h2>Looks like your ready!</h2>
	<div id='response'></div>
	<form action='' method='post' id='signup-form'>
		<input type='text' name='firstname' id='firstname' placeholder='Firstname' />
		<input type='text' name='lastname' id='lastname' placeholder='Lastname' />
		<input type='text' name='username' id='username' placeholder='Username' />
		<input type='email' name='email' id='email' placeholder='Email' />
		<input type='password' name='password' id='password' placeholder='Password' />
		<input type='password' name='password2' id='password2' placeholder='Repeat password' />
		<input type='submit' name='register' id='register' placeholder='Signup!' />
	</form>
</div>
</body>
</html>