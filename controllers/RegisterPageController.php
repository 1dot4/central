<?php

/**
 * The Registration page controller
 * Class RegisterPageController
 */
class RegisterPageController extends Controller {

    /**
     * Constructor for registration page controller
     * @param Slim   $app      The application instance
     * @param string $template The template name (for view controllers)
     */
    public function __construct($app, $template = '') {
        parent::__construct($app, $template);
    }

    /**
     * Set the variables to be rendered in template
     */
    protected function setVars() {
        $this->setVar('title', 'Join Central');
    }
}
