<?php
include '../includes/config.php';

if(isset($_POST['password1'])) {
 $password1 = strip_tags($_POST['password1']);//make sure the data is not illegal
 $password2 = strip_tags($_POST['password2']);//make sure the data is not illegal
    
 $md5_pass1 = md5($password1);//encrypt the password before sending to database
 $md5_pass2 = md5($password2);//encrypt the password before sending to database
    
 $user = $_SESSION['username'];//store the logged in user name in the variable

 if($md5_pass1 == $md5_pass2) {//if the password match run this code
  mysql_query("UPDATE users SET password='$md5_pass2' WHERE username='$user'");   
  echo "<div class='success'>You password has been changed</div>";
 } else if($md5_pass1 != $md5_pass2) {//if the password dont match run this code
  echo "<div class='error'>Your password dont match</div>";   
 }
}
?>