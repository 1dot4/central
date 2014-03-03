<?php

/**
 * The Verify page controller class
 * Class VerifyPageController
 */
class VerifyPageController extends Controller {

    /**
     * Constructor for the verify page controller
     * @param \Slim\Slim $app The application instance
     * @param string $template The template name
     */
    public function __construct($app, $template = '') {
        parent::__construct($app, $template);
    }

    /**
     * Main action process of controller
     */
    protected function process() {

        $err = false;

        $this->setVar('title', 'Verify your mobile number');
    }
}