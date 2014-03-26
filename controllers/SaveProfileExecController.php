<?php

/**
 * Profile Saver Exec Class Controller
 * Class SaveProfileExecController
 */
class SaveProfileExecController extends ExecController {

    /**
     * The main process method of the controller
     * @return mixed|void
     */
    function process() {
        $param = $this->param();

        require_once 'libs/Auth.php';
        $id = Auth::userId();
    }
}