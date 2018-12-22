<?php

namespace app\index\model;

use think\Model;

class Bdcate extends Model
{
  public function initialize()
  {
    parent::initialize();
  }

  /**
   * 获取所有行
   */
  public function getAll()
  {
    $model = $this->newInstance();

    return $model->all();
  }
}