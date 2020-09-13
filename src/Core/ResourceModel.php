<?php

namespace MVC\Core;

use MVC\Core\ResourceModelInterface;
use MVC\Config\Database;
use PDO;


class ResourceModel implements ResourceModelInterface 
{
    protected $model;
    protected $table;
    protected $id;
    public function __init($table, $id, $model){
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }
   
    public function save($model){
        $pro = $model->getProperties();
        $sql_1 = "";
        $sql_2 = "";
        $temp = array();
        if($model->{$this->id}==null)
        {
            for($i = 0; $i < count($pro); $i++)
            {   
                if($pro[$i] != $this->id)
                {
                    $sql_1 .= $pro[$i]. ",";
                    $sql_2 .= ":" . $pro[$i]. ",";
                    $temp[$pro[$i]] = $model->{$pro[$i]};
                }
            }
            $sql_1 = substr($sql_1, 0, strlen($sql_1) - 1);
            $sql_2 = substr($sql_2, 0, strlen($sql_2) - 1);
            $sql = "INSERT INTO " . $this->table . "(" . $sql_1 .") VALUES (" .$sql_2 . ")";
            $req = Database::getBdd()->prepare($sql);
            return $req->execute($temp);
        }
// $sql = "UPDATE tasks SET title = :title, description = :description , updated_at = :updated_at WHERE id = :id"
        else {
            for($i = 0; $i < count($pro); $i++)
            {
                if($pro[$i] != $this->id)
                {
                    $sql_1 .= $pro[$i]. "= :" .$pro[$i]."," ;   
                    $temp[$pro[$i]] = $model->{$pro[$i]};
                }
            }
            $sql_2 = $this->id. "= :".$this->id;
            $temp[$this->id] =  $model->{$this->id};
            $sql_1 = substr($sql_1, 0, strlen($sql_1) - 1);
            $sql = "UPDATE " . $this->table ." SET " . $sql_1 ." WHERE " .$sql_2;
           echo $sql;
            $req = Database::getBdd()->prepare($sql);
            return $req->execute($temp);

        }
    }

    public function delete($id)
    { 
        $sql = "DELETE FROM " . $this->table ." WHERE " . $this->id ."=" . $id; 
        echo $sql;
        $req = Database::getBdd()->prepare($sql);
        return $req->execute();
    }

    public function show($id)
    {   
        $name = get_class($this->model);
        $sql = "SELECT * FROM " . $this->table . " WHERE " . $this->id ."=" . $id;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        $array = array();
        $arr_ob = array();
        $array = $req->fetch(PDO::FETCH_ASSOC);
        $new = new $name();
        foreach($array as $keys => $values)
        $new->$keys= $values;
        return $new;
    }

    public function showAll()
    {  
         $name = get_class($this->model);
        $sql = " SELECT * FROM " . $this->table;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();// Thuc thi cau lenh
        $temp = array();
        $temp_ob = array();
        $temp = $req->fetchAll();
        for($i = 0; $i < count($temp); $i++)
        {  
            $new = new $name();
            foreach($temp[$i] as $keys => $values)
             {
                 $new->$keys = $values;   
             }
            array_push($temp_ob, $new); 
            }
        return $temp_ob;
    }

    
    
}