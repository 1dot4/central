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

        $res = $conn->query("SELECT COUNT(*) FROM verificationStatus WHERE id='$userId'");

        // If no code generated for user
        if($res->fetchColumn() == 0) {
            $conn->exec("INSERT INTO verificationStatus(id, code, status) VALUES('$userId', '$code', 'unverified')");
        } else {
            // If a code already exists for the user
            $conn->exec("UPDATE verificationStatus SET code='$code', status='unverified' WHERE id='$userId'");
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

    /**
     * Check whether the code sent to user mobile is same as user inputs
     * @param $userId string The user id of the user
     * @param $code string The code that user inputs
     * @return bool Whether the code sent to mobile and one which user inputs are same
     */
    public static function correctCode($userId, $code) {
        $correct = false;

        require_once 'libs/DB.php';

        $conn = DB::connect();

        $res = $conn->query("SELECT code FROM verificationStatus WHERE id='$userId'");

        if($res->fetchColumn() == $code) {
            $correct = true;
        }

        DB::disconnect($conn);

        return $correct;
    }

    /**
     * Verify the user after checking code
     * @param $userId string The user id
     * @param $code string The code
     * @return bool Whether the user was verified or not
     */
    public static function verifyUser($userId, $code) {

        $verified = false;

        if(Verifier::correctCode($userId, $code)) {
            require_once 'libs/DB.php';

            $conn = DB::connect();

            $conn->exec("UPDATE verificationStatus SET status='verified' WHERE id='$userId'");
            $verified = true;

            DB::disconnect($conn);
        }

        return $verified;
    }

}