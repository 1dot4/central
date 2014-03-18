<?php

/**
 * The session utility library
 * Class Session
 */
class Session {

    /**
     * Start the session
     */
    public static function start() {
        session_start();
    }

    /**
     * Set the session variable
     * @param string    $key    The key of session variable
     * @param string    $value  The value of session variable
     */
    public static function setVar($key, $value) {
        $_SESSION[$key] = $value;
    }

    /**
     * Unset a session variable
     * @param  string    $key   The key of the session variable to be set
     * @return void
     */
    public static function unsetVar($key) {
        unset($_SESSION[$key]);
    }

    /**
     * Unset all the session variables
     */
    public static function unsetAllVars() {
        session_unset();
    }

    /**
     * Get the session variable
     * @param  string    $key   The key of the session variable
     * @return string           The value of the session variable
     */
    public static function getVar($key) {
        return $_SESSION[$key];
    }

    /**
     * Close the session write.
     */
    public static function close() {
        session_write_close();
    }

    /**
     * Destroy the session
     */
    public static function end() {
        session_destroy();
    }

    /**
     * Check if the session variable exists
     * @param  string   $key    The key of the session variable
     * @return boolean          Whether the session variable exists
     */
    public static function existsVar($key) {
        return isset($_SESSION[$key]);
    }
}
