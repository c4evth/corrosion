<?php

namespace app\common\model;

use think\Model;
use app\common\model\Token;

/**
 * 室内/野外数据的分类层
 */
class Dcate extends Model
{

  /**
   * 根据level获取所有行
   */
  public function getByLevel($level)
  {
    $model = $this->newInstance();

    return $model->where("level", $level)->select();
  }

   /**
   * 根据id更新
   */
  public function updateById ($id, $data) {
    $model = $this -> newInstance();

    return $model -> save($data, ['id' => $id]);
	}
	
	/**
	 * 通过name获取一条分类信息
	 * 添加时间 2018/11/20
	 * @param name 分类name
	 */
	public function getCateByName($name){
		$model = $this -> newInstance();
		return $model -> where('name',$name) -> find();
	}

	/**
	 * 通过name获取所有分类信息
	 * 添加时间 2018/11/20
	 * @param parent 分类parent
	 */
	public function getCateByParent($parent,$type){
		$model = $this -> newInstance();
		return $model -> where('parent', $parent) -> where('type',$type) -> field('id,name') -> select();
	}

  /**
   * 根据level和type获取所有行
   */
  public function getByLevelAndType($type, $level)
  {
    $model = $this->newInstance();

    return $model->where("level", $level)->where("type", $type)->select();
  }

  /**
   * 获取所有行
   */
  public function getAll()
  {
    $model = $this->newInstance();

    $cates = $model->all();
    $res = [];
    foreach ($cates as $cate) {
      $parent = $cate['parent'];
      if (!$parent) {
        $cate['parentname'] = '';
      } else {
        $model = $this->newInstance();
        $c = $model->get($parent);
        $cate['parentname'] = $c['name'];
      }

      array_push($res, $cate);
    }

    return $res;
  }

  public function getByFilter($filter)
  {
    $model = $this->newInstance();

    return $model->where($filter)->select();
  }

  public function getByType($type)
  {
    $model = $this->newInstance();

    $cates = $model->where("type", $type)->select();
    $res = [];
    foreach ($cates as $cate) {
      $parent = $cate['parent'];
      if (!$parent) {
        $cate['parentname'] = '';
      } else {
        $model = $this->newInstance();
        $c = $model->get($parent);
        $cate['parentname'] = $c['name'];
      }

      array_push($res, $cate);
    }

    return $res;
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
   * 新增一个
   */
  public function add($data)
  {
    $model = $this->newInstance();

    return $model->save($data);
  }

}