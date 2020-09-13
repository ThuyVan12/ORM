<?php

namespace MVC;

use MVC\Controllres\tasksController;

class Request
{
    public $url;

    public function __construct()
     {
        $this->url = $_SERVER["REQUEST_URI"];
        //echo  $_SERVER["REQUEST_URI"];
}
}

?>