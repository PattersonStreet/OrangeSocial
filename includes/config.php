<?php

//connect to database
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("socialweb") or die(mysql_error());
session_start();
?>