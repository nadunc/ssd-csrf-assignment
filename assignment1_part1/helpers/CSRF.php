<?php

require "SessionDBHelper.php";


class CSRF
{
    function generateToken($session_id, $salt){
        $csrf_token = hash("sha1", $session_id.$salt);

        $db = new SessionDBHelper();
        $db->insertRecord($session_id, $csrf_token);

        return $csrf_token;
    }

    function getToken($session_id){
        $db = new SessionDBHelper();
        $csrf_token = $db->findCSRFTokenBySessionId($session_id);
        return $csrf_token;
    }

    function validateToken($session_id, $token){
        $db = new SessionDBHelper();
        $csrf_token = $db->findCSRFTokenBySessionId($session_id);
        return ($csrf_token == $token);
    }
}