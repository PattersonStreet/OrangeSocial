<?php
include '../includes/config.php';//include our config.php file

if(isset($_POST['bio'])) {//if the bio information that was sent over here is set
 $bio = $_POST['bio'];//make a variable to contain the bio information

 $user = $_SESSION['username'];//make the variable to store the user that is logged in
 
 mysql_query("UPDATE users SET bio='$bio' WHERE username='$user'"); //make the nessesary query to insert into the database
 echo "<div class='success'>You info has saved</div>";
}
?>