<?php
include 'includes/config.php';
if(isset($_SESSION['username'])) {
    unset($_SESSION['username']);
}
session_destroy();
header("location: index.php");
echo "<br /><br /><div class='success'>You have been logged out</div>";
?>