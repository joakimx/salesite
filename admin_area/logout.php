<?php

session_start();

session_destroy();

echo "<script>window.open('login.php?logged_out=You\'ve been logged out', '_self')</script>";


?>
