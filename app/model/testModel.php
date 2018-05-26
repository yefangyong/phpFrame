<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/26
 * Time: 13:35
 */

namespace app\model;


use core\lib\model;

class testModel extends model
{
    public $table = 'language';

    /**
     * @return array|bool
     * 获取所有的数据
     */
    public function lists() {
        $ret = $this->select($this->table,'*');
        return $ret;
    }

    /**
     * @param $id
     * @return array|bool
     * 获取一条数据
     */
    public function getOne($id) {
        return $this->get($this->table,'*',array('id'=>$id));
    }

    /**
     * @param $id
     * @param $data
     * @return bool|\PDOStatement
     * 修改一条数据
     */
    public function setOne($id,$data) {
        return  $this->update($this->table,$data,array('id'=>$id));
    }
}