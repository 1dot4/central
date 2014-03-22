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
    public static function newUser($username, $phone, $password) {
        $user = parent::newUser($username, $phone, md5($password));
        $userId = $user->id();

        $provider = new Provider($userId);

        require_once 'libs/DB.php';

        $conn = DB::connect();

        $conn->exec("INSERT INTO provider(id) VALUES('$userId')");

        DB::disconnect($conn);

        return $provider;
    }

    /**
     * Getter function for provider's email
     * @return string The provider's email
     */
    public function email() {
        return $this->email;
    }

    /**
     * Getter function for provider's organization
     * @return string The provider's organization
     */
    public function organization() {
        return $this->organization;
    }

    /**
     * Getter function for provider's designation
     * @return string The provider's designation
     */
    public function designation() {
        return $this->designation;
    }

    /**
     * Getter function for provider's location
     * @return string The provider's location
     */
    public function location() {
        return $this->location;
    }

    /**
     * The provider's email
     * @var string
     */
    private $email;

    /**
     * The provider's organization
     * @var string
     */
    private $organization;

    /**
     * The provider's designation
     * @var string
     */
    private $designation;

    /**
     * The provider's location
     * @var string
     */
    private $location;
}