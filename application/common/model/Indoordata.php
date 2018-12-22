<?php

namespace app\common\model;

use think\Model;
use app\common\model\Token;

/**
 * 室内数据
 */
class Indoordata extends Model
{

  /**
   * 获取所有行
   */
  public function getAll()
  {
    $model = $this->newInstance();

    $res = $model
      ->alias('i')
      ->join("dcate d", "d.id = i.cid")
      ->field("i.*, d.name as catename")
      ->select();

    return $res;
  }

  public function getByFilter($filter)
  {
    $model = $this->newInstance();

    return $model->where($filter)->select();
	}
	
	/**
	 * 通过cid获取所有行indoorData
	 * @param cid indoorData分类id
	 */
	public function getIndoorIdByCid($cid){
		 $model = $this -> newInstance();
		 return $model -> where('cid',$cid) ->field('id') -> select();
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
   * 根据id更新
   */
  public function updateCollectById($id, $data)
  {
    $model = $this->newInstance();

    return $model->where('id', $id)->update($data);
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