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
                $this->joinDate = $row["join_date"];
            }
        }
        // If there are zero or more than one entry
        else {
            die("User not found");
        }
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
     * Getter function for user's join date
     * @return string The user's join date
     */
    public function joinDate() {
        return $this->joinDate;
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
        $this->password = md5($password);
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

        $user = new User($id);

        return $user;
    }

    /**
     * Authenticate the user
     * @param $username string The username
     * @param $password string The password
     * @return int The user id (-1 if no user found)
     */
    public static function authenticateUser($username, $password) {

        $id = -1;

        require_once 'libs/DB.php';

        $conn = DB::connect();

        $password = md5($password);
        $res = $conn->query("SELECT * FROM user WHERE username='$username' AND password='$password'");

        while($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $id = $row["id"];
        }

        return $id;
    }

    /**
     * Check if the username is taken
     * @param string $username The username
     * @return bool If username exists
     */
    public static function usernameExists($username) {
        require_once 'libs/DB.php';

        $conn = DB::connect();

        $res = $conn->query("SELECT COUNT(*) FROM user WHERE username='$username'");

        $exists = $res->fetchColumn() != 0;

        return $exists;
    }

    /**
     * Get user id from username
     * @param string $username The username
     * @return int The user id
     */
    public static function idFromUserName($username) {
        require_once 'libs/DB.php';

        $id = -1;

        $conn = DB::connect();

        $res = $conn->query("SELECT id FROM user WHERE username='$username'");

        while($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $id = $row["id"];
        }

        return $id;
    }

    /**
     * Get user notifications
     * @return array Notifications array
     */
    public function notifications() {
        require_once 'libs/DB.php';

        $conn = DB::connect();

        $res = $conn->query("SELECT * FROM notification WHERE user_id='$this->id' ORDER BY time DESC");

        $notifications = Array();

        while($row = $res->fetch(PDO::FETCH_ASSOC)) {
            array_push($notifications, $row);
        }

        return $notifications;
    }

    /**
     * Favorite a user
     * @param string $id The user id to favorite
     */
    public function favorite($id) {
        require_once 'libs/DB.php';
        $conn = DB::connect();
        $conn->exec("INSERT INTO favorite(user_id, favorited_id) VALUES('$this->id', '$id')");
    }

    /**
     * Check if user has favorited another user
     * @param string $id The user id
     * @return bool If user has favorited user or not
     */
    public function hasFavorited($id) {
        require_once 'libs/DB.php';
        $conn = DB::connect();
        $res = $conn->query("SELECT COUNT(*) FROM favorite WHERE user_id='$this->id' AND favorited_id='$id'");
        $count = $res->fetchColumn();
        return ($count == 1);
    }

    /**
     * Return users favorites
     * @return array
     */
    public function favorites() {
        
        require_once 'libs/DB.php';
        $conn = DB::connect();
        $res = $conn->query("SELECT * FROM favorite WHERE user_id='$this->id'");

        $favorites = Array();

        while($row = $res->fetch(PDO::FETCH_ASSOC)) {
            array_push($favorites, $row);
        }

        return $favorites;
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

    /**
     * The user's join date
     * @var string
     */
    private $joinDate;
}
