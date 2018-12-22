<?php

namespace app\common\model;

use think\Model;
use app\common\model\Token;

/**
 * 室内/野外数据层
 */
class Data extends Model
{

	/**
   * 根据检索值获取室内数据所有行
	 * @param type   数据类型，1室内/2室外
	 * @param search 检索关键字
   */
  public function getDataAllBySearch($search,$type,$cidArr,$start,$length)
  {
		$key    = '%'.$search.'%';
    $model  = $this -> newInstance();
    $indoor = $model -> where('type',$type) -> where("title",'like',$key) -> where('cid', 'IN', $cidArr) -> limit($start,$length) -> select();
    return $indoor;
	}

  /**
   * 获取所有行
   */
  public function getAll()
  {
    $model = $this->newInstance();

    return $model->all();
  }

  /**
   * 通过cid获取符合条件的所有记录
   * @param cid 材料分类
   */
  public function getAllByCid($cid,$start,$length)
  {
    $model = $this->newInstance();
    $res = $model->where("cid", $cid)->limit($start,$length)->select();
    return $res;
  }

  /**
   * 通过id获取符合条件的一条记录
   * @param id 数据id
   */
  public function getById($id)
  {
    $model = $this->newInstance();
    $res = $model->where("id", $id)->find();
    return $res;
  }

  /**
   * 通过id获取符合条件的一条记录
   * @param id 数据id
   */
  public function getDataById($id)
  {
    $model = $this->newInstance();
    $res = $model->where("id", $id)->find();
    return json_encode($res);
  }

  /**
   * 根据筛选条件获取所有
   */
  public function getAllByFilter($filter)
  {
    $model = $this->newInstance();

    return $model
      ->where($filter)
      ->select();
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
  public function updateDataById($id, $data)
  {
    $model = $this->newInstance();

    return json_encode($model->save($data, ['id' => $id]));
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