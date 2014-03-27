<?php
require_once 'libs/Slim/Slim.php';

require_once 'controllers/core/Controller.php';
require_once 'controllers/core/PageController.php';
require_once 'controllers/core/ExecController.php';

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
    require_once 'controllers/LoginPageController.php';
    new LoginPageController($app, 'Login.tpl.php', false);
});

/**
 * Login page for admin
 */
$app->get("/admin", function() use($app) {
    require_once 'controllers/AdminLoginPageController.php';
    new AdminLoginPageController($app, 'AdminLogin.tpl.php', false);
});

/**
 * Login execution for admin
 */
$app->post("/admin/login.exec", function() use($app) {
    require_once 'controllers/AdminLoginExecController.php';
    new AdminLoginExecController($app, 'dashboard', false);
});

/**
 * Dashboard page for the admin
 */
$app->get("/admin/dashboard", function() use($app) {
    require_once 'controllers/AdminDashPageController.php';
    new AdminDashPageController($app, 'AdminDash.tpl.php', false);
});

/**
 * Registration page for all users
 */
$app->get("/register", function() use($app) {
    require_once 'controllers/RegisterPageController.php';
    new RegisterPageController($app, 'Register.tpl.php', false);
});

/**
 * Verification page
 */
$app->post("/verify", function() use($app) {
    require_once 'controllers/VerifyPageController.php';
    new VerifyPageController($app, 'Verify.tpl.php', false);
});

/**
 * Verification execution
 */
$app->post("/verify.do", function() use($app) {
    require_once 'controllers/VerifyExecController.php';
    new VerifyExecController($app, './', false);
});

/**
 * The Login execution
 */
$app->post("/login.do", function() use($app) {
    require_once 'controllers/LoginExecController.php';
    new LoginExecController($app, 'home', false);
});

/**
 * The Home page
 */
$app->get("/home", function() use($app) {
    require_once 'controllers/HomePageController.php';
    // Home.tpl.php is a dummy name
    new HomePageController($app, 'Home.tpl.php', true);
});

/**
 * The Logout execution
 */
$app->get("/logout", function() use($app) {
    require_once 'controllers/LogoutExecController.php';
    new LogoutExecController($app, './', true);
});

/**
 * The access denied page
 */
$app->get("/access.denied", function() use($app) {
    require_once 'controllers/ForbiddenPageController.php';
    new ForbiddenPageController($app, 'Login.tpl.php', false);
});

/**
 * My profile page
 */
$app->get("/myprofile", function() use($app) {
    require_once 'controllers/MyProfilePageController.php';
    // MyProfile.tpl.php is a dummy template name
    new MyProfilePageController($app, 'MyProfile.tpl.php', true);
});

/**
 * Profile page exec page
 */
$app->post("/profile.save/:id", function($id) use($app) {
    require_once 'controllers/SaveProfileExecController.php';
    new SaveProfileExecController($app, '../myprofile', true, $id);
});

/**
 * Seeker register exec
 */
$app->post("/seeker.register", function() use($app) {
    require_once 'controllers/RegisterSeekerExecController.php';
    new RegisterSeekerExecController($app, 'home', true);
});

/**
 * Public profile page
 */
$app->get("/profile/:id", function($id) use($app) {
    require_once 'controllers/ProfilePageController.php';
    new ProfilePageController($app, 'Profile.tpl.php', true, $id);
});

/* End routes */

// Run the Slim router
$app->run();
