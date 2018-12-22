<?php
namespace app\common\model;
use think\Model;

class Orgcate extends Model
{
	/**
	 * 获取所有行
	 */
	public function getAllCate(){
		$model = $this -> newInstance();
		return $model -> select();
	}

	/**
	 * 获取一条数据
	 */
	public function getOneCate($id){
		$model = $this -> newInstance();
		return $model -> where('id', $id) -> find();
	}

	/**
	 * 获取一条数据
	 */
	public function getCateByRemark($remark){
		$model = $this -> newInstance();
		return $model -> where('remark', $remark) -> find();
	}

	/**
	 * 修改一条数据根据id
	 */
	public function updateCate($id, $data){
		$model = $this -> newInstance();
		return $model ->where('id', $id) -> update($data);
	}

	/**
	 * 根据id删除一条数据
	 * @param id 数据id
	 */
	public function deleteOne($id){
		$model = $this -> newInstance();
		return $model -> where('id', $id) -> delete();
	}

	/**
	 * 增加一天数据
	 * @param data 增加的数据
	 */
	public function addOne($data){
		$model = $this -> newInstance();
		$res = $model -> save($data);
		return $res;
	}
}