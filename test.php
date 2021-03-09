<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021-03-08
 * Time: 17:45
 */
require __DIR__.'/vendor/autoload.php';
\wenshizhengxin\error_monitor\error_monitor::setErrorHandle(
    new \wenshizhengxin\error_monitor\driver\LocalFile()
);
var_dump($a);
echo 456;
\wenshizhengxin\error_monitor\error_monitor::getErrorHandle()->err_index();