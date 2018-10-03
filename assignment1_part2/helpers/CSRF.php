<?php

class CSRF
{
    function generateToken($session_id, $salt){
        $csrf_token = hash("sha1", $session_id.$salt);

        return $csrf_token;
    }

    function validateToken($cookie, $token){
        return ($cookie == $token);
    }
}