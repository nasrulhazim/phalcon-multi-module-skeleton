<?php

use Phalcon\Mvc\Router;

$di->set('router', function () use ($modules, $defaultModule)  {

    $router = new Router(false);

    /**
     * Remove Extra Slashes
     * http://docs.phalconphp.com/en/latest/reference/routing.html#dealing-with-extra-trailing-slashes
     */
    $router->removeExtraSlashes(true);
   
	/**
	 * Setting Default Paths
	 * http://docs.phalconphp.com/en/latest/reference/routing.html#setting-default-paths
	 */
	if(!empty($defaultModule)) {
		$router->setDefaultModule($defaultModule);
	}

	/**
	 * Set Default Route
	 * http://docs.phalconphp.com/en/latest/reference/routing.html#setting-the-default-route
	 */
	$router->add('/', array(
	    'controller' => 'index',
	    'action' => 'index'
	));

	/**
	 * Set Not Found Page
	 * http://docs.phalconphp.com/en/latest/reference/routing.html#not-found-paths
	 * See [app.config.dispatcher.php]
	 */
	$router->notFound(array(
	    'controller' => 'error',
	    'action' => 'e404'
	));
	
	/**
	 * Generic Modules Route
	 * http://docs.phalconphp.com/en/latest/reference/routing.html#routing-to-modules
	 */
	$router->add('/:module/:controller/:action/:params', array(
	    'module' => 1,
	    'controller' => 2,
	    'action' => 3,
	    'params' => 4
	));
	
    return $router;
});
