<?php

namespace MVC\Models;

use MVC\Core\Model;

class Task extends Model 
{
    private $id;
    private $title;
    private $description;
    private $created_at;
    private $updated_at;
    
   function getId()
   {
       return $this->id;
   }

   function setId($id)
   {
       $this->id = $id;


   }

   function getTitle()
   {
       return $this->title;
   }

   function setTitle($title)
   {
       $this->title = $title;
       

   }

   function getDescription()
   {
       return $this->description;
   }

   function setdDescription($description)
   {
       $this->description = $description;
       

   }

   function getCreated_at()
   {
       return $this->created_at;
   }

   function setCreated_at($created_at)
   {
       $this->created_at = $created_at;
       

   }

   function getUpdate_at()
   {
       return $this->update_at;
   }

   function setUpdate_at($update_at)
   {
       $this->updated_at = $update_at;
       

   }
   public function __get($key)
   {
       return $this->$key;
   }
   public function __set($key, $value) 
   {
       $this->$key = $value;
   }
  

    
}