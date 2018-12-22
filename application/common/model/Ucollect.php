<?php

namespace app\common\model;

use think\Model;
use app\common\model\Token;

/**
 * 用户收藏层
 */
class Ucollect extends Model
{

  /**
   * 获取所有行
   */
  public function getAll()
  {
    $model = $this->newInstance();

    return $model->all();
  }

  /**
   * 获取所有行
   */
  public function getCAll($uid)
  {
    $model = $this->newInstance();

    return json_encode($model->all());
  }

  public function getByUid($uid)
  {
    $model = $this->newInstance();
    $resIndoorData = $model
      -> alias('uc')
      -> join('indoordata i', 'uc.did=i.id')
      -> field('uc.*, i.name')
      -> where('uc.uid', $uid)
      -> order('uc.id', 'desc')
      -> select();
    
    $resWildData = $model
      -> alias('uc')
      -> join('wilddata w', 'uc.did=w.id')
      -> field('uc.*, w.name')
      -> order('uc.id', 'desc')
      -> where('uc.uid', $uid)
      -> select();

    return array_merge($resIndoorData, $resWildData);
  }

  /**
   * 根据did查一条记录
   */
  public function getOneByDid($did, $type)
  {
    $model = $this->newInstance();
    $res = $model->where('did', $did)->where('type', $type)->find();
    return json_encode($res);
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

    return json_encode($model->save($data));
  }

}