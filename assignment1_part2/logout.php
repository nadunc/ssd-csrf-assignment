<?php

session_start();
$_SESSION['valid'] = false;
$_SESSION['username'] = '';
setcookie("csrf_cookie", "", time()-3600, "/");

session_destroy();

header("location:index.php");