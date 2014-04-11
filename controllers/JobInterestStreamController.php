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
        $interested = $this->app()->request->get("value");

        require_once 'libs/DB.php';

        $conn = DB::connect();

        if($interested == 'true') {
            $conn->exec("INSERT INTO job_interest(job_id, seeker_id) VALUES('$jobId', '$userId')");
        } else {
            $conn->exec("DELETE FROM job_interest WHERE job_id='$jobId' AND seeker_id='$userId'");
        }

        $record = Array(
            'success' => true
        );

        $this->addRecord($record);
    }
}