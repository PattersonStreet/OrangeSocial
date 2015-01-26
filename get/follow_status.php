<?php
include '../includes/config.php';

$username = $_GET['username'];
$follower = $_GET['follower'];

$query = mysql_query("SELECT * FROM follows WHERE followe='$username' AND follower='$follower'");
$check = mysql_fetch_assoc($query);

if($check =="") {
 echo "Follow";
} else if($check != "") {
echo "<button id='follow' class='button'>Unfollow</button>";
}
?>