<?php include '../includes/config.php'; ?>
<?php
if(isset($_POST['username'])) {
	$username = strip_tags(mysql_real_escape_string($_POST['username']));
	$password = strip_tags(mysql_real_escape_string($_POST['password']));
	$rpassword = strip_tags(mysql_real_escape_string($_POST['password2']));
	$email = strip_tags(mysql_real_escape_string($_POST['email']));
	$firstname = strip_tags(mysql_real_escape_string($_POST['firstname']));
	$lastname = strip_tags(mysql_real_escape_string($_POST['lastname']));
	
	if($username&&$password&&$rpassword&&$email&&$firstname&&$lastname !== "") {
	//check username
	$query = mysql_query("SELECT * FROM users WHERE username='$username'");
	$check_username = mysql_fetch_assoc($query);
	$check_username2 = mysql_num_rows($query);
	if($check_username == "") {
	//check email
	$query2 = mysql_query("SELECT * FROM users WHERE email='$email'");
	$check_email = mysql_fetch_assoc($query2);
	if($check_email == "") {
	//check the passwords to see if they match
	if($password == $rpassword) {
	
	$md5password = md5($rpassword);
	mysql_query("INSERT INTO users VALUES('','$username','$firstname','$lastname','$email','$md5password','','')");
	echo "<div class='success'>Your account has been made</div>";
	
	
	} else if($password != $rpassword) {
		echo "<div class='error'>Password dont match</div>";
	}
	
	} else if($check_email != "") {
		echo "<div class='error'>Email is already used</div>";
	}
	
	} else if($check_username != "") {
		echo "<div class='error'>Username already being used</div>";
	}
	} else {
		echo "<div class='error'>You must fill in the form</div>";
	}
	
}
?>