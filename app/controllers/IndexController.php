<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
    	$this->view->setVar('title','LCCF App Controller');
    	$this->assets->addCss('css/_Index_index.css');
    	$this->assets->addJs('js/_Index_index.js'); // module_controller_action.js
    }

}

