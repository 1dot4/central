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

        // If this is the first page of registration wizard
        if($this->getVar('id') == '1') {
            $registrantType = $this->app()->request->post('registrant');
            $title = "Enter your details as a ";

            // Set form template according to registrant type
            switch ($registrantType) {
                case 'volunteer':
                    $title .= "Volunteer";
                    $formTemplate = file_get_contents("templates/VolunteerRegisterForm.tpl.php");
                    break;

                case 'job-seeker':
                    $title .= "Job Seeker";
                    $formTemplate = file_get_contents("templates/JobSeekerRegisterForm.tpl.php");
                    break;

                case 'job-provider':
                    $title .= "Job Provider";
                    $formTemplate = file_get_contents("templates/JobProviderRegisterForm.tpl.php");
                    break;

                default:
                    $title = "";
                    $formTemplate = "";
                    break;
            }

            $this->setVar('title', $title);
            $this->setVar('registrantType', $registrantType);
            $this->setVar('formTemplate', $formTemplate);
        }

    }
}
