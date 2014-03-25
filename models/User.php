<?php

/**
 * The user model
 * Class User
 */
class User {

    /**
     * Constructor for user model
     * @param $id string The user id
     */
    public function __construct($id) {
        $this->id = $id;

        require_once 'libs/DB.php';

        // Connect to database
        $conn = DB::connect();

        $res = $conn->query("SELECT COUNT(*) FROM user WHERE id='$id'");

        // If there is a unique user
        if($res->fetchColumn() == 1) {
            // Set variables after extracting data from db
            $res_1 = $conn->query("SELECT * FROM user WHERE id='$id'");

            while($row = $res_1->fetch(PDO::FETCH_ASSOC)) {
                $this->username = $row["username"];
                $this->phone = $row["phone"];
                $this->password = $row["password"];
                $this->fullName = $row["fullname"];
            }
        }
        // If there are zero or more than one entry
        else {
            die("User not found");
        }

        DB::disconnect($conn);
    }

    /**
     * Getter method for user id
     * @return string The user id
     */
    public function id() {
        return $this->id;
    }

    /**
     * Getter method for user name
     * @return string The user name
     */
    public function username() {
        return $this->username;
    }

    /**
     * Getter method for password
     * @return string The user password
     */
    public function password() {
        return $this->password;
    }

    /**
     * Getter method for phone
     * @return string The user phone number
     */
    public function phone() {
        return $this->phone;
    }

    /**
     * Getter function for user's full name
     * @return string The user's full name
     */
    public function fullName() {
        return $this->fullName;
    }

    /**
     * Setter method for user name
     * @param $username string The user name
     */
    public function setUsername($username) {
        $this->username = $username;
    }

    /**
     * Setter method for user password
     * @param $password string The user password
     */
    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     * Setter method for phone
     * @param $phone string The user phone number
     */
    public function setPhone($phone) {
        $this->phone = $phone;
    }

    /**
     * Setter function for user's full name
     * @param $fullName
     */
    public function setFullName($fullName) {
        $this->fullName = $fullName;
    }

    public function type() {

        if($this->type == '') {
            require_once 'libs/DB.php';

            $conn = DB::connect();

            $res = $conn->query("SELECT COUNT(*) FROM volunteer WHERE id='$this->id'");

            if($res->fetchColumn() == 1) {
                $this->type = 'volunteer';
            }

            $res = $conn->query("SELECT COUNT(*) FROM provider WHERE id='$this->id'");

            if($res->fetchColumn() == 1) {
                $this->type = 'provider';
            }

            $res = $conn->query("SELECT COUNT(*) FROM seeker WHERE id='$this->id'");

            if($res->fetchColumn() == 1) {
                $this->type = 'seeker';
            }

            DB::disconnect($conn);
        }

        return $this->type;
    }

    /**
     * Save data of user to database
     */
    public function saveToDb() {
        require_once 'libs/DB.php';

        $conn = DB::connect();

        $conn->exec("UPDATE user SET username='$this->username', password = '$this->password', phone = '$this->phone', fullname='$this->fullName' WHERE id='$this->id'");

        DB::disconnect($conn);
    }


    /**
     * Create new instance of user
     * @param $username string The user name
     * @param $phone string The user phone
     * @param $password string The user password
     * @return User The user instance
     */
    public static function newUser($username, $phone, $password) {
        require_once 'libs/DB.php';

        $conn = DB::connect();

        $password = md5($password);

        $conn->exec("INSERT INTO user(username, phone, password) VALUES ('$username', '$phone', '$password')");
        $id = $conn->lastInsertId();

        DB::disconnect($conn);

        $user = new User($id);

        return $user;
    }

    /**
     * Authenticate the user
     * @param $username string The username
     * @param $password string The password(hashed)
     * @return int The user id (-1 if no user found)
     */
    public static function authenticateUser($username, $password) {

        $id = -1;

        require_once 'libs/DB.php';

        $conn = DB::connect();

        $res = $conn->query("SELECT * FROM user WHERE username='$username' AND password='$password'");

        while($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $id = $row["id"];
        }

        DB::disconnect($conn);

        return $id;
    }

    /**
     * The user id
     * @var string
     */
    private $id;

    /**
     * The user name
     * @var string
     */
    private $username;

    /**
     * The user phone number
     * @var string
     */
    private $phone;

    /**
     * The user password
     * @var string
     */
    private $password;

    /**
     * The user type
     * @var string
     */
    private $type;

    /**
     * The user's full name
     * @var string
     */
    private $fullName;
}
