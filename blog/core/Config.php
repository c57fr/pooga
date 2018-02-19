<?php
/**
 * Created by PhpStorm.
 * User: mhamm
 * Date: 12/11/2016
 * Time: 10:05
 */

namespace Core;


class Config
{
    private $settings = array();

    private static $_instance;


    private function __construct($file)
    {
        $this->settings = require $file;

    }

    public static function getInstance($file)
    {
        if (empty(self::$_instance)){
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }

    public function get($key)
    {
        if (!isset($this->settings[$key]))
        {
            return null;
        }
        return $this->settings[$key];
    }

}