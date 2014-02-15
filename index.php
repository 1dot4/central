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

/**
 * Login page for all users
 */
$app->get("/", function() use($app) {
    require 'controllers/LoginPageController.php';
    new LoginController($app, 'login.tpl.php');
});

/**
 * Login page for admin
 */
$app->get("/admin", function() use($app) {
    require 'controllers/AdminLoginPageController.php';
    new AdminLoginController($app, 'adminLogin.tpl.php');
});

/**
 * Login execution for admin
 */
$app->post("/admin/login.exec", function() use($app) {
    require 'controllers/AdminLoginExecController.php';
    new AdminLoginExecController($app, '', 'dashboard');
});

/**
 * Dashboard page for the admin
 */
$app->get("/admin/dashboard", function() use($app) {
    require 'controllers/AdminDashPageController.php';
    new AdminDashController($app, 'adminDash.tpl.php');
});

/* End routes */

// Run the Slim router
$app->run();
