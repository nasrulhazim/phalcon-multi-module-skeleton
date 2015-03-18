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
    'module' => array(
        'controllersDir' => MODULES_DIR . DS . 'frontend' . DS . 'controllers' . DS,
        'modelsDir'      => MODULES_DIR . DS . 'frontend' . DS . 'models' . DS,
        'viewsDir'       => MODULES_DIR . DS . 'frontend' . DS . 'views' . DS
    )
));
