<?php

/**
 * The Seeker model
 * Class Seeker
 */
class Seeker extends User {

    /**
     * Constructor for the Seeker model
     * @param string $id The Seeker's user id
     */
    public function __construct($id) {
        parent::__construct($id);
    }

    /**
     * Create a new instance of Job Seeker
     * @param $username string The job seeker's username
     * @param $phone string The job seeker's phone
     * @param $password string The job seeker's password
     * @return Seeker The instance of the job Seeker
     */
    public static function newSeeker($username, $phone, $password) {
        $user = User::newUser($username, $phone, $password);
        $userId = $user->id();

        $seeker = new Seeker($userId);

        return $seeker;
    }
} 