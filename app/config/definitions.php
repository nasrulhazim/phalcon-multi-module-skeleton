<?php
define('MODULES_DIR', APP_ROOT . DS . 'modules' . DS);
define('PUBLIC_DIR', APP_ROOT . DS . 'public' . DS);
define('APP_DIR', APP_ROOT . DS . 'app' . DS);

define('APPLICATION_STAGE_DEVELOPMENT', 'development');
define('APPLICATION_STAGE_PRODUCTION', 'production');
define('APPLICATION_STAGE', (getenv('PHALCONEYE_STAGE') ? getenv('PHALCONEYE_STAGE') : APPLICATION_STAGE_PRODUCTION));

if (APPLICATION_STAGE == APPLICATION_STAGE_DEVELOPMENT) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $debug = new \Phalcon\Debug();
	$debug->listen();
}