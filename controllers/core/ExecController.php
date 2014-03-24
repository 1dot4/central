<?php

/**
 * The Exec Controller
 * Class ExecController
 */
abstract class ExecController extends Controller {

    /**
     * Constructor for the Exec Controller
     * @param \Slim\Slim $app The application instance
     * @param string $redirect The redirect URI
     * @param bool $protected Protected or not
     * @param string $param Extra parameter at end of URL
     */
    public function __construct($app, $redirect = '', $protected = false, $param = '') {
        parent::__construct($app, $protected, $param);
        $this->app()->redirect($redirect);
    }

}