<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021-03-08
 * Time: 10:11
 */
namespace wenshizhengxin\error_monitor\i;
interface IErrorMonitor{
    public function write($errno , $err_str , $err_file, $err_line, $err_context);
    public function read($pathOrId);
}