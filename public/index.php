<?php

$debug = new \Phalcon\Debug();
$debug->listen();

/**
 * Read the configuration
 */
$config = require_once __DIR__ . "/../app/config/config.php";

/**
 * Read auto-loader
 */
require_once __DIR__ . "/../app/config/loader.php";

/**
 * Read services
 */
require_once __DIR__ . "/../app/config/services.php";


/**
 * Handle the request
 */
$application = new \Phalcon\Mvc\Application();
$application->setDI($di);
echo $application->handle()->getContent();
