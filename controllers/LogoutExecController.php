<?php

/**
 * The Logout execution class
 * Class LogoutExecController
 */
class LogoutExecController extends ExecController {

    /**
     * The main process method of the controller
     */
    public function process() {
        require_once 'libs/Session.php';
        Session::start();
        Session::end();
    }
}