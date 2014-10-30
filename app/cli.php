<?php

    use Phalcon\CLI\Console as ConsoleApp;

 define('VERSION', '1.0.0');
 define('CLI', true);


 // Define path to application directory
 defined('APPLICATION_PATH')
 || define('APPLICATION_PATH', realpath(dirname(__FILE__)));



 $config = require_once APPLICATION_PATH . '/config/config.php';
 require_once APPLICATION_PATH . '/config/loader.php';
 require_once APPLICATION_PATH . '/config/services_cli.php';


 //Create a console application
 $console = new ConsoleApp();
 $console->setDI($di);

 /**
 * Process the console arguments
 */
 $arguments = array();
 $params = array();

 foreach($argv as $k => $arg) {
     if($k == 1) {
         $arguments['task'] = $arg;
     } elseif($k == 2) {
         $arguments['action'] = $arg;
     } elseif($k >= 3) {
        $params[] = $arg;
     }
 }
 if(count($params) > 0) {
     $arguments['params'] = $params;
 }

 $di->setShared('console', $console);
 // define global constants for the current task and action
 define('CURRENT_TASK', (isset($argv[1]) ? $argv[1] : null));
 define('CURRENT_ACTION', (isset($argv[2]) ? $argv[2] : null));

 try {
     // handle incoming arguments
     $console->handle($arguments);
 }
 catch (\Exception $e) {
     echo $e->getMessage();
     exit(255);
 }