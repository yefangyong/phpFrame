<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/26
 * Time: 10:03
 */

namespace core\lib;


class conf
{
    public static $confMap = array();

    /**
     * @param $name
     * @param $file
     * @return mixed
     * @throws \Exception
     * 获取单个的配置项
     */
    public static function get($name,$file) {
        /**
         * 1 判断配置文件是否存在
         * 2 判断配置项是否存在
         * 3 缓存配置
         */
        if(in_array($file,self::$confMap)) {
            return self::$confMap[$file][$name];
        }else{
            $path = IMOOC.'/core/conf/'.$file.'.php';
            if(is_file($path)) {
                $conf = include $path;
                if(isset($conf[$file][$name])){
                    self::$confMap[$file] = $conf;
                    return $conf[$file][$name];
                }else{
                    throw new \Exception('配置项不存在'.$name);
                }
            }else{
                throw new \Exception('配置文件不存在'.$file);
            }
        }
    }

    /**
     * @param $file
     * @return mixed
     * @throws \Exception
     * 获取所有的配置项
     */
    public static function all($file) {
        if(isset(self::$confMap[$file])) {
            return self::$confMap[$file];
        }else{
            $path = IMOOC.'/core/conf/'.$file.'.php';
            if(is_file($path)) {
                $conf = include $path;
                self::$confMap[$file] = $conf;
                return $conf;
            }else{
                throw new \Exception('配置文件不存在'.$file);
            }
        }

    }
}