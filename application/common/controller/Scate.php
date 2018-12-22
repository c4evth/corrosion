<?php
namespace app\common\controller;

use think\Controller;

use app\common\model\Scate as Model;

class Scate extends Controller
{
  /**
   * 通过分类级别
   * @param  Level 分类级别
   * @return json  查询结果
   */
  public function getScateByLevel($Level)
  {
    $model = new Model();
    $modelScate = $model->getByLevel($Level);
    return json_encode($modelScate);
  }
}