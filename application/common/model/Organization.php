<?php
namespace app\common\model;
use think\Model;

class Organization extends Model
{
	/**
	 * 根据会议id和分类id获取所有行
	 */
	public function getAllByBallid($ballid, $remark){
		$model = $this -> newInstance();
		return $mdoel -> where('ballid', $ballid) -> where('remark', $remark) -> select();
	}

	/**
	 * 查询所有的组织
	 */
	public function getAllOrg(){
		$model = $this -> newInstance();
		return $model -> select();
	}

	/**
	 * 增加一条记录
	 */
	public function addOne($data){
		$model = $this -> newInstance();
		return $model -> save($data);
	}

	/**
	 * 根据id更新一条数据
	 */
	public function updateOne($id, $data){
		$model = $this -> newInstance();
		return $model -> where('id', $id) -> update($data);
	}

	/**
	 * 删除一条数据
	 * @param id 删除的组织id
	 */
	public function deleteOne($id){
		$model = $this -> newInstance();
		return $model -> where('id', $id) -> delete();
	}

	/**
	 * 通过id获取一条数据
	 * @param id 组织id
	 */
	public function getByID($id){
		$model = $this -> newInstance();
		return $model -> where('id',$id) -> find();
	}

	/**
	 * 通过id获取一条数据
	 * @param id 组织id
	 */
	public function getByCID($bid, $cid){
		$model = $this -> newInstance();
		return $model -> where('cid',$cid) ->where('ballid',$bid) -> select();
	}
}