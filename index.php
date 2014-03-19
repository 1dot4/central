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
    new LoginPageController($app, 'Login.tpl.php');
});

/**
 * Login page for admin
 */
$app->get("/admin", function() use($app) {
    require 'controllers/AdminLoginPageController.php';
    new AdminLoginPageController($app, 'AdminLogin.tpl.php');
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
    new AdminDashPageController($app, 'AdminDash.tpl.php');
});

/**
 * Registration page for all users
 */
$app->get("/register", function() use($app) {
    require 'controllers/RegisterPageController.php';
    new RegisterPageController($app, 'Register.tpl.php');
});

/**
 * Verification page
 */
$app->post("/verify", function() use($app) {
    require 'controllers/VerifyPageController.php';
    new VerifyPageController($app, 'Verify.tpl.php');
});

/**
 * Verification execution
 */
$app->post("/verify.do", function() use($app) {
    require 'controllers/VerifyExecController.php';
    new VerifyExecController($app, '', './');
});

/**
 * The Login execution
 */
$app->post("/login.do", function() use($app) {
    require 'controllers/LoginExecController.php';
    new LoginExecController($app, '', 'home');
});

/**
 * The Home page
 */
$app->get("/home", function() use($app) {
    require 'controllers/HomePageController.php';
    new HomePageController($app, 'Home.tpl.php', '', true);
});

/**
 * The Logout execution
 */
$app->get("/logout", function() use($app) {
    require 'controllers/LogoutExecController.php';
    new LogoutExecController($app, '', './', true);
});

/**
 * The access denied page
 */
$app->get("/access.denied", function() use($app) {
    require 'controllers/ForbiddenPageController.php';
    new ForbiddenPageController($app, 'Login.tpl.php');
});

/* End routes */

// Run the Slim router
$app->run();
