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

        $this->experience = "";
        $this->currentLocation = "";
        $this->preferredLocation = "";

        require_once 'libs/DB.php';

        $conn = DB::connect();

        $res = $conn->query("SELECT COUNT(*) FROM seeker WHERE id='$id'");

        if($res->fetchColumn() == 1) {
            $res_1 = $conn->query("SELECT * FROM seeker WHERE id='$id'");

            while($row = $res_1->fetch(PDO::FETCH_ASSOC)) {
                $this->experience = $row["experience"];
                $this->preferredLocation = $row["pref_location_name"];
                $this->currentLocation = $row["curr_location_name"];
            }

        } else {
            die("Seeker not found");
        }
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

        require_once 'libs/DB.php';

        $conn = DB::connect();

        $conn->exec("INSERT INTO seeker(id) VALUES('$userId')");

        $seeker = new Seeker($userId);
        return $seeker;
    }

    /**
     * Save data of Seeker to database
     */
    public function saveToDb() {
        parent::saveToDb();

        require_once 'models/Location.php';
        Location::saveToDb($this->preferredLocation);
        Location::saveToDb($this->currentLocation);

        require_once 'libs/DB.php';
        $conn = DB::connect();

        $seeker_id = $this->id();

        // Update the seeker table
        $conn->exec("UPDATE seeker SET experience='$this->experience', pref_location_name='$this->preferredLocation', curr_location_name='$this->currentLocation' WHERE id='$seeker_id'");
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