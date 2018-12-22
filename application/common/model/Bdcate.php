<?php

namespace app\common\model;

use think\Model;
use app\common\model\Token;

/**
 * 基础数据分类
 */
class Bdcate extends Model
{

  /**
   * 获取所有行
   */
  public function getAll()
  {
    $model = $this->newInstance();

    return $model
      ->order('id', 'asc')
      ->select();
  }

  /**
   * 通过id获取一行
   */
  public function getById($id)
  {
    $model = $this->newInstance();
    $Cate = $model->get($id);
    return json_encode($Cate);
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