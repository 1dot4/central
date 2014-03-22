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
    public static function newUser($username, $phone, $password) {
        $user = parent::newUser($username, $phone, $password);
        $userId = $user->id();

        $seeker = new Seeker($userId);

        require_once 'libs/DB.php';

        $conn = DB::connect();

        $conn->exec("INSERT INTO seeker(id) VALUES('$userId')");

        DB::disconnect($conn);

        return $seeker;
    }

    /**
     * Getter function for seeker's experience
     * @return int Seeker's experience
     */
    public function experience() {
        return $this->experience;
    }

    /**
     * Getter function for seeker's preferred location
     * @return string The seeker's preferred location
     */
    public function preferredLocation() {
        return $this->preferredLocation;
    }

    /**
     * Getter function for seeker's current location
     * @return string The seeker's current location
     */
    public function currentLocation() {
        return $this->currentLocation;
    }

    /**
     * Setter function for seeker experience
     * @param $experience int The seeker's experience
     */
    public function setExperience($experience) {
        $this->experience = $experience;
    }

    /**
     * Setter function for seeker's current location
     * @param $location string The seeker's current location
     */
    public function setCurrentLocation($location) {
        $this->currentLocation = $location;
    }

    /**
     * Setter function for seeker's preferred location
     * @param $location string The seeker's preferred location
     */
    public function setPreferredLocation($location) {
        $this->preferredLocation = $location;
    }

    /**
     * Number of years of experience of seeker
     * @var int
     */
    private $experience;

    /**
     * Seeker's preferred location
     * @var string
     */
    private $preferredLocation;

    /**
     * Seeker's current location
     * @var string
     */
    private $currentLocation;
} 