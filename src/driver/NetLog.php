<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021-03-08
 * Time: 10:41
 */

namespace wenshi\error_monitor\driver;


use wenshi\error_monitor\i\IErrorMonitor;

class NetLog implements IErrorMonitor
{

    public function write($lineNo, $content)
    {
        // TODO: Implement write() method.
    }

    public function read()
    {
        // TODO: Implement read() method.
    }
}