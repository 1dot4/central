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

    /**
     * Get total jobs
     * @return string The total jobs
     */
    public static function totalJobs() {
        require_once 'libs/DB.php';
        $conn = DB::connect();

        $res = $conn->query("SELECT COUNT(*) FROM job");
        return $res->fetchColumn();
    }

    /**
     * Get monthly registrations for last 12 months
     * @param string $volunteerId The volunteer id
     * @return array The registration for last 12 months
     */
    public static function monthlyRegistration($volunteerId) {
        require_once 'libs/DB.php';
        $conn = DB::connect();

        $months = "";
        $reg = "";
        for($i = 11 ; $i >= 0 ; $i--) {
            $months .= "\"" . date("F", strtotime("-$i Months")) . "\",";
            $res = $conn->query("SELECT COUNT(*) FROM volunteer_registration WHERE MONTH(registration_time)=MONTH(NOW())-$i AND volunteer_id='$volunteerId'");
            $reg .= "\"" . $res->fetchColumn() . "\",";
        }

        $result = Array(
            "months" => $months,
            "registrations" => $reg
        );

        return $result;
    }

    /**
     * Get job postings by provider
     * @param string $providerId The provider id
     * @return array Jobs by provider
     */
    public static function jobPostings($providerId) {
        require_once 'models/Provider.php';
        $provider = new Provider($providerId);
        return $provider->jobPostings();
    }

    /**
     * Number of jobs posted by provider which has some interest
     * @param string $providerId The provider id
     * @return int Number of job posting with interest
     */
    public static function interestedJobPostings($providerId) {
        require_once 'models/Provider.php';
        $provider = new Provider($providerId);
        $jobs = $provider->jobPostings();

        require_once 'models/Job.php';

        $cnt = 0;
        foreach($jobs as $job) {
            $jobInstance = new Job($job["id"]);
            if(sizeof($jobInstance->interestedSeekers()) > 0) {
                $cnt += 1;
            }
        }
        return $cnt;
    }
}