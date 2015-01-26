<?php include "./includes/config.php"; ?>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<div id='nav'>
	<div id='links'>
		<?php if(isset($_SESSION['username'])) { ?>
		<a href='logout.php'>Logout</a>
		<a href='settings.php'>Settings</a>
		<a href='requestes.php'>Requests</a>
		<a href='inbox.php'>Inbox</a>
		<a href='home.php'>Home</a>
		<?php } else { ?>
		<a href='index.php'>Login</a>
		<a href='signup.php'>Sign up!</a>
		<?php } ?>
	</div>
	<div id='logo'>
		<h1>Orange</h1>
	</div>
</div>