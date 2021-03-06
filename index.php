<?php
require_once 'libs/Slim/Slim.php';

require_once 'controllers/core/Controller.php';
require_once 'controllers/core/PageController.php';
require_once 'controllers/core/ExecController.php';
require_once 'controllers/core/StreamController.php';

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
 * Registration page for all users
 */
$app->get("/register", function() use($app) {
    require_once 'controllers/RegisterPageController.php';
    new RegisterPageController($app, 'Register.tpl.php', false);
});

/**
 * Forgot Password page for all users
 */
$app->get("/fpassword", function() use($app) {
    require_once 'controllers/FPasswordPageController.php';
    new FPasswordPageController($app, 'FPassword.tpl.php', false);
});

/**
 * Forgot Password execution
 */
$app->post("/fpassword.do", function() use($app) {
    require_once 'controllers/FPasswordExecController.php';
    new FPasswordExecController($app, './', false);
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
    new LoginExecController($app, 'home/index', false);
});

/**
 * The Home page
 */
$app->get("/home/:id", function($id) use($app) {
    require_once 'controllers/HomePageController.php';
    // Home.tpl.php is a dummy name
    new HomePageController($app, 'Home.tpl.php', true, $id);
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
    new RegisterSeekerExecController($app, 'home/index', true);
});

/**
 * Public profile page
 */
$app->get("/profile/:id", function($id) use($app) {
    require_once 'controllers/ProfilePageController.php';
    new ProfilePageController($app, 'Profile.tpl.php', true, $id);
});

/**
 * New job post
 */
$app->post("/job.post", function() use($app) {
    require_once 'controllers/JobPostExecController.php';
    new JobPostExecController($app, 'home/index', true);
});

/**
 * Delete job post
 */
$app->get("/job.delete/:id", function($id) use($app) {
    require_once 'controllers/JobDeleteStreamController.php';
    new JobDeleteStreamController($app, true, $id);
});

/**
 * The job interest toggle stream
 */
$app->get("/job.interested/:id", function($id) use($app) {
    require_once 'controllers/JobInterestStreamController.php';
    new JobInterestStreamController($app, true, $id);
});

/**
 * The job status toggle stream
 */
$app->get("/job.status/:id", function($id) use($app) {
    require_once 'controllers/JobStatusStreamController.php';
    new JobStatusStreamController($app, true, $id);
});

/**
 * The job edit page
 */
$app->get("/job.edit/:id", function($id) use($app) {
    require_once 'controllers/JobEditPageController.php';
    new JobEditPageController($app, 'JobEdit.tpl.php', true, $id);
});

/**
 * The job edit execution
 */
$app->post("/job.edit.do/:id", function($id) use($app) {
    require_once 'controllers/JobEditExecController.php';
    new JobEditExecController($app, '../home/index', true, $id);
});

/**
 * The job viewer
 */
$app->get("/job/:id", function($id) use($app) {
    require_once 'controllers/JobPageController.php';
    new JobPageController($app, 'Job.tpl.php', false, $id);
});

/**
 * The favorite stream
 */
$app->get("/favorite/:id", function($id) use($app) {
    require_once 'controllers/FavoriteStreamController.php';
    new FavoriteStreamController($app, true, $id);
});

/**
 * The users who favorited a user
 */
$app->get("/favorited/:id", function($id) use($app) {
    require_once 'controllers/FavoritedPageController.php';
    new FavoritedPageController($app, 'Favorited.tpl.php', true, $id);
});

/* End routes */

// Run the Slim router
$app->run();
