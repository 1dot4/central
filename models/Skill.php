<?php

/**
 * The Skill model
 * Class Skill
 */
class Skill {

    /**
     * Save the skill to database
     * @param $name string The skill name
     */
    public static function saveToDb($name) {
        require_once 'libs/DB.php';

        $conn = DB::connect();

        if(!(Skill::exists($name))) {
            $conn->exec("INSERT INTO skill(name) VALUES('$name')");
        }
    }

    /**
     * Check whether the skill exists in database or not
     * @param $name string The skill name
     * @return bool Whether the skill exists in database
     */
    public static function exists($name) {
        require_once 'libs/DB.php';

        $conn = DB::connect();

        $res = $conn->query("SELECT COUNT(*) FROM skill WHERE name='$name'");

        $exists = !($res->fetchColumn() == 0);

        return $exists;
    }

}