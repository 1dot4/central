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

        if(DB::$conn == null) {
            require_once 'var/config.php';

            // Try creating new database object instance
            try {
                DB::$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=central", DB_USER_NAME, DB_PASSWORD);
            }
            // If something goes SNAP
            catch(PDOException $ex) {
                die($ex->getMessage());
            }
        }

        return DB::$conn;
    }

    private static $conn;
}
