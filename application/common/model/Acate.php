<?php

namespace app\common\model;

use think\Model;
use app\common\model\Token;

/**
 * 文章分类层
 */
class Acate extends Model
{

  /**
   * 获取所有行
   */
  public function getAll() {
    $model = $this -> newInstance();

    return $model -> all();
	}
	
	/**
   * 获取所有行
   */
  public function getCateById($id) {
		$model = $this -> newInstance();
		$res = $model -> where('id', $id) -> field('name') -> find();

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