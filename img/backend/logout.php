<?php
session_start();
session_destroy();//destroy the session
header("Location:index.php");//redirect user to login page
?> 