<?php

/**
 * The Logout execution class
 * Class LogoutExecController
 */
class LogoutExecController extends Controller {

    /**
     * Constructor for the Logout execution class
     * @param \Slim\Slim $app The application instance
     * @param string $template The template name
     * @param string $redirect The redirect URI
     * @param bool $protected Protected or not
     */
    public function __construct($app, $template = '', $redirect = '', $protected = false) {
        parent::__construct($app, '', $redirect, $protected);
    }

    /**
     * The main process method of the controller
     */
    public function process() {
        require_once 'libs/Session.php';
        Session::start();
        Session::end();
    }
}