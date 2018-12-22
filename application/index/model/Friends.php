<?php

namespace app\index\model;

use think\Model;

class Friends extends Model
{
  /**
   * 初始化模型类
   */
  protected function initialize()
  {
    parent::initialize();
  }

  /**
   * 获取栏目信息
   */
  public function getFriends()
  {
    $model = $this->newInstance();
    $ModelNav = $model->all();
    return $ModelNav;
  }
}