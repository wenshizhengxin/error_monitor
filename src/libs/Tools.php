<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021-03-09
 * Time: 9:10
 */

namespace wenshizhengxin\error_monitor\libs;


class Tools
{
    // 获取项目根目录
    public static function get_web_root(){
        //DOCUMENT_ROOT
        if(isset($_SERVER['DOCUMENT_ROOT'])){
            return $_SERVER['DOCUMENT_ROOT'];
        }
        return '';
    }
}