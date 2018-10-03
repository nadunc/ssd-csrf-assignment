<?php

session_start();
$_SESSION['valid'] = false;
$_SESSION['username'] = "";

session_destroy();

header("location:index.php");