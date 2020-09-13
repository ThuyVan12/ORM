<?php

namespace MVC\Core;

use ReflectionClass;

    class Model
    {
        public function getProperties()
        {
            $reflect = new ReflectionClass($this);
            $props   = $reflect->getProperties();
            $props_arr = array();

            foreach($props as $value)
            {
            array_push($props_arr,$value->getName());
            }
            return $props_arr;

        }

    }
