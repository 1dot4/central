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

        $this->email = "";
        $this->organization = "";
        $this->location = "";
        $this->designation = "";


        require_once 'libs/DB.php';

        $conn = DB::connect();

        $res = $conn->query("SELECT COUNT(*) FROM volunteer WHERE id='$id'");

        if($res->fetchColumn() == 1) {
            $res_1 = $conn->query("SELECT * FROM volunteer WHERE id='$id'");

            while($row = $res_1->fetch(PDO::FETCH_ASSOC)) {
                $this->email = $row["email"];
                $this->organization = $row["org_name"];
                $this->location = $row["location_name"];
                $this->designation = $row["designation"];
            }

        } else {
            die("Volunteer not found");
        }
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

        require_once 'libs/DB.php';

        $conn = DB::connect();

        $conn->exec("INSERT INTO volunteer(id) VALUES('$userId')");

        $volunteer = new Volunteer($userId);
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

        $conn->exec("UPDATE volunteer SET email='$this->email', org_name='$this->organization', designation='$this->designation', location_name='$this->location' WHERE id='$volunteer_id'");
    }

    /**
     * Register a seeker
     * @param string $username Seeker's username
     * @param string $fullName Seeker's full name
     * @param string $phone Seeker's mobile
     * @param string $password Seeker's password
     * @param string $currentLocation Seeker's current location
     * @param string $preferredLocation Seeker's preferred location
     * @param string $experience Seeker's experience
     * @param Array $skills Skills of seeker
     */
    public function registerSeeker($username, $fullName, $phone, $password, $currentLocation, $preferredLocation, $experience, $skills) {
        require_once 'models/User.php';
        require_once 'models/Seeker.php';
        $seeker = Seeker::newUser($username, $phone, $password);

        $seeker->setFullName($fullName);
        $seeker->setCurrentLocation($currentLocation);
        $seeker->setPreferredLocation($preferredLocation);
        $seeker->setExperience($experience);
        $seeker->setSkills($skills);

        $seeker->saveToDb();

        $seekerId = $seeker->id();

        require_once 'libs/DB.php';
        $conn = DB::connect();

        $volunteerId = $this->id();

        $conn->exec("INSERT INTO volunteer_registration(volunteer_id, seeker_id) VALUES($volunteerId, $seekerId)");
    }

    /**
     * Return user ids of seekers registered by volunteer
     * @return array User ids of seekers
     */
    public function registeredSeekers() {
        require_once 'libs/DB.php';

        $volunteerId = $this->id();

        $conn = DB::connect();

        $res = $conn->query("SELECT VR.seeker_id, U.join_date FROM volunteer_registration VR, user U WHERE VR.seeker_id=U.id AND VR.volunteer_id = '$volunteerId' ORDER BY U.join_date DESC");

        $seekers = array();

        while($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $seekerId = $row["seeker_id"];
            array_push($seekers, $seekerId);
        }

        return $seekers;
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
     * Calculate profile completeness of volunteer
     * @return float Percentage of profile completeness
     */
    public function profileCompleteness() {
        $noFields = 5;

        $count = 0;

        if($this->email != "") {
            $count += 1;
        }

        if($this->designation != "") {
            $count += 1;
        }

        if($this->organization != "") {
            $count += 1;
        }

        if($this->location != "") {
            $count += 1;
        }

        if($this->fullName() != "") {
            $count += 1;
        }

        return ((float)$count * 100.0 / (float)$noFields);
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