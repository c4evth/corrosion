<?php

namespace app\common\model;

use think\Model;
use app\common\model\Token;

/**
 * 标准
 */
class Standard extends Model
{

  /**
   * 获取所有行
   */
  public function getAll() {
    $model = $this -> newInstance();

    $res = $model
      -> alias("s")
      -> join("scate sc", "sc.id=s.cid")
      -> field("s.*,sc.name as catename")
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