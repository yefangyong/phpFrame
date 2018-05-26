<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/25
 * Time: 20:18
 */

namespace core\lib;

use Medoo\Medoo;

class model extends Medoo
{
    public function __construct()
    {
        $options = conf::all('database');
       parent::__construct($options);
    }
}