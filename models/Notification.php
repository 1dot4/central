<?php

/**
 * Model for notification
 * Class Notification
 */
class Notification {

    /**
     * Constructor for Notification model
     * @param string $id The notification id
     */
    public function __construct($id) {
        $this->id = $id;

        require_once 'libs/DB.php';

        $conn = DB::connect();

        $res = $conn->query("SELECT COUNT(*) FROM notification WHERE id='$this->id'");

        if($res->fetchColumn() == 1) {
            $res_1 = $conn->query("SELECT * FROM notification WHERE id='$this->id'");

            while($row = $res_1->fetch(PDO::FETCH_ASSOC)) {
                $this->id = $row["id"];
                $this->description = $row["description"];
                $this->userId = $row["user_id"];
                $this->time = $row["time"];
                $this->seen = $row["seen"];
            }

        } else {
            die("Notification not found");
        }

    }

    /**
     * Create new instance of notification
     * @param string $userId The user id
     * @param string $description The description
     * @return Notification The instance
     */
    public static function newNotification($userId, $description) {
        require_once 'libs/DB.php';
        $conn = DB::connect();
        $description = mysql_real_escape_string($description);
        $conn->exec("INSERT INTO notification(user_id, description) VALUES('$userId', '$description')");
        $id = $conn->lastInsertId();
        $notification = new Notification($id);
        return $notification;
    }

    /**
     * Getter function for notification id
     * @return string Notification id
     */
    public function id() {
        return $this->id;
    }

    /**
     * Getter function for notification seen
     * @return string Notification seen
     */
    public function seen() {
        return $this->seen;
    }

    /**
     * Setter function for notification seen flag
     * @param $seen
     */
    public function setSeen($seen) {
        $this->seen = $seen;

        require_once 'libs/DB.php';

        $conn = DB::connect();
        $conn->exec("UPDATE notification SET seen='$seen' WHERE id='$this->id'");
    }

    /**
     * Getter function for notification userId
     * @return string Notification user id
     */
    public function userId() {
        return $this->userId;
    }

    /**
     * Getter function for notification string
     * @return string Notification description
     */
    public function description() {
        return $this->description;
    }

    /**
     * Getter function for notification time
     * @return string Notification time
     */
    public function time() {
        return $this->time;
    }

    /**
     * The notification id
     * @var string
     */
    private $id;

    /**
     * The notification user id
     * @var string
     */
    private $userId;

    /**
     * The notification description
     * @var string
     */
    private $description;

    /**
     * Notification seen/not seen flag
     * @var string
     */
    private $seen;

    /**
     * The notification time
     * @var string
     */
    private $time;
}