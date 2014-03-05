<?php

/**
 * The Volunteer model
 * Class Volunteer
 */
class Volunteer extends User {

    /**
     * Constructor for Volunteer model
     * @param string $id The Volunteer's user id
     */
    public function __construct($id) {
        parent::__construct($id);
    }

    /**
     * Create new instance of volunteer
     * @param $username string The volunteer's username
     * @param $phone string The volunteer's phone number
     * @param $password string The volunteer's password
     * @return Volunteer The instance of the volunteer
     */
    public static function newVolunteer($username, $phone, $password) {
        $user = User::newUser($username, $phone, $password);
        $userId = $user->id();

        $volunteer = new Volunteer($userId);

        require_once 'libs/DB.php';

        $conn = DB::connect();

        $conn->exec("INSERT INTO volunteer(id) VALUES('$userId')");

        DB::disconnect($conn);

        return $volunteer;
    }
} 