<?php

/**
 * Database utility class
 * Class DB
 */
class DB {

    /**
     * Connect to database
     * @return  PDO     The database connection object
     */
    public static function connect() {
        require_once 'var/config.php';

        // Try creating new database object instance
        try {
            $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=central", DB_USER_NAME, DB_PASSWORD);
            return $conn;
        }
        // If something goes SNAP
        catch(PDOException $ex) {
            die($ex->getMessage());
        }
    }


    /**
     * Disconnect the database connection
     * @param  PDO    $pdo The database connection object
     * @return void
     */
    public static function disconnect($pdo) {
        $pdo = null;
    }
}
