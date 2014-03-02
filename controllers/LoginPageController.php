<?php

/**
 * The Login page controller
 * Class LoginController
 */
class LoginPageController extends Controller {

    /**
     * Constructor for login controller
     * @param Slim   $app      The application instance
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
    }
}
