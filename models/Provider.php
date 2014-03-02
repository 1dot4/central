<?php

/**
 * The Provider model
 * Class Provider
 */
class Provider extends User {

    /**
     * Constructor for the provider model
     * @param string $id The Provider's user id
     */
    public function __construct($id) {
        parent::__construct($id);
    }
} 