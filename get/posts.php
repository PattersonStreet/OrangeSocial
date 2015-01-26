<?php
include '../includes/config.php';
$user = $_SESSION['username'];

$query = mysql_query("SELECT username, body from posts inner join follows on posts.username = follows.followe where follows.follower = '$user' or posts.username='$user' ORDER BY posts.date_added DESC");
while($p = mysql_fetch_assoc($query)) {
    $username = $p['username'];
    $body = $p['body'];
    $get_user = mysql_query("SELECT * from users where username='$username'");
    $u = mysql_fetch_assoc($get_user);
        $firstname = $u['firstname'];
        $lastname = $u['lastname'];
        $profile_picture = $u['profile_picture'];

?>

    <div class='post'>
        <div class='post_wrap'>
        <img src='profile_pictures/<?php echo $profile_picture; ?>' height='105px' width='85px' />
        <div class='author'>
        <a style='text-decoration: none; color: #4aaee7;' href='profile.php?user=<?php echo $username; ?>'><?php echo $username;?></a> <font color='#EEE'></font>
        </div><hr />
        </div>
        <p>
        <?php echo $body; ?>
        </p>
    </div>
<?php } ?>



 <?php
        $query = mysql_query("SELECT * FROM follows WHERE followe='$username' AND follower='$user'");
        $check = mysql_fetch_assoc($query);

        if($check =="") {
            echo "<button id='follow' class='button'>Follow</button>";
        } else if($check != "") {
            echo "<button id='unfollow' class='button'>Unfollow</button>";
        }
        ?>