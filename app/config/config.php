<?php

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => '',
        'dbname'      => 'greentech_lccf',
        'charset'     => 'utf8',
    ),
    'application' => array(
        'controllersDir' => APP_DIR . 'controllers' . DS,
        'modelsDir'      => APP_DIR . 'models' . DS,
        'viewsDir'       => APP_DIR . 'views' . DS,
        'pluginsDir'     => APP_DIR . 'plugins' . DS,
        'libraryDir'     => APP_DIR . 'library' . DS,
        'cacheDir'       => APP_DIR . 'cache' . DS,
        'baseUri'        => '/lccf/',
        'defaultModule'  => ''
    )
));
