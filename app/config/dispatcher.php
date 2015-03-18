<?php

use Phalcon\Mvc\Dispatcher as PhDispatcher;

/**
 * Setting up Page 404
 * http://stackoverflow.com/questions/14071261/how-to-setup-a-404-page-in-phalcon
 */
// $di->set(
//     'dispatcher',
//     function() use ($di) {

//         $evManager = $di->getShared('eventsManager');

//         $evManager->attach(
//             "dispatch:beforeException",
//             function($event, $dispatcher, $exception)
//             {
//                 switch ($exception->getCode()) {
//                     case PhDispatcher::EXCEPTION_HANDLER_NOT_FOUND:
//                     case PhDispatcher::EXCEPTION_ACTION_NOT_FOUND:
//                         $dispatcher->forward(
//                             array(
//                                 'controller' => 'Error',
//                                 'action'     => 'e404',
//                             )
//                         );
//                         return false;
//                 }
//             }
//         );

//         $dispatcher = new PhDispatcher();
//         $dispatcher->setEventsManager($evManager);
//         return $dispatcher;
//     },
//     true
// );