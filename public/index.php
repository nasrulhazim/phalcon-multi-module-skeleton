<?php

define('DS', str_replace('\\', '/', DIRECTORY_SEPARATOR));
define('APP_ROOT', str_replace('\\', '/', dirname(dirname(__FILE__))));
define('CONFIG_DIR', APP_ROOT . DS . 'app' . DS . 'config' . DS);

/**
 * Constants Definitions
 */
require_once(CONFIG_DIR ."definitions.php");

try {
    /**
     * Read the configuration
     */

    $config = require_once(CONFIG_DIR . "config.php");
    
    /**
     * Read the modules
     */
    $modules = require_once(CONFIG_DIR . "modules.php");

    /**
     * Set default module
     */
    $defaultModule = $config->application->defaultModule;
    
    /**
     * Read auto-loader
     */
    require_once(CONFIG_DIR . "loader.php");
    
    /**
     * Read services
     */
    require_once(CONFIG_DIR . "services.php");
    
    /**
     * Read routers
     */
    require_once(CONFIG_DIR . "routes.php");
    
    /**
     * Read dispatcher
     */
    require_once(CONFIG_DIR . "dispatcher.php");

    /**
     * Read database
     */
    require_once(CONFIG_DIR . "database.php");
    
    /**
     * Read application
     */
    require_once(CONFIG_DIR . "application.php");

} catch (Phalcon\Exception $e) {
    echo $e->getMessage();
} catch (PDOException $e){
    echo $e->getMessage();
}