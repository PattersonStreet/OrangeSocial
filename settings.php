<?php include 'templates/nav.php'; ?>
<html>
<head>
    <link rel='stylesheet' type='text/css' href='css/main.css' />
    <link rel='stylesheet' type='text/css' href='css/settings/main.css' />
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script><!--musat have this file in place here!!!!-->
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script>
    $(document).ready(function() {
        //password ajax script
       $("#change_password").submit(function() {//when the form submits run this code
          var new_password = $("#new_password").val();//get the values for the first password
          var new_password2 = $("#new_password2").val();//get values for the second password field Important
           
          $.post('parse/change.php',{password1: new_password, password2: new_password2},function(data) {
              $("#response").html(data);
          });
           return false;
       });
        
        
        //change info ajax script
       $("#change_info").submit(function() {
          var bio = $("#bio").val();
           
          $.post('parse/change_info.php',{bio: bio},function(data) {
             $("#response2").html(data); 
          });
         return false;//this will make the ajax effect work
       });
    });
    </script>
</head>
<body>
    <div class='middle3'>
        <div id='profile_picture_div'>
        <form id='profile_picture_form' method='post' action='' enctype="multipart/form-data">
            <?php
            $db_pic = mysql_query("SELECT * FROM users WHERE username='$user'");//get the current profile picture
            $check_db_pic = mysql_fetch_assoc($db_pic);//check to see if it exsists
                $db_pic2 = $check_db_pic['profile_picture'];
            ?>
            <img src='profile_pictures/<?php echo $db_pic2;?>' height='250' width='200' /><br />
            <?php
                if(isset($_FILES['profile_pic'])) {//if the file is set to be processed
                   $profile_picture = $_FILES['profile_pic']['name'];//make a variable to contain the file info
                     move_uploaded_file($_FILES['profile_pic']['tmp_name'], "profile_pictures/".     $_FILES['profile_pic']['name']);//using a PHP5 function we will move the file to a directory
                    
                    mysql_query("UPDATE users SET profile_picture='$profile_picture' WHERE username='$user'");
                    echo "<div class='success'>Working</div>";
                }
            ?>
            <input type='file' name='profile_pic' id='profile_pic' />
            <input type='submit' name='p_submit' id='p_submit' value='Done!' />
        </form><hr />
        <div id='change_password2'>
            <form id='change_password' method='post' action=''>
                <h4>Change your password</h4>
                <div id='response'></div>
                <input type='password' name='password' id='new_password' placeholder='New password'/><p />
                <input type='password' name='password2' id='new_password2' placeholder='Repeat new password'/><p />
                <input type='submit' name='submit' id='submit' value='Done!' />
            </form>
        </div><hr />
        <div class='change_info'>
            <form id='change_info' method='post' action=''>
            <h4>Change your bio</h4>
            <div id='response2'></div>
            <?php
                //get user info
                $get_user = mysql_query("SELECT * FROM users WHERE username='$user'");//get the user bio
                $get = mysql_fetch_assoc($get_user);//get the info from the query
                    $firstname = $get['firstname'];
                    $lastname = $get['lastname'];
                    $bio = $get['bio'];
            ?>
            <textarea id='bio' name='bio' ><?php echo $bio; ?></textarea><br />
            <input type='submit' name='submit' value='Done!'/>
            </form>
        </div>
        </div>
    </div>
</body>
</html>