<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */

define("IMOOC",realpath("./"));
define("CORE",IMOOC."/core");
define("APP",IMOOC."/app");
define('MODULE','app');
define("DEBUG",true);

include '/vendor/autoload.php';
if(DEBUG) {
    $whoops = new \Whoops\Run;
    $options = new \Whoops\Handler\PrettyPageHandler();
    $options->setPageTitle('框架出错啦');
    $whoops->pushHandler($options);
    $whoops->register();
    ini_set('display_error','on');
}else{
    ini_set('display_error','off');
}
include CORE.'/common/function.php';

include CORE.'/imooc.php';
//自动注册类，找不到类库，自动调用方法
spl_autoload_register('\core\imooc::load');

\core\imooc::run();