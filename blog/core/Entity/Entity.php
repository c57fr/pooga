<?php
/**
 * Created by PhpStorm.
 * User: Mhammed
 * Date: 13/11/2016
 * Time: 13:14
 */

namespace Core\Entity;


class Entity
{
    public function __get($key){
        if(empty($this->$key)){
            $method = 'get' . ucfirst(strtolower($key));
            $this->$key = $this->$method();
        }
        return $this->$key;
    }
}