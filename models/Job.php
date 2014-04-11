<?php

/**
 * Model for Job
 * Class Job
 */
class Job {

    /**
     * Constructor for the job model
     * @param string $id The job id
     */
    public function __construct($id) {
        $this->id = $id;

        require_once 'libs/DB.php';
        $conn = DB::connect();

        $res = $conn->query("SELECT COUNT(*) FROM job WHERE id='$id'");

        if($res->fetchColumn() == 1) {

            $res_1 = $conn->query("SELECT * FROM job WHERE id='$id'");

            while($row = $res_1->fetch(PDO::FETCH_ASSOC)) {
		        $this->title = $row["title"];
                $this->description = $row["description"];
                $this->postedById = $row["posted_by_id"];
                $this->postDate = $row["post_date"];
                $this->positions = $row["positions"];
                $this->startTime = $row["start_time"];
                $this->location = $row["location_name"];
            }
        }
        else {
            die("Job not found");
        }

        $res = $conn->query("SELECT skill_name FROM job_skill WHERE job_id='$id'");

        $this->skills = Array();

        while($row = $res->fetch(PDO::FETCH_ASSOC)) {
            array_push($this->skills, $row["skill_name"]);
        }
    }

    /**
     * Add a new job
     * @param string $title Job title
     * @param string $description Job description
     * @param string $postedById Job poster's id
     * @param int $positions Number of jobs
     * @param string $startTime Job start time
     * @param string $location Job location
     * @param Array $skills Skills required for job
     * @return Job The job instance
     */
    public static function newJob($title, $description, $postedById, $positions = 1, $startTime = '', $location = '', $skills = Array()) {

        require_once 'models/Skill.php';

        $skillString = "";
        foreach($skills as $skill) {
            Skill::saveToDb($skill);
            $skillString .= $skill . " ";
        }

        require_once 'models/Location.php';
        Location::saveToDb($location);

        require_once 'libs/DB.php';

        $conn = DB::connect();

        $conn->exec("INSERT INTO job(title, description, posted_by_id, positions, start_time, location_name, skills) VALUES('$title', '$description', '$postedById','$positions','$startTime','$location', '$skillString')");

        $jobId = $conn->lastInsertId();

        // Add new skills
        foreach($skills as $skill) {
            $conn->exec("INSERT INTO job_skill(job_id, skill_name) VALUES('$jobId', '$skill')");
        }

        $job = new Job($jobId);

        return $job;
    }

    /**
     * Save data of job to database
     */
    public function saveToDb() {

        require_once 'models/Skill.php';

        foreach($this->skills as $skill) {
            Skill::saveToDb($skill);
        }

        require_once 'models/Location.php';
        Location::saveToDb($this->location);

        require_once 'libs/DB.php';

        $conn = DB::connect();

        $conn->exec("UPDATE job SET title= '$this->title', description='$this->description', posted_by_id='$this->postedById', positions='$this->positions', location_name='$this->location', start_time='$this->startTime' WHERE id='$this->id'");

        // Delete old skills
        $conn->exec("DELETE FROM job_skill WHERE job_id='$this->id'");

        // Add new skills
        foreach($this->skills as $skill) {
            $conn->exec("INSERT INTO job_skill(job_id, skill_name) VALUES('$this->id', '$skill')");
        }
    }

    /**
     * Getter function for job id
     * @return string Job id
     */
    public function id() {
        return $this->id;
    }

    /**
     * Getter function for posted by id
     * @return string Posted by id
     */
    public function postedById() {
        return $this->postedById;
    }

    /**
     * Setter function for Posted by id
     * @param string $postedById Posted by id
     */
    public function setPostedById($postedById) {
        $this->postedById = $postedById;
    }

    /**
     * Getter function for job description
     * @return string The job description
     */
    public function description() {
        return $this->description;
    }

    /**
     * Setter function for job description
     * @param $description Job description
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * Getter function for post date
     * @return string Job post date
     */
    public function postDate() {
        return $this->postDate;
    }

    /**
     * Getter function for the job title
     * @return string The job title
     */
    public function title() {
        return $this->title;
    }

    /**
     * Setter function for the job title
     * @param string $title The job title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * Getter function for the job location
     * @return string The job location
     */
    public function location() {
        return $this->location;
    }

    /**
     * Setter function for the job location
     * @param string $location The job location
     */
    public function setLocation($location) {
        $this->location = $location;
    }

    /**
     * Getter function for the start time
     * @return string The start time of job
     */
    public function startTime() {
        return $this->startTime;
    }

    /**
     * Setter function for the start date
     * @param string $startTime The job start date
     */
    public function setStartTime($startTime) {
        $this->startTime = $startTime;
    }

    /**
     * Getter function for number of positions
     * @return int Number of positions
     */
    public function positions() {
        return $this->positions;
    }

    /**
     * Setter function for number of positions
     * @param int $positions Number of positions
     */
    public function setPositions($positions) {
        $this->positions = $positions;
    }

    /**
     * Getter function for job skills
     * @return Array The skill set required for job
     */
    public function skills() {
        return $this->skills;
    }

    /**
     * Setter function for job skills
     * @param Array $skills The skill required for job
     */
    public function setSkills($skills) {
        $this->skills = $skills;
    }

    /**
     * Return type of job
     * @return string The type of job
     */
    public function type() {
        if($this->type == '') {
            require_once 'libs/DB.php';

            $conn = DB::connect();

            $res = $conn->query("SELECT COUNT(*) FROM temporary_job WHERE id='$this->id'");

            if($res->fetchColumn() == 1) {
                $this->type = 'temporary';
            }

            $res = $conn->query("SELECT COUNT(*) FROM permanent_job WHERE id='$this->id'");

            if($res->fetchColumn() == 1) {
                $this->type = 'permanent';
            }

        }

        return $this->type;

    }

    /**
     * Return if user is interested in job
     * @param string $userId The user id
     * @return bool Whether user is interested in job
     */
    public function hasUserInterest($userId) {
        require_once 'libs/DB.php';
        $conn = DB::connect();

        $res = $conn->query("SELECT COUNT(*) FROM job_interest WHERE job_id='$this->id' AND seeker_id='$userId'");

        if($res->fetchColumn() == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get jobs posted in a date range
     * @param string $from The start date
     * @param string $to The end date
     * @return array Array of jobs
     */
    public static function postedInDuration($from, $to) {
        require_once 'libs/DB.php';

        $conn = DB::connect();

        $res = $conn->query("SELECT * FROM job WHERE post_date>='$from' AND post_date<='$to' ");

        $jobs = Array();

        while($row = $res->fetch(PDO::FETCH_ASSOC)) {
            array_push($jobs, $row);
        }

        return $jobs;
    }

    /**
     * Search for a job
     * @param string $q Query terms
     * @param string $from From date
     * @param string $to To date
     * @param string $closed Status of job
     * @param string $type Type of job
     * @param string $userId
     * @return array Associative Array of jobs
     */
    public static function searchJobs($userId, $q = '', $from = '', $to = '', $closed = 'true', $type = 'all') {
        require_once 'libs/DB.php';

        $conn = DB::connect();

        $query = "SELECT *";

        if($q != '') {
            $query .= ", MATCH(title, description, location_name, skills) AGAINST('$q*' IN BOOLEAN MODE) AS RELEVANCE ";
        }

        $query .= "FROM job WHERE ";

        if($q != '') {
            $query .= "MATCH(title, description, location_name, skills) AGAINST('$q*' IN BOOLEAN MODE) AND ";
        }

        if($from != '') {
            $query .= "post_date > '$from' AND ";
        }

        if($to != '') {
            $query .= "post_date < '$to' AND ";

        }

        if($closed == 'false') {
            $query .= "status='open' AND ";
        }

        $user = new user($userId);

        if($user->type()=='provider') {
            $query .= "posted_by_id='$userId' ";
        }
        else {
            $query .= "1 ";
        }

        if($q != '') {
            $query .= "ORDER by RELEVANCE";
        }


        $res = $conn->query($query);

        $jobs = Array();

        while($row = $res->fetch(PDO::FETCH_ASSOC)) {
            array_push($jobs, $row);
        }

        return $jobs;
    }

    /**
     * The job id
     * @var string
     */
    private $id;

    /**
     * The job description
     * @var string
     */
    private $description;

    /**
     * The job poster id
     * @var string
     */
    private $postedById;

    /**
     * The job post date
     * @var string
     */
    private $postDate;

    /**
     * The job title
     * @var
     */
    private $title;

    /**
     * Number of positions for the job
     * @var int
     */
    private $positions;

    /**
     * The starting date for the job
     * @var string
     */
    private $startTime;

    /**
     * The location of the job
     * @var string
     */
    private $location;

    /**
     * Type of job
     * @var string
     */
    private $type;

    /**
     * Skills for the job
     * @var Array
     */
    private $skills;
}
