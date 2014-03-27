<?php

/**
 * The Organization model
 * Class Organization
 */
class Organization {

    /**
     * Save the organization to database
     * @param $name string The organization name
     */
    public static function saveToDb($name) {
        require_once 'libs/DB.php';

        $conn = DB::connect();

        if(!(Organization::exists($name))) {
            $conn->exec("INSERT INTO organization(name) VALUES('$name')");
        }

    }

    /**
     * Check whether the organization exists in database or not
     * @param $name string The organization name
     * @return bool Whether the organization exists in database
     */
    public static function exists($name) {
        require_once 'libs/DB.php';

        $conn = DB::connect();

        $res = $conn->query("SELECT COUNT(*) FROM organization WHERE name='$name'");

        $exists = !($res->fetchColumn() == 0);

        return $exists;
    }

}