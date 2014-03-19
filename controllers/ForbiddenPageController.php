<?php

/**
 * Access Denied page controller
 * Class ForbiddenPageController
 */
class ForbiddenPageController extends Controller {

    /**
     * Constructor for the access denied page controller
     * @param \Slim\Slim $app The application instance
     * @param string $template The template name
     */
    public function __construct($app, $template = '') {
        parent::__construct($app, $template);
    }

    /**
     * The main process method for the controller
     */
    public function process() {
        $this->setVar('title', 'Please login to continue...');
        $this->setVar('errMsg', '');
    }
}