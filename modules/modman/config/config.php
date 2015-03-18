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
        'controllersDir' => MODULES_DIR . DS . 'modman' . DS . 'controllers' . DS,
        'modelsDir'      => MODULES_DIR . DS . 'modman' . DS . 'models' . DS,
        'viewsDir'       => MODULES_DIR . DS . 'modman' . DS . 'views' . DS
    )
));
