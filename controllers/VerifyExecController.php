<?php

/**
 * The Verify Execution Controller class
 * Class VerifyExecController
 */
class VerifyExecController extends Controller {

    /**
     * Constructor for the Verify Execution controller
     * @param \Slim\Slim $app The application instance
     * @param string $template The template name
     * @param string $redirect The redirect URI
     */
    public function __construct($app, $template = '', $redirect = '') {
        parent::__construct($app, '', $redirect);
    }

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

            $this->redirect('verify');
            return;
        }
    }
}