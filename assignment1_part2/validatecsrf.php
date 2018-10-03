<?php

require "helpers/CSRF.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['csrf']) && $_POST['csrf']!="" && isset($_COOKIE["csrf_cookie"])) {
        $csrf = new CSRF();
        $isValid = $csrf->validateToken($_COOKIE["csrf_cookie"], trim($_POST['csrf']));

        if($isValid){
            echo "Valid CSRF token";
        }else{
            echo "Invalid CSRF token";
        }
    }else{
        echo "Invalid Form Submit. CSRF token not found.";
    }
}else{
    echo "Invalid Request Method";
}