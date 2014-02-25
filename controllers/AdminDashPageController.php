<?php

/**
 * Class AdminDashController
 * Controller class for Admin dashboard page
 */
class AdminDashPageController extends Controller {

    /**
     * Constructor for admin dashboard page controller
     * @param Slim   $app      The application instance
     * @param string $template The name of the template (for view controller)
     */
    public function __construct($app, $template = '') {
        parent::__construct($app, $template);
    }

    /**
     * Set the variables for rendering in the admin dashboard template
     */
    protected function setVars() {
        $this->setVar('title', 'Admin Dashboard');
    }
}
