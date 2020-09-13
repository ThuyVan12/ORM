<?php

namespace MVC\Models;

use MVC\Core\ResourceModel;

class TakeResourceModel extends ResourceModel
{
    public function __construct($table, $id, $model) 
    {
        $this->__init($table, $id, $model);
    }

    public function getAll($model)
    {    
        return $this->showAll();
    }

    public function get($id)
    {
        return $this->show($id);
    }

    public function Del($id)
    {
        return $this->delete($id);
    }
    
    public function edit($model)
    {
        return $this->save($model);
    }

    public function create($model)
    {
        return $this->save($model);
    }

    
    

}

