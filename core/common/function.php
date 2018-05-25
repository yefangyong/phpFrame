<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/25
 * Time: 15:56
 */

function p($var){
    if(is_bool($var)) {
        var_dump($var);
    }elseif(is_null($var)) {
        var_dump(null);
    }else{
        print_r($var);
    }
}