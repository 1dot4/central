<?php

/**
 * The admin login page controller
 * Class AdminLoginController
 */
class AdminLoginPageController extends Controller {
    /**
     * Constructor for admin login page
     * @param Slim   $app      The application instance
     * @param string $template The template name (for view controllers)
     */
    public function __construct($app, $template = '') {
        parent::__construct($app, $template);
    }

    /**
     * Set the variables for rendering in the template
     */
    protected function process() {
        $this->setVar('title', 'Login as Admin');
    }
}
