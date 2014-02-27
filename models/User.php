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
     * Save data of user to database
     */
    public function saveToDb() {
        require_once 'libs/DB.php';

        $conn = DB::connect();

        $conn->exec("UPDATE user SET username='$this->username', password = '$this->password', phone = '$this->phone' WHERE id='$this->id'");

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

        $conn->exec("INSERT INTO user(username, phone, password) VALUES ('$username', '$phone', '$password')");
        $id = $conn->lastInsertId();

        $user = new User($id);
        $user->setUsername($username);
        $user->setPhone($phone);
        $user->setPassword($password);

        DB::disconnect($conn);

        return $user;
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
}
