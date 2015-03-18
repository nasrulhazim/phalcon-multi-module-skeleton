<?php

class ErrorController extends ControllerBase
{

    public function e404Action()
    {
    	$this->view->setVar('title','Warning! Page Not Found!');
    }

}

