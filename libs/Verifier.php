<?php

class Verifier {

    /**
     * Generates the verification code for a user
     * @param $userId string The user id
     * @return string The verification code
     */
    public static function generateVerificationCode($userId) {
        // Generate random string
        $code = rand('100000', '999999');

        // Save the code to DB

        return $code;
    }

    /**
     * Send the verification code to the user mobile
     * @param $code string The verification code
     * @param $phone string The phone number
     */
    public static function sendVerificationCode($code, $phone) {

    }

}