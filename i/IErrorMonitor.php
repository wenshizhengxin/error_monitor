<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021-03-08
 * Time: 10:11
 */
interface IErrorMonitor{
    public function write($lineNo,$content);
    public function read();
}