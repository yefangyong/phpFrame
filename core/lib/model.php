<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/25
 * Time: 20:18
 */

namespace core\lib;


class model extends \PDO
{
    public function __construct()
    {
        $database = conf::all('database');
        try{
            parent::__construct($database['DSN'],$database['USERNAME'], $database['PASSWD']);
        }catch(\Exception $e){
            p($e->getMessage());
        }
    }
}