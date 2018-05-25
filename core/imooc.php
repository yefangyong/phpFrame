<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/25
 * Time: 15:57
 */

namespace core;


class imooc
{
    public static $classMap = array();
    static public function run() {
       p('ok');
        new \core\route();
    }

    /**
     * @param $class
     * @return bool
     * 自动加载类库
     */
    public static function load($class) {
        if(in_array($class,self::$classMap)) {
            return true;
        }else {
            $class = str_replace("\\",'/',$class);
            $file = IMOOC.'/'.$class . '.php';
            if(is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            }else{
                return false;
            }
        }
    }
}