<?php

/**
 * Job Status Stream Controller
 * Class JobStatusStreamController
 */
class JobStatusStreamController extends StreamController {

    /**
     * Main process method for the controller
     * @return mixed|void
     */
    protected function process() {
        require_once 'libs/Auth.php';
        $userId = Auth::userId();

        require_once 'models/Job.php';
        $jobId = $this->param();

        $job = new Job($jobId);

        if($job->postedById() != $userId) {
            $err = Array(
                'success' => false
            );
            $this->addRecord($err);
            return;
        }

        $status = $job->status();

        if($status == 'open') {
            $job->setStatus('closed');
            $job->saveToDb();
            $record = Array(
                'success' => true,
                'status' => 'closed'
            );
            $this->addRecord($record);
        }

        if($status == 'closed') {
            $job->setStatus('open');
            $job->saveToDb();
            $record = Array(
                'success' => true,
                'status' => 'open'
            );
            $this->addRecord($record);
        }
    }
}