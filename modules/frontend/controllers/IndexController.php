<?php

namespace LCCF\Frontend\Controllers; 

class IndexController extends ControllerBase
{

    public function indexAction()
    {
    	$this->view->setVar('title','LCCF - Module Controller');
    	$this->view->setVar('param','LCCF - Module Controller');
    }

}

