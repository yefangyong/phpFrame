<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/25
 * Time: 15:57
 */

namespace core;


use core\lib\route;

class imooc
{
    public static $classMap = array();

    public $assign = array();

    static public function run() {
        $route = new route();
        $controller = $route->controller;
        $method = $route->method;
        $controllerFile = APP.'/controller/'.$controller.'Controller.php';
        $controllerClass = '\\'.MODULE.'\controller\\'.$controller.'Controller';
        if(is_file($controllerFile)) {
            include $controllerFile;
            $ctrl = new $controllerClass();
            $ctrl->$method();
        }else{
            throw new \Exception($controller.'controller'.'不存在');
        }
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
                throw new \Exception($class.'类库不存在');
            }
        }
    }

    public function assign($key,$value) {
        $this->assign[$key] = $value;
    }

    public function display($file) {
        $file_has = APP.'/views/'.$file;
        if(is_file($file_has)) {
            \Twig_Autoloader::register();
            $loader = new \Twig_Loader_Filesystem(APP.'/views');
            $twig = new \Twig_Environment($loader, array(
                'cache' => IMOOC.'/log/cache',
            ));
            $template = $twig->loadTemplate($file);
            $template->display($this->assign?$this->assign:'');
        }else {
            throw new \Exception($file.'视图文件不存在');
        }
    }
}