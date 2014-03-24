<?php

/**
 * The Verify Execution Controller class
 * Class VerifyExecController
 */
class VerifyExecController extends ExecController {

    /**
     * Main action process for the controller
     */
    protected function process() {
        require_once 'libs/Session.php';
        require_once 'libs/Verifier.php';

        Session::start();

        $userId = Session::getVar('USER_ID');

        Session::end();

        $code = $this->app()->request->post('code');

        if(!(Verifier::verifyUser($userId, $code))) {
            Session::start();

            Session::setVar('ERR_MSG', 'The verification code is incorrect');

            Session::close();

            $this->setRedirectUri('verify');
            return;
        }
    }
}