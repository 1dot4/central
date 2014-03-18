<?php

/**
 * The Login page controller
 * Class LoginController
 */
class LoginPageController extends Controller {

    /**
     * Constructor for login controller
     * @param \Slim\Slim   $app      The application instance
     * @param string $template The template name (in case of view controller)
     */
    public function __construct($app, $template = '') {
        // Call the parent constructor
        parent::__construct($app, $template);
    }

    /**
     * Set the variables for rendering in template
     */
    protected function process() {
        $this->setVar('title', 'Login to Central');

        require_once 'libs/Session.php';

        Session::start();

        if(Session::existsVar("ERR_MSG")) {
            $this->setVar('errMsg', Session::getVar("ERR_MSG"));
        } else {
            $this->setVar('errMsg', "");
        }

        Session::end();
    }
}
