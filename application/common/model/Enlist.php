<?php

namespace app\common\model;

use think\Model;

class Enlist extends Model
{

  /**
   * 获取所有行
   */
  public function getAll() {
    $model = $this -> newInstance();

    return $model -> select();
	}

	/**
   * 获取一条记录通过id
   */
  public function getByID($id) {
    $model = $this -> newInstance();

    return $model -> where('id', $id) -> find();
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
    return $model -> where('id', $id) -> update($data);
  }

  /**
   * 新增一个
   */
  public function add ($data) {
    $model = $this -> newInstance();

    return $model -> save($data);
  }

}