<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021-03-08
 * Time: 16:35
 */

namespace wenshizhengxin\error_monitor\driver;


use wenshizhengxin\error_monitor\i\IErrorMonitor;

abstract class Driver implements IErrorMonitor
{

    abstract public function write($errno, $err_str, $err_file, $err_line, $err_context);

    abstract public function read($pathOrId);
}