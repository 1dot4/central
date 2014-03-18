<?php

/**
 * The Login execution controller class
 * Class LoginExecController
 */
class LoginExecController extends Controller {
    /**
     * Constructor for the login execution controller class
     * @param \Slim\Slim $app The application instance
     * @param string $template The template name.
     * @param string $redirect The redirect URI
     */
    public function __construct($app, $template = '', $redirect = '') {
        parent::__construct($app, '', $redirect);
    }

    /**
     * Main process method of the controller
     */
    protected function process() {

    }
}