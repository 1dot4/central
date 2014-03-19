<?php

class Auth {
    public static function isAuthorized() {
        $auth = true;
        require_once 'Session.php';

        Session::start();

        if(!Session::existsVar("USER_ID") || (trim(Session::getVar("USER_ID")) == '')) {
            $auth = false;
        }

        Session::close();

        return $auth;
    }
} 