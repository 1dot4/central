<?php

/**
 * Model for permanent job
 * Class PermanentJob
 */
class PermanentJob extends Job {

    public static function newJob($title, $description, $postedById, $positions = 1, $startTime = '', $location = '', $skills = Array()) {
        $job = parent::newJob($title, $description, $postedById, $positions, $startTime, $location, $skills);

        $jobId = $job->id();

        require_once 'libs/DB.php';

        $conn = DB::connect();
        $conn->exec("INSERT INTO permanent_job(id) VALUES('$jobId')");

        $job = new PermanentJob($jobId);

        return $job;
    }
}