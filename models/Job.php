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
                $this->startTime = $row["start_date"];
                $this->location = $row["location_name"];
            }
        }
        else {
            die("Job not found");
        }
    }


    public static function newJob($title, $description, $postedById, $positions = 1, $startTime = '', $location = '') {
        require_once 'libs/DB.php';

        $conn = DB::connect();

        $conn->exec("INSERT INTO job(title, description, posted_by_id, positions, start_date, location_name) VALUES('$title', '$description', '$postedById','$positions','$startTime','$location')");

        $jobId = $conn->lastInsertId();

        $job = new Job($jobId);

        return $job;
    }

    /**
     * Save data of job to database
     */
    public function saveToDb() {
        require_once 'libs/DB.php';

        $conn = DB::connect();

        $conn->exec("UPDATE job SET title= '$this->title', description='$this->description', posted_by_id='$this->postedById', positions='$this->positions', location_name='$this->location', start_time='$this->startTime' WHERE id='$this->id'");
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
    public function title() {
      return $this->title;
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
     * @var
     */
    private $positions;

    /**
     * The starting date for the job
     * @var
     */
    private $startTime;

    /**
     * The location of the job
     * @var
     */
    private $location;
}