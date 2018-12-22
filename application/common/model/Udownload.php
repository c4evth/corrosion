<?php

namespace app\common\model;

use think\Model;
use app\common\model\Token;

/**
 * 用户下载层
 */
class Udownload extends Model
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
   * 根据did获取一行
   */
  public function getByDid($did)
  {
    $model = $this->newInstance();
    $myLoad = $model->where('did')->find();
    return json_encode($myLoad);
  }

  public function getByUid($uid)
  {
    $model = $this->newInstance();
    $resIndoorData = $model
      -> alias('ud')
      -> join('indoordata i', 'ud.did=i.id')
      -> field('ud.*, i.name')
      -> where('ud.uid', $uid)
      -> order('ud.id', 'desc')
      -> select();
    
    $resWildData = $model
      -> alias('ud')
      -> join('wilddata w', 'ud.did=w.id')
      -> field('ud.*, w.name')
      -> order('ud.id', 'desc')
      -> where('ud.uid', $uid)
      -> select();
    return array_merge($resIndoorData, $resWildData);
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