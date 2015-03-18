<?php

namespace Mod\Frontend;

use Phalcon\Loader,
    Phalcon\Mvc\Router,
    Phalcon\Mvc\View,
    Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter,
    Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public $module_name = 'frontend';
    /**
     * Register a specific autoloader for the module
     */
    public function registerAutoloaders()
    {

        $loader = new Loader();

        $loader->registerNamespaces(
            array(
                'Mod\Frontend\Controllers' => MODULES_DIR . $this->module_name . DS . 'controllers' . DS,
                'Mod\Frontend\Models'      => MODULES_DIR . $this->module_name . DS . 'models' . DS,
            )
        );

        $loader->register();
    }

    /**
     * Register specific services for the module
     */
    public function registerServices($di)
    {

        /**
         * Read configuration
         */
        $config = require_once(MODULES_DIR . $this->module_name . DS . "config" . DS . "config.php");

        //Registering a dispatcher
        $di->set('dispatcher', function () {
          $dispatcher = new \Phalcon\Mvc\Dispatcher();

          //Attach a event listener to the dispatcher
          $eventManager = new \Phalcon\Events\Manager();

          //$eventManager->attach('dispatch', new \Acl($this->module_name));

          $dispatcher->setEventsManager($eventManager);
          $dispatcher->setDefaultNamespace("Mod\Frontend\Controllers\\");

          return $dispatcher;
        });

        /**
         * Setting up the view component
         */
        $di->set('view', function() use ($config) {

          $view = new \Phalcon\Mvc\View();

          $view->setViewsDir($config->module->viewsDir);
          
          $view->setViewsDir(MODULES_DIR . $this->module_name . DS . 'views' . DS);
          $view->setLayoutsDir(MODULES_DIR . $this->module_name . DS . 'layouts' . DS);
          //$view->setTemplateAfter('index');

          $view->registerEngines(array(
              '.volt' => function($view, $di) {
              $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);
              $volt->setOptions(array(
                'compiledPath' => MODULES_DIR . $this->module_name . DS . 'views' . DS .'_compiled' . DS,
                'stat' => true,
                'compileAlways' => true  
              ));
              return $volt;
              }
          ));

          return $view;
        });
        
        /**
         * Database connection is created based in the parameters defined in the configuration file
         * http://stackoverflow.com/questions/22197678/how-to-connect-multiple-database-in-phalcon-framework
         */
        $di->set('db', function () use ($config) {
          return new DbAdapter(array(
            "host" => $config->database->host,
            "username" => $config->database->username,
            "password" => $config->database->password,
            "dbname" => $config->database->name
          ));
        });

    }

}