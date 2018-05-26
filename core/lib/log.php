<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/26
 * Time: 12:04
 */

namespace core\lib;


class log
{
    static $class;
    public static function init() {
        //确定驱动方式
        $drive = conf::get('DRIVE','log');
        $class = '\core\lib\drive\log\\'.$drive;
        self::$class = new $class;
    }

    public static function log($message,$file = 'log') {
        self::$class->log($message,$file);
    }

}