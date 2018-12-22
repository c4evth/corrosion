<?php

namespace app\common\model;

use think\Model;
use app\common\model\Token;

/**
 * 用户消息
 */
class Touser extends Model
{

  /**
   * 获取所有行
   */
  public function getAllByUid($id, $start, $length) {
    $model = $this -> newInstance();

    $res = $model
      -> where('uid', $id)
      -> order('id', 'desc')
      -> limit($start, $length)
      -> select();
    return $res;
  }

  /**
   * 根据id删除一个
   */
  public function deleteById ($id) {
    $model = $this -> newInstance();

    return $model -> where("id", $id) -> delete();
  }

  /** 标记为已阅读 */
  public function viewed ($id) {
      $model = $this -> newInstance();
      $model -> where('id', $id)->setInc('status');
  }

  /**
   * 根据id更新
   */
  public function updateById ($id, $data) {
    $model = $this -> newInstance();

    return $model -> save($data, ['id' => $id]);
  }

  /**
   * 新增一个
   */
  public function add ($data) {
    $model = $this -> newInstance();

    return $model -> save($data);
  }

}