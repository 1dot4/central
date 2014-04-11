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

        // For jobs not posted by the logged in user
        if($job->postedById() != $userId) {
            $err = Array(
                'success' => false
            );
            $this->addRecord($err);
            return;
        }

        $job->delete();

        $record = Array(
            'success' => true
        );

        $this->addRecord($record);
    }
}