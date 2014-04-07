<?php

/**
 * The Stream Controller class
 * Class StreamController
 */
abstract class StreamController extends Controller {

    /**
     * Constructor for the Stream Controller
     * @param \Slim\Slim $app The application instance
     * @param bool $protected Protected or not
     * @param string $param The parameter at end of URL
     */
    public function __construct($app, $protected = false, $param = '') {

        // Initialize the json array
        $this->jsonArray = Array();

        // Call the parent constructor
        parent::__construct($app, $protected, $param);

        // Echo the json output
        echo json_encode($this->jsonArray);
    }

    /**
     * Add a record to the json array
     * @param Array $record The new record
     */
    protected function addRecord($record) {
        array_push($this->jsonArray, $record);
    }

    /**
     * Return the records
     * @return Array All the records
     */
    protected function records() {
        return $this->jsonArray;
    }

    /**
     * The Array containing all the data of the controller
     * @var Array
     */
    private $jsonArray;
}