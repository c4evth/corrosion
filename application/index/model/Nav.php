<?php

namespace app\index\model;

use think\Model;

class Nav extends Model
{
    /**
     * 初始化模型类
     */
    protected function initialize(){
        parent::initialize();
    }

    /**
     * 获取栏目信息
     */
    public function getNav(){
      $model = $this->newInstance();
      $ModelNav = $model
        -> order('priority', 'desc')
        -> select();
      return $ModelNav;
    }
}