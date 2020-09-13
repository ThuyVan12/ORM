<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\Task;
use MVC\Models\TakeResourceModel;

class tasksController extends Controller
{

    function index()
    {
        $task = new Task();
        $temp = new TakeResourceModel("tasks","id", $task);
        $d['tasks'] = $temp->getAll($task);
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {
            $task= new Task();
            $temp = new TakeResourceModel("tasks","id", $task);
            $task->setTitle($_POST["title"]);
            $task->setdDescription($_POST["description"]);
            $task->setCreated_at(date('Y-m-d H:i:s'));
            $task->setUpdate_at(date('Y-m-d H:i:s'));

            if ($temp->create($task))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {   

        $task= new Task();
        $temp = new TakeResourceModel("tasks","id", $task);
        $d["task"] = $temp->get($id);
        $task = $temp->show($id);
        if (isset($_POST["title"]))
        {    
            $task->setTitle($_POST["title"]);
            $task->setdDescription($_POST["description"]);
            if ($temp->edit($task))
            {    
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        $task = new Task();
        $temp = new TakeResourceModel("tasks","id", $task);
        if($temp->Del($id))
       {    
           header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
