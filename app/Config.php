<?php
/**
 * Created by PhpStorm.
 * User: phili
 * Date: 02/01/2019
 * Time: 14:16
 */

namespace App;


class Config
{
    private $settings = [];
    private static $_instance;

    public function __construct()
    {
        $this->settings = require (dirname(__DIR__) . "\config\config.php");
    }

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Config();
        }
        return self::$_instance;
    }

    public function get($key)
    {
        if (!isset($this->settings[$key])) {
            return null;
        }
        return $this->settings[$key];
    }
}