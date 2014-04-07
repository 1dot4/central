<?php

/**
 * The job interest stream controller class
 * Class JobInterestStreamController
 */
class JobInterestStreamController extends StreamController {

    /**
     * The main process method for the controller
     * @return mixed|void
     */
    protected function process() {
        require_once 'libs/Auth.php';

        $userId = Auth::userId();
        $jobId = $this->param();

        require_once 'libs/DB.php';

        $conn = DB::connect();

        $conn->exec("INSERT INTO job_interest(job_id, seeker_id) VALUES('$jobId', '$userId')");

        $record = Array(
            'success' => true
        );

        $this->addRecord($record);
    }
}