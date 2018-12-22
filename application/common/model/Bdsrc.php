<?php

namespace app\common\model;

use think\Model;
use app\common\model\Token;

/**
 * 基础数据源
 */
class Bdsrc extends Model
{

  /**
   * 获取所有行
   */
  public function getAll($bdid = 1)
  {
    $model = $this->newInstance();

    return $model
      ->where('bdid', $bdid)
      ->order('id', 'desc')
      ->select();
  }

  public function search ($key, $start = 0, $length = 10) {
    $model = $this -> newInstance();

    return $model
      -> where('search', 'LIKE', "%$key%")
      -> order('id', 'desc')
      // -> limit($start, $length)
      -> select();
  }

  /**
   * 通过bdid获取所有行
   */
  public function getByBdid($bdid, $start, $length)
  {
    $model = $this->newInstance();
    $Src = $model
      ->where('bdid', $bdid)
      ->limit($start, $length)
      ->select();
    return json_encode($Src);
  }

  public function getById($id) {
    $model = $this->newInstance();
    return $model -> get($id);
  }

  /**
   * 获取总页数
   */
  public function getPageNum ($bdid, $length = 20) {
    $model = $this->newInstance();
    $num = $model
      ->where('bdid', $bdid)
      ->count();
    
    return $num / $length;
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
	
	 /**
   * 新增一车
   */
  public function addAll($data)
  {
    $model = $this->newInstance();

    return $model->saveAll($data);
  }

}