<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/25
 * Time: 19:40
 */

namespace app\controller;


use app\model\testModel;
use core\imooc;
use core\lib\conf;
use core\lib\drive\log\file;
use core\lib\log;
use core\lib\model;

class indexController extends imooc
{
    public function index() {
        $data = 'hello world';
        $this->assign('data',$data);
        $this->display('index.html');
    }
}