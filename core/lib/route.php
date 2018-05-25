<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/25
 * Time: 16:36
 */

namespace core\lib;


class route
{
    public $controller;
    public $method;
    public function __construct()
    {
       if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {
           $path = $_SERVER['REQUEST_URI'];
           $patharr = explode('/',trim($path,'/'));
           if(isset($patharr[0])){
               $this->controller = $patharr[0];
               unset($patharr[0]);
           }
           if(isset($patharr[1])) {
               $this->method = $patharr[1];
               unset($patharr[1]);
           }else{
               $this->method = 'index';
           }
           //获取传递的参数
           $count = count($patharr)+2;
           $i = 2;
           while($i < $count){
               if(isset($patharr[$i + 1])) {
                   $_GET[$patharr[$i]] = $patharr[ $i + 1];
               }
               $i = $i + 2;
           }
       }else{
           $this->controller = 'index';
           $this->method = 'index';
       }
    }
}