<?php

/**
 * The Registration wizard page controller
 * Class RegisterWizardPageController
 */
class RegisterWizardPageController extends Controller {

    /**
     * Constructor for registration wizard page controllers
     * @param Slim   $app      The application instance
     * @param string $template The template name (for view controllers)
     * @param string $redirect The reidrect URI (for controllers without views)
     * @param string $id       The parameter passed after URL
     */
    public function __construct($app, $template = '', $redirect = '', $id = '') {
        parent::__construct($app, $template, '', $id);
    }

    /**
     * Set the variables to render in template
     */
    protected function setVars() {

    }
}
