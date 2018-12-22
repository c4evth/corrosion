<?php

namespace app\common\model;

use think\Model;
use app\common\model\Token;

/**
 * 标准的分类层
 */
class Scate extends Model
{

  /**
   * 根据level获取所有行
   */
  public function getByLevel ($level) {
    $model = $this -> newInstance();

    return $model -> where("level", $level) -> select();
  }

  /**
   * 获取所有行
   */
  public function getAll() {
    $model = $this -> newInstance();

    $cates = $model -> all();
    $res = [];
    foreach($cates as $cate) {
      $parent = $cate['parent'];
      if(!$parent) {
        $cate['parentname'] = '';
      } else {
        $model = $this -> newInstance();
        $c = $model -> get($parent);
        $cate['parentname'] = $c['name'];
      }

      array_push($res, $cate);
    }

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