<?php
require 'libs/Slim/Slim.php';
require 'controllers/Controller.php';

\Slim\Slim::registerAutoloader();

// Create an instance of Slim router
$app = new \Slim\Slim(
    array(
        'templates.path' => './templates'
    )
);

/* Begin routes */

$app->get("/", function() use($app) {
    require 'controllers/LoginController.php';
    new LoginController($app, 'login.tpl.php');
});

/* End routes */

// Run the Slim router
$app->run();
