<?php

/**
 * The Home Page Controller class
 * Class HomePageController
 */
class HomePageController extends Controller {

    /**
     * The Home page controller class constructor
     * @param \Slim\Slim $app The application instance
     * @param string $template The template name
     * @param string $redirect The redirect URI
     * @param boolean $protected Protected or not
     */
    public function __construct($app, $template = '', $redirect = '', $protected = false) {
        parent::__construct($app, $template, '', $protected);
    }

    /**
     * The main process method
     */
    protected function process() {

    }
}