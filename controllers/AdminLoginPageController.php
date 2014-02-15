<?php

/**
 * The admin login page controller
 * Class AdminLoginController
 */
class AdminLoginController extends Controller {
    /**
     * Constructor for admin login page
     * @param Slim   $app      The application instance
     * @param string $template The template name (for view controllers)
     * @param string $redirect The redirect URI (for controllers without view)
     */
    public function __construct($app, $template = '', $redirect = '') {
        parent::__construct($app, $template, $redirect);
    }

    /**
     * Set the variables for rendering in the template
     */
    protected function setVars() {
        $this->setVar('title', 'Login as site admin');
    }
}
