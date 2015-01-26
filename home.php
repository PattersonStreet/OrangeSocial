<?php include 'templates/nav.php'; ?>

<html>
<head>
<link rel='stylesheet' type='text/css' href='css/main.css' />
</head>
<body>
<div class='middle'>
<div id='post'>
<form action='' method='post' id='post_form'>
		 <script>
    $(document).ready(function() {
            
       $("#post_form").submit(function() {
         var post = $("#post_body").val();
 
         $.post('parse/post.php', {post: post}, function(data) {
		 $("#response").html(data);
		       $('#newsfeed').fadeIn(1100).html(get_posts());
		 });
		 return false;
        });
		            
					function get_posts() {
			$.get('get/post2.php',function(data){
			       $('#newsfeed').fadeIn(1100).html(data);
				   
			});
			}
			$('#newsfeed').fadeIn(1100).html(get_posts());
	 });
   </script>
   <div id='response'></div>
<textarea id='post_body' name='post-body'>Post something</textarea>
<input type='submit' name='submitp' id='submitp' value='Post' />
</form>
</div>

<div class='sidepanel'>
<img src='profile picture' height='250' width='200' />
<br />
<?php
 //get user info
$user = $_SESSION['username'];
$get_user = mysql_query("SELECT * FROM users WHERE username ='$user'");
$get = mysql_fetch_assoc($get_user);
    $firstname = $get['firstname'];
    $lastname = $get['lastname'];
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $_SESSION['username']; ?> - <?php echo $firstname; ?>&nbsp;<?php echo $lastname; ?></b>
<hr />

<div class='activity'>
 <h2>Activity</h2>   
</div>
</div>
<div id='newsfeed'>
 
   
</div>
</div>
</body>
</html>