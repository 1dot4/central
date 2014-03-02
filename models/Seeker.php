<?php

/**
 * The Seeker model
 * Class Seeker
 */
class Seeker extends User {

    /**
     * Constructor for the Seeker model
     * @param string $id The Seeker's user id
     */
    public function __construct($id) {
        parent::__construct($id);
    }
} 