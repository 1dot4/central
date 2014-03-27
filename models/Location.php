<?php

/**
 * The Location model
 * Class Location
 */
class Location {

    /**
     * Save the location to database
     * @param $name string The location name
     */
    public static function saveToDb($name) {
        require_once 'libs/DB.php';

        $conn = DB::connect();

        if(!(Location::exists($name))) {
            $conn->exec("INSERT INTO location(name) VALUES('$name')");
        }
    }

    /**
     * Check whether the location exists in database or not
     * @param $name string The location name
     * @return bool Whether the location exists in database
     */
    public static function exists($name) {
        require_once 'libs/DB.php';

        $conn = DB::connect();

        $res = $conn->query("SELECT COUNT(*) FROM location WHERE name='$name'");

        $exists = !($res->fetchColumn() == 0);

        return $exists;
    }

}