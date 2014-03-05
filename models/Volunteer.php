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

    public static function newVolunteer($username, $phone, $password) {
        $user = User::newUser($username, $phone, $password);
        $userId = $user->id();

        $volunteer = new Volunteer($userId);
        return $volunteer;
    }
} 