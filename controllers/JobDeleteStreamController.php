<?php

/**
 * The job delete stream controller
 * Class JobDeleteStreamController
 */
class JobDeleteStreamController extends StreamController {

    /**
     * The main process method of the controller
     * @return mixed|void
     */
    protected function process(){
        require_once 'libs/Auth.php';

        $userId = Auth::userId();

        $jobId = $this->param();

        require_once 'models/Job.php';

        $job = new Job($jobId);
        $jobType = $job->type();

        // For jobs not posted by the logged in user
        if($job->postedById() != $userId) {
            $err = Array(
                'success' => false
            );
            $this->addRecord($err);
        }

        require_once 'libs/DB.php';

        $conn = DB::connect();

        $conn->exec("DELETE FROM job_skill WHERE job_id='$jobId'");
        $conn->exec("DELETE FROM job_interest WHERE job_id='$jobId'");

        if($jobType == 'temporary') {
            $conn->exec("DELETE FROM temporary_job WHERE id='$jobId'");
        }

        if($jobType == 'permanent') {
            $conn->exec("DELETE FROM permanent_job WHERE id='$jobId'");
        }

        $conn->exec("DELETE FROM job WHERE id='$jobId'");

        $record = Array(
            'success' => true
        );

        $this->addRecord($record);
    }
}