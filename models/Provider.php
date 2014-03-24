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

        $this->email = "";
        $this->organization = "";
        $this->location = "";
        $this->designation = "";


        require_once 'libs/DB.php';

        $conn = DB::connect();

        $res = $conn->query("SELECT COUNT(*) FROM provider WHERE id='$id'");

        if($res->fetchColumn() == 1) {
            $res_1 = $conn->query("SELECT * FROM provider WHERE id='$id'");

            while($row = $res_1->fetch(PDO::FETCH_ASSOC)) {
                $this->email = $row["email"];
                $this->organization = $row["org_name"];
                $this->location = $row["location_name"];
                $this->designation = $row["designation"];
            }

        } else {
            die("Provider not found");
        }

        DB::disconnect($conn);
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

        require_once 'libs/DB.php';

        $conn = DB::connect();

        $conn->exec("INSERT INTO provider(id) VALUES('$userId')");

        DB::disconnect($conn);

        $provider = new Provider($userId);
        return $provider;
    }

    /**
     * Save data of Provider to database
     */
    public function saveToDb() {
        parent::saveToDb();

        // Save provider's location
        require_once 'models/Location.php';
        Location::saveToDb($this->location);

        // Save provider's organization
        require_once 'models/Organization.php';
        Organization::saveToDb($this->organization);

        require_once 'libs/DB.php';

        $conn = DB::connect();

        $provider_id = $this->id();

        $conn->exec("UPDATE provider SET email='$this->email', org_name='$this->organization', designation='$this->designation', location_name='$this->location WHERE id='$provider_id'");

        DB::disconnect($conn);
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
     * Setter function for provider email
     * @param $email string The provider's email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * Setter function for provider organization
     * @param $organization string The provider's organization
     */
    public function setOrganization($organization) {
        $this->organization = $organization;
    }

    /**
     * Setter function for provider designation
     * @param $designation string The provider's organization
     */
    public function setDesignation($designation) {
        $this->designation = $designation;
    }

    /**
     * Setter function for provider location
     * @param $location string The provider's location
     */
    public function setLocation($location) {
        $this->location = $location;
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