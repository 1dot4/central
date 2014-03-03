<?php

/**
 * The Verify Execution Controller class
 * Class VerifyExecController
 */
class VerifyExecController extends Controller {

    /**
     * Constructor for the Verify Execution controller
     * @param \Slim\Slim $app The application instance
     * @param string $template The template name
     * @param string $redirect The redirect URI
     */
    public function __construct($app, $template = '', $redirect = '') {
        parent::__construct($app, '', $redirect);
    }

    /**
     * Main action process for the controller
     */
    protected function process() {

    }
}