<?php

/**
 * Model for Temporary job
 * Class TemporaryJob
 */
class TemporaryJob extends Job {

    /**
     * Constructor for temporary job
     * @param string $id The job id
     */
    public function __construct($id) {
        parent::__construct($id);

        // Assign duration
        require_once 'libs/DB.php';
        $conn  = DB::connect();
         
        $res = $conn->query("SELECT COUNT(*) FROM temporary_job WHERE id='$id'");

        if($res->fetchColumn() == 1) {

	        $res_1 = $conn->query("SELECT * FROM temporary_job WHERE id='$id'");

            while($row = $res_1->fetch(PDO::FETCH_ASSOC)) {
		        $this->duration = $row["duration"];
            }
        }
        else {
            die("Temporary job not found");
        }
    }

    /**
     * Add a new temporary job
     * @param string $title Job title
     * @param string $description Job description
     * @param string $postedById Job poster's id
     * @param int $positions Number of jobs
     * @param string $startTime Job start time
     * @param string $location Job location
     * @param int $duration Job duration
     * @param Array $skills Skills for job
     * @return Job The job instance
     */
    public static function newJob($title, $description, $postedById, $positions = 1, $startTime = '', $location = '', $duration = 0, $skills = Array()) {
        $job = parent::newJob($title, $description, $postedById, $positions, $startTime, $location, $skills);

        $jobId = $job->id();

        // Add duration to database
        require_once 'libs/DB.php';

        $conn = DB::connect();

        $conn->exec("INSERT INTO temporary_job(id, duration) VALUES('$jobId','$duration')");

        $job = new TemporaryJob($jobId);

        return $job;
    }

    /**
     * Getter function for job duration
     * @return int The job duration
     */
    public function duration() {
        return $this->duration;
    }

    /**
     * Setter function for duration
     * @param int $duration The job duration
     */
    public function setDuration($duration) {
        $this->duration = $duration;
    }

    /**
     * The job duration
     * @var int
     */
    private $duration;
}