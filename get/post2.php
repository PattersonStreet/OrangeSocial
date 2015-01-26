
            
   <?php
        include '../includes/config.php';   
 $query = mysql_query("SELECT * FROM posts ORDER BY id DESC");
        while($row = mysql_fetch_assoc($query)) {
            $id = $row['id'];
            $username = $row['username'];
            $body = $row['body'];
            $date_added = $row['date_added'];
            $hashtags = $row['hashtags'];
            
            $get_post_user = mysql_query("SELECT * FROM users WHERE username='$username'");
            $get_post_user2 = mysql_fetch_assoc($get_post_user);
                $fname = $get_post_user2['firstname'];
                $lname = $get_post_user2['lastname'];
    ?>
    
    <div class='post'>
        <div class='post_wrap'>
        <img src='w' height='85px' width='85px' />
        <div class='author'>
        <?php echo $username; ?> <font color='#EEE'><?php echo $fname;?> <?php echo $lname; ?></font>
        </div><hr />
        </div>
        <p>
        <?php echo $body; ?>
        </p>
    </div>
     <?php
      }      
    ?>
	
	    