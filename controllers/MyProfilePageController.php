<?php

/**
 * The My Profile page controller
 * Class MyProfilePageController
 */
class MyProfilePageController extends Controller {

    /**
     * Constructor for the My Profile page controller
     * @param \Slim\Slim $app The application instance
     * @param string $template The template name
     * @param string $redirect The redirect URI
     * @param bool $protected Protected or not
     */
    public function __construct($app, $template = '', $redirect = '', $protected = false) {
        parent::__construct($app, $template, '', $protected);
    }

    /**
     * The main process method of the controller
     */
    protected function process() {

    }
}