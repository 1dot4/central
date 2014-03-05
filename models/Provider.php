<?php

/**
 * The Provider model
 * Class Provider
 */
class Provider extends User {

    /**
     * Constructor for the provider model
     * @param string $id The Provider's user id
     */
    public function __construct($id) {
        parent::__construct($id);
    }

    /**
     * Create new instance of Job Provider
     * @param $username string The username of the job provider
     * @param $phone string The phone number of the job provider
     * @param $password string The password of the job provider
     * @return Provider An instance of the job provider
     */
    public static function newProvider($username, $phone, $password) {
        $user = User::newUser($username, $phone, $password);
        $userId = $user->id();

        $provider = new Provider($userId);

        return $provider;
    }
}