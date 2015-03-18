<?php

use Phalcon\Mvc\Application;

/**
 * Handle the request
 */
$application = new \Phalcon\Mvc\Application($di);

/**
 * Register application modules
 */
if(isset($modules) && !empty($modules)) {
	$application->registerModules($modules);
}

echo $application->handle()->getContent();