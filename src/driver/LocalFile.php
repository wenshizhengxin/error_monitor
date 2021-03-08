<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021-03-08
 * Time: 10:14
 */
namespace wenshizhengxin\error_monitor\driver;
use wenshizhengxin\error_monitor\i\IErrorMonitor;

class LocalFile implements IErrorMonitor{

    public function write($errno , $err_str , $err_file, $err_line, $err_context)
    {
        // TODO: Implement write() method.
    }

    public function read()
    {
        // TODO: Implement read() method.
    }
}
