<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021-03-08
 * Time: 10:10
 */
namespace wenshizhengxin\error_monitor;

use wenshizhengxin\error_monitor\i\IErrorMonitor;

class error_monitor
{
    private static $driver = null;

    public static $config = [];

    public static function setErrorHandle(IErrorMonitor $diver_class)
    {
        self::$driver = $diver_class;
        if(self::$driver instanceof IErrorMonitor){
            set_error_handler([self::$driver, "write"]);
        }
    }

    public static function setConfig($config)
    {
        foreach ($config as $k => $v){
            self::$config[$k] = $v;
        }
    }
}