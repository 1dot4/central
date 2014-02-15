<?php

/**
 * The Login page controller
 * Class LoginController
 */
class LoginController extends Controller {
    /**
     * Constructor for Login Controller
     * @param $app The application instance
     * @param $template The template name (in case of view controller)
     * @param $redirect The redirect URI (in case of controller without view)
     */
    public function __construct($app, $template = '', $redirect = '') {
        // Call the parent constructor
        parent::__construct($app, $template, $redirect);
    }

    /**
     * Set the variables for rendering in template
     * @return mixed|void
     */
    protected function setVars() {
        $this->setVar('title', 'Login to Job Portal');
    }
}
