<?php

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => '',
        'dbname'      => 'phalcon_multi_module',
        'charset'     => 'utf8',
    ),
    'module' => array(
        'controllersDir' => MODULES_DIR . DS . '[module_name]' . DS . 'controllers' . DS,
        'modelsDir'      => MODULES_DIR . DS . '[module_name]' . DS . 'models' . DS,
        'viewsDir'       => MODULES_DIR . DS . '[module_name]' . DS . 'views' . DS
    )
));
