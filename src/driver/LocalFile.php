<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021-03-08
 * Time: 10:14
 */
namespace wenshizhengxin\error_monitor\driver;
use wenshizhengxin\error_monitor\i\IErrorMonitor;
use wenshizhengxin\error_monitor\libs\Tools;

class LocalFile implements IErrorMonitor{
    private $defaultPath = true;
    private $defaultDir = 'err_log';
    protected  $_config = [
        'path'=>'',
    ];
    public function __construct($cfg = [])
    {
        if(isset($cfg['path']) && $cfg['path']){
            $this->defaultPath=false;
        }
        $this->_config['path'] = Tools::get_web_root().'/'.$this->defaultDir.'/';
        if($cfg){
            $this->_config = array_merge($this->_config,$cfg);
        }
        if(!$this->_config['path']){
            exit('path is empty');
        }
        $lastChar = substr($this->_config['path'], -1);
        if ( ($lastChar!= '/') && ($lastChar!='\\')) {
            $this->_config['path'] .= '/';
        }
        $this->init();
    }

    public function init(){
        // 创建项目缓存目录
        if (!is_dir($this->_config['path'])) {
            if (mkdir($this->_config['path'], 0755, true)) {
                return true;
            }
        }
        return false;
    }

    public function write($errno , $err_str , $err_file, $err_line, $err_context=null)
    {

        $code = file_get_contents($err_file);

        $filename = str_replace([DIRECTORY_SEPARATOR,'.',':'],['_','_',''],$err_file).'.html';
        // 这里进行高亮处理
        // Instantiate the Highlighter.
        $hl = new \Highlight\Highlighter();
        try {
            // Highlight some code.
            $highlighted = $hl->highlight('php', $code);

            //错误行加背景
            $codeArr = explode("\n",$highlighted->value);
            $index = $err_line-1;
            if(isset($codeArr[$index])){
                $codeArr[$index] = "<span style='background-color: aqua'>".$codeArr[$index]."</span>";
            }
            $highlighted->value = implode("\n",$codeArr);

            $content = "<html>
<head>
<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.6.0/styles/default.min.css\">
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.6.0/highlight.min.js\"></script>
<script>hljs.highlightAll();</script>
<style>
.hljs ul {
list-style: decimal;
margin: 0 0 0 40px!important;
padding: 0
}
.hljs li {
list-style: decimal-leading-zero;
border-left: 1px solid #111!important;
padding: 2px 5px!important;
margin: 0!important;
line-height: 14px;
width: 100%;
box-sizing: border-box
}
.hljs li:nth-of-type(even) {
background-color: rgba(255,255,255,.015);
color: inherit
}
</style>
</head>
<body>
<h1>{$err_str} in line {$err_line}</h1>";
            $content .= "<pre><code class=\"hljs {$highlighted->language}\">";
            $content .= $highlighted->value;
            $content .= "</code></pre>
<script type=\"text/javascript\">
var e = document.querySelectorAll(\"code\");
var e_len = e.length;
var i;
for (i = 0; i < e_len; i++) {
e[i].innerHTML = \"<ul><li>\" + e[i].innerHTML.replace(/\\n/g, \"\\n</li><li>\") + \"\\n</li></ul>\";
}
</script> 
</body></html>";
        } catch (Exception $e) {

            // This is thrown if the specified language does not exist

            $content = "<pre><code>";
            $content .= htmlentities($code);
            $content .= "</code></pre>";
        }
        $filePath = str_replace('\\','/',$this->_config['path'].$filename);

        return file_put_contents($filePath,$content);
    }

    public function read($path)
    {
       echo file_put_contents($path);
    }
    // 浏览错误列表
    public function err_index($print=true){
        $list = scandir($this->_config['path']);
        $out = [];
        foreach ($list as $k=>$v){
            if($v=='.'||$v=='..'){
                continue;
            }
            if($this->defaultPath){
                $out[] = "<a href='/{$this->defaultDir}/{$v}' target='_blank'>$v</a>";
            }else{
                $out[] = $this->_config['path'].$v;
            }
        }
        if($print){
            echo implode('<br/>',$out);
            exit;
        }
        return $out;
    }
}
