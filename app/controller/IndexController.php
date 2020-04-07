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
use core\lib\Logger;
use core\lib\model;

class indexController extends imooc
{
    public function index() {
        $data = 'hello world';
        $log = new Logger('queue');
        $log->setLog('测试日志',['age'=>23,'name'=>'yfy']);
        $this->assign('data',$data);
        $this->display('index.html');
    }
}