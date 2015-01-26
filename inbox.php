<?php include "./templates/nav.php"; ?>
<html>
<head>
<link rel='stylesheet' type='text/css' href='css/main.css' />
<link rel='stylesheet' type='text/css' href='css/inbox/main.css' />
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

</head>
<body>
<div id='inbox'>
 <h1>Inbox</h1><hr />
 <br />
 <h3>Your new messages(0)</h3>
 <div id='new-messages'><br />
	<?php
	 $user = $_SESSION['username'];
     $query = mysql_query("SELECT * FROM messages WHERE user_to='$user'");
	 while($row = mysql_fetch_assoc($query)) {
		$id = $row['id'];
		$user_to = $row['user_to'];
		$user_from = $row['user_from'];
		$body = $row['message'];
		$date_sent = $row['date_sent'];
		$read = $row['read'];
	?>
<script>
$(document).ready(function() {
	$('.open').click(function() {
		$('.toggle<?php echo $id; ?>').slideDown('slow');
	});
	
	
	$('.reply').click(function() {
		$('.toggler<?php echo $id; ?>').slideDown('slow');
	});
	
	$('.reply-form').submit(function() {
		var body = $('.reply').val();
		var id = "<?php echo $id; ?>";
		$.post('parse/inbox.php',{reply: reply, id: id},function(data) {
			$('.response').html(data);
		});
	});
});
</script>
	<div class='message'>
		<div class='img'><img  id='img' src='profile picture' height='60' width='60' /></div>
		<div class='user_from'><?php echo $user_from; ?></div><br /><p />
		<button class='open'>Open message</button> <button class='reply'>Reply</div>
		<div class='toggle<?php echo $id; ?>' style='display: none; border: 1px solid #EEE; width: 50%;'>
		<p><?php echo $body; ?></p>
		</div>
		<div class='toggler<?php echo $id; ?>' style='display: none; border-bottom: 1px solid #EEE; width: 50%;'>
		<form action='' method='post' class='reply-form'>
		<div class='response'>
		
		</div>
			<textarea class='reply' style='width:80%; float: left;'>Reply</textarea> <input type='submit' name='submit' id='submit<?php echo $id; ?>' style='width: 60px; float: right; margin: 0; padding:0; padding-top: 10px; padding-bottom: 10px;'/>
		</form>
		</div>
	</div>
	<?php
	 }
	?>
 </div>
 <br />
 <br />
 <br />
 <br />
 <br />
 <br />
 <br />
 <br />
 <h3>Your read messages(0)</h3>
 <div id='old-messages'>
 
 </div>
</div>
</body>
</html>