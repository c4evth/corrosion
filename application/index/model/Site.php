<?php

namespace app\index\model;

use think\Model;

class Site extends Model
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
  public function getSite()
  {
    $model = $this->newInstance();
    $ModelSite = $model->get(1);
    return json_encode($ModelSite);
  }
}