<?php

/**
 * The Forgot Password Execution Controller class
 * Class FPasswordExecController
 */
class FPasswordExecController extends ExecController {

    /**
     * Main action process for the controller
     */
    protected function process() {
        
        require_once 'libs/NewPasswordGenerator.php';
		
		$username = $this->app()->request()->post("username");
		NewPasswordGenerator::generateNewPassword($username);
		
    }
}