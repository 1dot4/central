<?php

/**
 * Class AdminDashController
 * Controller class for Admin dashboard page
 */
class AdminDashController extends Controller {

    /**
     * Constructor for admin dashboard page controller
     * @param Slim   $app      The application instance
     * @param string $template The name of the template (for view controller)
     * @param string $redirect The redirect URI (for controllers without view)
     */
    public function __construct($app, $template = '', $redirect = '') {
        parent::__construct($app, $template, $redirect);
    }

    /**
     * Set the variables for rendering in the admin dashboard template
     */
    protected function setVars() {
        $this->setVar('title', 'Admin Dashboard');
    }
}
