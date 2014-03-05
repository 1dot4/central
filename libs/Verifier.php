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
        require_once 'DB.php';
        $conn = DB::connect();

        $res = $conn->query("SELECT COUNT(*) FROM verificationCode WHERE id='$userId'");

        // If no code generated for user
        if($res->fetchColumn() == 0) {
            $conn->exec("INSERT INTO verificationCode(id, code) VALUES('$userId', '$code')");
        } else {
            // If a code already exists for the user
            $conn->exec("UPDATE verificationCode SET code='$code' WHERE id='$userId'");
        }

        DB::disconnect($conn);

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