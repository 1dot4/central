<?php

/**
 * The Login page controller
 * Class LoginController
 */
class LoginController extends Controller {

    /**
     * Constructor for login controller
     * @param Slim   $app      The application instance
     * @param string $template The template name (in case of view controller)
     * @param string $redirect The redirect URI (in case of controller without view)
     */
    public function __construct($app, $template = '', $redirect = '') {
        // Call the parent constructor
        parent::__construct($app, $template, $redirect);
    }

    /**
     * Set the variables for rendering in template
     */
    protected function setVars() {
        $this->setVar('title', 'Login to Job Portal');
    }
}
