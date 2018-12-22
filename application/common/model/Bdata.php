<?php

namespace app\common\model;

use think\Model;
use app\common\model\Token;

/**
 * 基础数据
 */
class Bdata extends Model
{

  /**
   * 获取所有行
   */
  public function getAll()
  {
    $model = $this->newInstance();

    return $model
      ->alias('bd')
      ->join('bdcate bdc', 'bd.cid=bdc.id')
      ->field('bd.*, bdc.name as catename')
      ->order('id', 'desc')
      ->select();
  }

  /**
   * 获取所有行通过cid
   */
  public function getByCid($cid)
  {
    $model = $this->newInstance();
    $Data = $model->where('cid', $cid)->select();
    return json_encode($Data);
  }

  /**
   * 根据id删除一个
   */
  public function deleteById($id)
  {
    $model = $this->newInstance();

    return $model->where("id", $id)->delete();
  }

  /**
   * 根据id更新
   */
  public function updateById($id, $data)
  {
    $model = $this->newInstance();

    return $model->save($data, ['id' => $id]);
  }

  /**
   * 新增一个
   */
  public function add($data)
  {
    $model = $this->newInstance();

    return $model->save($data);
  }

}