<?php

class NewPasswordGenerator {

    /**
     * Generates the new Password for forgot password
     * @param $userId string The user id
     * @return string new password
     */
    public static function generateNewPassword($username) {
        // Generate random string
        $npassword = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);

        // Save the password to DB
        require_once 'DB.php';
        $conn = DB::connect();

        $conn->query("UPDATE user SET password=md5('$npassword') WHERE username='$username'");
    }

    /**
     * Send the new Password to the user mobile
     * @param $nPassword string The new Password
     * @param $phone string The phone number
     */
    public static function send_nPassword($nPassword, $phone) {

    }

    
}