<?php

/**
 * Services are globally registered in this file
 */
use Phalcon\Mvc\Url as UrlResolver,
    Phalcon\DI\FactoryDefault,
    Phalcon\Session\Adapter\Files as SessionAdapter;

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di['url'] = function() use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);
    return $url;
};

/**
 * Start the session the first time some component request the session service
 */
$di['session'] = function() {
    $session = new SessionAdapter();
    $session->start();
    return $session;
};

/**
 *  Prevent CSRF
 */
$di->setShared('session', function() {
    $session = new Phalcon\Session\Adapter\Files();
    $session->start();
    return $session;
});

/**
 *  Set Flash
 */
$di->set('flash', function() {
    return new Phalcon\Flash\Session(array(
            'error' => 'alert alert-dismissable alert-danger',
            'success' => 'alert alert-dismissable alert-success',
            'notice' => 'alert alert-dismissable alert-info',
            'warning' => 'alert alert-dismissable alert-warning',
        ));
});

$di->set('view', function() use ($config) {

    $view = new \Phalcon\Mvc\View();

    $view->setViewsDir($config->application->viewsDir);
    
    $view->setMainView('index');

    $view->registerEngines(array(
        '.volt' => function($view, $di) {
        $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);
        $volt->setOptions(array(
          'compiledPath' => APP_DIR . 'views' . DS .'_compiled' . DS,
          'stat' => true,
          'compileAlways' => true  
        ));
        return $volt;
        }
    ));

    return $view;
});