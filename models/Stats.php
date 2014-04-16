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
}