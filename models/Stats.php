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
     * Number of seekers registered by volunteer getting relevant jobs
     * @param $volunteerId
     * @return int Number of seekers getting relevant jobs
     */
    public static function seekersRelevantJobs($volunteerId) {
        require_once 'models/Volunteer.php';
        require_once 'models/Seeker.php';

        $volunteer = new Volunteer($volunteerId);
        $seekers = $volunteer->registeredSeekers();

        $val = 0;

        foreach($seekers as $seekerId) {
            $seeker = new Seeker($seekerId);
            if(sizeof($seeker->relevantJobs()) > 0) {
                $val += 1;
            }
        }

        return $val;
    }

    /**
     * Give skill demand for seeker
     * @param string $seekerId The seeker id
     * @return array The skill demand
     */
    public static function skillDemand($seekerId) {
        require_once 'libs/DB.php';
        require_once 'models/Seeker.php';

        $seeker = new Seeker($seekerId);
        $skills = $seeker->skills();

        $conn = DB::connect();

        $skillString = "";
        $skillDemands = "";
        foreach($skills as $skill) {
            $skillString .= "\"" . $skill . "\"" . ",";
            $res = $conn->query("SELECT COUNT(*) FROM job_skill WHERE skill_name='$skill'");
            $skillDemands .= "\"" . $res->fetchColumn() . "\"" . ",";
        }

        $result = Array(
            "skillString" => $skillString,
            "skillDemands" => $skillDemands
        );

        return $result;
    }

    /**
     * Get relevant jobs of Seeker
     * @param string $seekerId The seeker id
     * @return array The relevant jobs
     */
    public static function relevantJobs($seekerId) {
        require_once 'models/Seeker.php';
        $seeker = new Seeker($seekerId);

        return $seeker->relevantJobs();
    }

    public static function totalJobs() {
        require_once 'libs/DB.php';
        $conn = DB::connect();

        $res = $conn->query("SELECT COUNT(*) FROM job");
        return $res->fetchColumn();
    }

    public static function monthlyRegistration($volunteerId) {
        require_once 'libs/DB.php';
        $conn = DB::connect();

        $months = "";

        for($i = 11 ; $i >= 0 ; $i--) {
            $months .= "\"" . date("F", strtotime("-$i Months")) . "\",";
        }

        $result = Array(
            "months" => $months
        );

        return $result;
    }
}