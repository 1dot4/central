<?php
/**
 * Interface for the Controllers
 * Class Controller
 */
class Controller {

    /**
     * Constructor for Controller
     * @param $app The application instance
     * @param $template The template name (in case of a view controller)
     * @param $redirect The redirect URI (in case of a controller without view)
     */
    public function __construct($app, $template = '', $redirect = '') {
        $this->app = $app;
        $this->template = $template;
        $this->data = array();

        // Set all the variables
        $this->setVars();

        // Render the template, if template present
        if($template != '') {
            $this->app->render($this->template, $this->data);
        }

        // Process everything and redirect to the URL. Doesn't have a view associated.
        else if($redirect != '') {
            $this->process();
            $this->app->redirect($redirect);
        }

        // None of the above scenarios
        else {
            die("Something wrong with the controller parameters!");
        }
    }

    /**
     * Set all the variables to be passed to the template. To be re-implemented.
     * Usually associated with a template.
     * @return mixed
     */
    protected function setVars() {}

    /**
     * Process everything needed to be done by the controller. To be re-implemented.
     * Usually does not have a view.
     * @return mixed
     */
    protected function process() {}

    /**
     * Set value to a key in page data
     * @param $key The key for the dictionary
     * @param $value The value corresponding to the key
     */
    protected function setVar($key, $value) {
        $this->data[$key] = $value;
    }

    /**
     * @var The app variable
     */
    private $app;

    /**
     * @var The data array
     */
    private $data;

    /**
     * @var The template
     */
    private $template;
}
