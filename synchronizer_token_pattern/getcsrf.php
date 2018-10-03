<?php

require "helpers/CSRF.php";

session_start();

$csrf = new CSRF();
$token = $csrf->getToken(session_id());

echo $token;