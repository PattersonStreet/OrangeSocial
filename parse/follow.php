<?php include "../includes/config.php"; ?>
<?php
if(isset($_POST['username'])) {
 $username =$_POST['username'];
 $follower = $_POST['follower'];

    

    
 mysql_query("INSERT INTO follows VALUES('','$username','$follower')");
 echo "yes";

}
?>