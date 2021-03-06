<?php

/**
 * The authorization class
 * Class Auth
 */
class Auth {

    /**
     * Check if user is authorized
     * @return bool Whether the user is authorized or not
     */
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

    public static function userId() {
        require_once 'libs/Session.php';
        Session::start();
        $id = Session::getVar("USER_ID");
        Session::close();
        return $id;
    }
} 