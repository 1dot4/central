<?php

/**
 * The stats class
 * Class Stats
 */
class Stats {

    /**
     * Get the interested seekers who have been registered by volunteer
     * @param string $volunteerId Volunteer id
     * @return Array Array of seeker ids
     */
    public static function interestedSeekers($volunteerId) {
        require_once 'libs/DB.php';
        $conn = DB::connect();

        $res = $conn->query("SELECT DISTINCT seeker_id FROM job_interest WHERE seeker_id IN(SELECT seeker_id FROM volunteer_registration WHERE volunteer_id='$volunteerId')");

        $seekers = Array();

        while($row = $res->fetch(PDO::FETCH_ASSOC)) {
            array_push($seekers, $row['seeker_id']);
        }

        return $seekers;
    }

    /**
     * Get favorited seekers registered by volunteer
     * @param $volunteerId
     * @return array
     */
    public static function favoritedSeekers($volunteerId) {
        require_once 'libs/DB.php';

        $conn = DB::connect();

        $res = $conn->query("SELECT DISTINCT favorited_id FROM favorite WHERE favorited_id IN(SELECT seeker_id FROM volunteer_registration WHERE volunteer_id='$volunteerId')");

        $seekers = Array();

        while($row = $res->fetch(PDO::FETCH_ASSOC)) {
            array_push($seekers, $row['favorited_id']);
        }

        return $seekers;
    }

    /**
     * Get the skill demand for a particular seeker
     * @param string $seekerId The seeker id
     */
    public static function skillDemand($seekerId) {
        require_once 'libs/DB.php';
    }
}