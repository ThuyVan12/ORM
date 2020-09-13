<?php

namespace MVC;

//use MVC\Controllsers\tasksController;
use MVC\Core\Controller;

class Dispatcher
{

    private $request;

    public function dispatch()
    {
       // $request->controller = "tasks";
       // $request->action = "index";
      //  $request->params = [];
        $this->request = new Request(); ///mvc/
        
        Router::parse($this->request->url, $this->request);
        
        $controller = $this->loadController(); // =new tasksControler , index ,[]
     
        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        $name = $this->request->controller . "Controller";
        $name = "MVC\\Controllers\\".$name;
        $controller = new $name();
        return $controller;
    }

}
?>