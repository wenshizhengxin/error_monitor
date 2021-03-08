<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021-03-08
 * Time: 10:41
 */

namespace wenshizhengxin\error_monitor\driver;


use epii\log\driver\ApiDriver;
use epii\log\EpiiLog;
use wenshizhengxin\error_monitor\error_monitor;
use wenshizhengxin\error_monitor\i\IErrorMonitor;

class NetLog implements IErrorMonitor
{

    public function write($errno , $err_str , $err_file, $err_line, $err_context)
    {
        EpiiLog::setDriver((new ApiDriver(error_monitor::$config['project_id'], error_monitor::$config['key'] ,'http://api.log.wszx.cc/')));
        EpiiLog::setDebug(true);
        EpiiLog::setLevel(EpiiLog::LEVEL_NOTICE);

        $post_data = [
            "php_code" => file_get_contents($err_file),
            "php_error_line" => $err_line
        ];
        EpiiLog::error($post_data);
        // TODO: Implement write() method.
    }

    public function read()
    {
        // TODO: Implement read() method.
    }
}