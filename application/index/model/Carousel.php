<?php

namespace app\index\model;

use think\Model;

class Carousel extends Model
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
  public function getBanner()
  {
    $model = $this->newInstance();
    $ModelBanner = $model->all();
    return $ModelBanner;
  }
}