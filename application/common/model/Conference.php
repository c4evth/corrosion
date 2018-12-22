<?php
namespace app\common\model;
use think\Model;

class Conference extends Model
{
	/**
	 * 获取一条数据通过id
	 * @param id 数据id
	 */
	public function getOne($id){
		$model = $this -> newInstance();
		return $model -> get($id);
	}

	/**
	 * 获取会议导航页对应的内容
	 * @param id 会议id
	 */
	public function getText($id){
		$model = $this -> newInstance();
		return $model -> where("id", $id) -> field('id,title,history,hotel,past,schedule,thesis,travel,about') -> find();
	}

	/**
	 * 获取所有行
	 */
	public function getAllBall(){
		$model = $this -> newInstance();
		return $model -> select();
	}

	/**
	 * 获取所有行id
	 */
	public function getAllIDs(){
		$model = $this -> newInstance();
		return $model -> field('id') -> order('id', 'asc') -> select();
	}

	/**
	 * 获取所有行
	 */
	public function getAllID(){
		$model = $this -> newInstance();
		return $model -> field('id,title') -> select();
	}

	/**
	 * 获取一条数据通过id
	 * @param id 数据id
	 */
	public function getOneByID($id){
		$model = $this -> newInstance();
		$res = $model -> where('id', $id) -> field('id,newsid,waittime,theme,spot,host,title,hostlogo') -> find();
		return $res;
	}

	/**
	 * 获取一条数据通过id
	 * @param id 数据id
	 */
	public function getPicByID($id){
		$model = $this -> newInstance();
		$res = $model -> where('id', $id) -> field('id,banner,history,historypic') -> find();
		return $res;
	}

	/**
	 * 增加一张图片
	 * @param id   对应的会议id
	 * @param type 图片类型0：轮播图/1：往届图片
	 * @param data 增加的数据
	 */
	public function addPic($id,$type,$data){
		$model = $this -> newInstance();
		$oldball = $model -> where('id', $id) -> field('id,history,banner,historypic') -> find();
		if($type == 0){
			if($oldball['banner'] != null || $oldball['banner'] != ''){
				$data['banner'] = $oldball['banner'] . "," . $data['banner'];
			}
			return $model -> where('id',$id) -> update($data);
		}
		if($oldball['historypic'] != null || $oldball['historypic'] != ''){
			$data['historypic'] = $oldball['historypic'] . "," . $data['historypic'];
		}
		if($data['history'] == null || $data['history'] == ''){
			$data['history'] = $oldball['history'];
		}
		return $model -> where('id',$id) -> update($data);
	}

	/**
	 * 获取所有行
	 */
	public function getAll(){
		$model = $this -> newInstance();
		$list  = $model -> field('id,title,host,hostlogo,theme,waittime,banner,historypic') -> select();
		$time = [];
		$theme = [];
		$banner = [];
		$historypic = [];
		for($i = 0; $i < count($list); $i ++){
			// 处理时间
			$time[$i] = explode(',',$list[$i]['waittime']);
			$list[$i]["time"] = $time[$i][0];
			// 处理主题
			$theme[$i] = explode(',',$list[$i]['theme']);
			$list[$i]["theme"] = $theme[$i][0];
			unset($list['waittime']);
			// 判断是否存在会议轮播图、往届图片
			if($list[$i]['banner'] != null || $list[$i]['banner'] != ''){
				$list[$i]['bannerCo'] = count($banner[$i] = explode(',', $list[$i]['banner']));
			}else{
				$list[$i]['banner'] = 0;
			}
			if($list[$i]['historypic'] != null || $list[$i]['historypic'] != ''){
				$list[$i]['historypic'] = count($banner[$i] = explode(',', $list[$i]['historypic']));
			}else{
				$list[$i]['historypic'] = 0;
			}
		}
		return $list;
	}

	/**
	 * 获取会议的图片
	 * @param id 会议id
	 */
	public function getPics($id){
		$model = $this -> newInstance();
		$list  = $model -> where('id', $id) -> field('id,title,banner,historypic') -> find();
		$list["banner"] = explode(',', $list["banner"]);
		$list["historypic"] = explode(',', $list["historypic"]);
		return $list;
	}

	/**
	 * 获取会议的时间节点和会议主题
	 * @param id 会议id
	 */
	public function getThemeAndTime($id){
		$model = $this -> newInstance();
		$list  = $model -> where('id', $id) -> field('id,title,theme,waittime') -> find();
		$list["theme"] = explode(',', $list["theme"]);
		$list["time"] = explode(',', $list["waittime"]);
		return $list;
	}

	/**
	 * 插入一条数据
	 * @param data 插入的数据
	 */
	public function insertOne($data){
		$model = $this -> newInstance();
		return $model -> save($data);
	}

	/**
	 * 根据id更新一条数据
	 * @param id   要更新的数据id
	 * @param data 需要更新的数据
	 */
	public function updateOne($id,$data){
		$model = $this -> newInstance();
		return $model -> where('id', $id) -> update($data);
	}

	/**
	 * 删除一条数据
	 * @param id 删除的会议id
	 */
	public function deleteOne($id){
		$model = $this -> newInstance();
		return $model -> where('id', $id) -> delete();
	}

	/**
	 * 删除一个会议主题/时间节点
	 * @param id 删除的会议id
	 * @param type 图片分类 0：会议主题/1：时间节点
	 * @param part 要删除的内容
	 */
	public function deletePart($id,$type,$part){
		$model  = $this -> newInstance();
		$ball   = $model -> where('id',$id) -> find();
		$res = [];
		if($type == 0){
			$res = explode(',', $ball["theme"]);
		}else{
			$res = explode(',', $ball["waittime"]);
		}
		$newStr = '';
		$length = count($res);
		foreach($res as $value){
			if($value != $part){
				$newStr .= $value . ",";
			}
		}
		$newStr = substr($newStr, 0, strlen($newStr)-1);

		if($type == 0){
			return $model -> where('id', $id) -> update(['theme' => $newStr]);
		}
		return $model -> where('id', $id) -> update(['waittime' => $newStr]);
	}

	/**
	 * 删除一个会议主题/时间节点
	 * @param id   删除的会议id
	 * @param type 图片分类 0：轮播图/1：往届图
	 * @param part 要删除的图片地址
	 */
	public function deletePic($id,$type,$part){
		$model  = $this -> newInstance();
		$ball   = $model -> where('id',$id) -> field('id,banner,historypic') -> find();
		$res = [];
		if($type == 0){
			$res = explode(',', $ball["banner"]);
		}else{
			$res = explode(',', $ball["historypic"]);
		}
		$newStr = '';
		foreach($res as $value){
			if($value != $part){
				$newStr .= $value . ",";
			}
		}
		$newStr = substr($newStr, 0, strlen($newStr)-1);

		if($type == 0){
			return $model -> where('id', $id) -> update(['banner' => $newStr]);
		}
		return $model -> where('id', $id) -> update(['historypic' => $newStr]);
	}

	/**
	 * 插入一组数据
	 * @param data 插入的数据
	 */
	public function insertAll($data){
		$model = $this -> newInstance();
		return $model -> saveAll($data);
	}
}