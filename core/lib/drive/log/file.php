<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/26
 * Time: 12:06
 */

namespace core\lib\drive\log;


use core\lib\conf;

class file
{
    public  $path; //日志的存储路径
    public function __construct()
    {
        $this->path = conf::get('OPTIONS','log')['PATH'];
    }

    public  function log($message,$file = 'log') {
        /**
         *确定目录是否存在
         * 创建目录
         * 写入日志文件
         */
        $dir = $this->path.'/'.date('Ym',time());
        if(!is_dir($dir)){
            mkdir($dir,'0777',true);
        }
        return file_put_contents($dir.'/'.date('d',time()).'.log',date("Y-m-d H:i:s").json_encode($message).PHP_EOL,FILE_APPEND);
    }
}