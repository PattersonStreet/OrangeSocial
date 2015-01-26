<?php include '../includes/config.php'; ?>

<?php
if(isset($_POST['post'])) {
    $post = strip_tags(mysql_real_escape_string($_POST['post']));
    $user = $_SESSION['username'];
    
    mysql_query("INSERT INTO posts VALUES('','$user','$post',now(),'')");
    echo "<div class='success'>Posted</div>";
}
?>