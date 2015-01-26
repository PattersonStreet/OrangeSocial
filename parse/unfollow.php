<?php include '../includes/config.php'; ?>
<?php
if(isset($_POST['username'])) {
 $username = $_POST['username'];
 $follower = $_POST['follower'];
    
 mysql_query("DELETE FROM follows WHERE followe='$username' AND follower='$follower'");
echo "Working";
}
?>