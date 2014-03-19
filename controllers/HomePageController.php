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
     */
    public function __construct($app, $template = '') {
        parent::__construct($app, $template);
    }

    /**
     * The main process method
     */
    protected function process() {

    }
}