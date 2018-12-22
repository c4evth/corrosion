<?php

namespace app\common\model;

use think\Model;
use app\common\model\Token;

/**
 * 科技焦点
 */
class Focus extends Model
{

  /**
   * 获取所有行
   */
  public function getAll() {
    $model = $this -> newInstance();

    return $model
      -> alias('f')
      -> join('article a', 'f.aid=a.id')
      -> field('f.*, a.title')
      -> order('id', 'desc')
      -> select();
  }

  /**
   * 获取所有行
   */
  public function getAllCard() {
    $model = $this -> newInstance();

    return $model
      -> alias('f')
      -> join('article a', 'f.aid=a.id')
      -> field('f.*, a.title, a.cover, a.content, a.ctime, a.authors, a.src')
      -> order('id', 'desc')
      -> select();
	}
	
	 /**
   * 获取所有行通过limit
	 * @param start  开始点
	 * @param length 获取长度
   */
  public function getAllCardByLimit($start,$length) {
    $model = $this -> newInstance();

    return $model
      -> alias('f')
      -> join('article a', 'f.aid=a.id')
      -> field('f.*, a.title, a.cover, a.content, a.ctime, a.authors, a.src')
			-> order('id', 'desc')
			-> limit($start,$length)
      -> select();
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