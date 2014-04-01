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
	
        require_once 'libs/newPasswordGenerator.php';


        $userId = Session::getVar('USER_ID');

        $nPassword = $this->app()->request->post('nPassword');

        if(!(Verifier::verifyUser($userId, $code))) {
            Session::start();

            Session::setVar('ERR_MSG', 'The verification code is incorrect');

            Session::close();

            $this->setRedirectUri('verify');
            return;
        }
    }
}