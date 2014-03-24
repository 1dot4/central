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
    public static function newUser($username, $phone, $password) {
        $user = parent::newUser($username, $phone, $password);
        $userId = $user->id();

        $volunteer = new Volunteer($userId);

        require_once 'libs/DB.php';

        $conn = DB::connect();

        $conn->exec("INSERT INTO volunteer(id) VALUES('$userId')");

        DB::disconnect($conn);

        return $volunteer;
    }

    /**
     * Save data of Volunteer to database
     */
    public function saveToDb() {
        parent::saveToDb();

        // Save volunteer's location
        require_once 'models/Location.php';
        Location::saveToDb($this->location);

        // Save volunteer's organization
        require_once 'models/Organization.php';
        Organization::saveToDb($this->organization);

        require_once 'libs/DB.php';

        $conn = DB::connect();

        $volunteer_id = $this->id();

        $conn->exec("UPDATE volunteer SET email='$this->email', org_name='$this->organization', designation='$this->designation', location_name='$this->location WHERE id='$volunteer_id'");

        DB::disconnect($conn);
    }

    /**
     * Getter function for email
     * @return string The volunteer's email
     */
    public function email() {
        return $this->email;
    }

    /**
     * Getter function for organization
     * @return mixed The volunteer's organization
     */
    public function organization() {
        return $this->organization;
    }

    /**
     * Getter function for designation
     * @return string The volunteer's designation
     */
    public function designation() {
        return $this->designation;
    }

    /**
     * Getter function for location
     * @return string The volunteer's location
     */
    public function location() {
        return $this->location;
    }

    /**
     * Setter function for volunteer email
     * @param $email string The volunteer's email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * Setter function for volunteer organization
     * @param $organization string The volunteer's organization
     */
    public function setOrganization($organization) {
        $this->organization = $organization;
    }

    /**
     * Setter function for volunteer designation
     * @param $designation string The volunteer's designation
     */
    public function setDesignation($designation) {
        $this->designation = $designation;
    }

    /**
     * Setter function for volunteer location
     * @param $location string The volunteer's location
     */
    public function setLocation($location) {
        $this->location = $location;
    }

    /**
     * The email of the volunteer
     * @var string
     */
    private $email;

    /**
     * The organization of the volunteer
     * @var
     */
    private $organization;

    /**
     * The designation of the volunteer
     * @var string
     */
    private $designation;

    /**
     * The location of the volunteer
     * @var string
     */
    private $location;
} 