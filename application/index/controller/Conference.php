<?php
namespace app\index\controller;
use think\Controller;
use app\common\model\Conference as Model;
use app\common\model\Organization as OrgModel;
use app\common\model\Orgcate as CateModel;
use app\common\model\Article as ArticleModel;

class Conference extends Common
{
	public function _initialize(){
    parent::_initialize();
	}
	
	/**
	 * 会议中心
	 * @param id 会议id
	 */
	public function index($id = 0){
		
		$newID = $this -> isID($id);
		$base = $this -> getBase($newID);
		$pic  = $this -> getPic($newID);
		$Org  = $this -> getUnit($newID);
		
		$this -> assign([
			'currTitle' => "会议中心",
			'base'      => $base,
			'pic'       => $pic,
			'Org'       => $Org,
			'currID'    => $newID,
		]);
		return view();
	}

	/**
	 * 参与会议的所有组织
	 * @param id 会议id
	 */
	public function unit($id = 0){
		$mdoel = new Model();
		$newID = $this -> isID($id);
		$Org  = $this -> getUnit($newID);
		$base = $this -> getBase($newID);
		$unitList = $mdoel -> getText($newID);
		$this -> assign([
			'currTitle' => "会议中心",
			'unitList'  => $unitList,
			'base'      => $base,
			'Org'       => $Org,
			'currID'    => $newID,
			'Title'     => "组织机构",
		]);
		return view();
	}
	
	/**
	 * 会议的往届回顾
	 * @param id 会议id
	 */
	public function history($id = 0){
		$newID = $this -> isID($id);
		$Org  = $this -> getUnit($newID);
		$base = $this -> getBase($newID);
		$model = new Model();
		$Text = $model -> getText($newID);
		$history = $Text['past'];
		$this -> assign([
			'currTitle' => "会议中心",
			'history'   => $history,
			'base'      => $base,
			'Org'       => $Org,
			'currID'    => $newID,
			'Title'     => "往届回顾",
		]);
		return view();
	}

	/**
	 * 住宿和交通
	 * @param id 会议id
	 */
	public function hotel($id = 0){
		$newID = $this -> isID($id);
		$Org  = $this -> getUnit($newID);
		$base = $this -> getBase($newID);
		$model = new Model();
		$Text = $model -> getText($newID);
		$hotel = $Text['hotel'];
		$this -> assign([
			'currTitle' => "会议中心",
			'hotel'     => $hotel,
			'base'      => $base,
			'Org'       => $Org,
			'currID'    => $newID,
			'Title'     => "住宿和交通",
		]);
		return view();
	}


	/**
	 * 会议日程安排
	 * @param id 会议id
	 */
	public function arrange($id = 0){
		$newID = $this -> isID($id);
		$Org  = $this -> getUnit($newID);
		$base = $this -> getBase($newID);
		$model = new Model();
		$Text = $model -> getText($newID);
		$arrange = $Text['schedule'];
		$this -> assign([
			'currTitle' => "会议中心",
			'arrange'   => $arrange,
			'base'      => $base,
			'Org'       => $Org,
			'currID'    => $newID,
			'Title'     => "日程安排",
		]);
		return view();
	}

	/**
	 * 论文征集规范
	 * @param id 会议id
	 */
	public function peperDesc($id = 0){
		$newID = $this -> isID($id);
		$Org  = $this -> getUnit($newID);
		$base = $this -> getBase($newID);
		$model = new Model();
		$Text = $model -> getText($newID);
		$desc = $Text['thesis'];
		$this -> assign([
			'currTitle' => "会议中心",
			'peperDesc' => $desc,
			'Org'       => $Org,
			'base'      => $base,
			'currID'    => $newID,
			'Title'     => "摘要征集",
		]);
		return view("peperDesc");
	}

	/**
	 * 旅游
	 * @param id 会议id
	 */
	public function travel($id = 0){
		$newID = $this -> isID($id);
		$Org  = $this -> getUnit($newID);
		$model = new Model();
		$Text = $model -> getText($newID);
		$base = $this -> getBase($newID);
		$travel = $Text['travel'];
		$this -> assign([
			'currTitle' => "会议中心",
			'travel'    => $travel,
			'base'      => $base,
			'Org'       => $Org,
			'currID'    => $newID,
			'Title'     => "旅游",
		]);
		return view();
	}

	/**
	 * 联系我们
	 * @param id 会议id
	 */
	public function contact($id = 0){
		$newID = $this -> isID($id);
		$Org  = $this -> getUnit($newID);
		$model = new Model();
		$Text = $model -> getText($newID);
		$base = $this -> getBase($newID);
		$about = $Text['about'];
		$this -> assign([
			'currTitle' => "会议中心",
			'about' 		=> $about,
			'base'      => $base,
			'Org'   		=> $Org,
			'currID'    => $newID,
			'Title'     => "联系我们",
		]);
		return view();
	}

	/****** conference类受保护函数只有函数内部调用 ******/

	/**
	 * 获取会议基础部分
	 * @param id 会议id
	 */
	protected function getBase($id){
		$base = [];
		$model  = new model();
		$AModel = new ArticleModel();
		$Ball = $model -> getOneByID($id);
		// 获取文章id
		$base['articleIDs']   = explode(',', $Ball['newsid']);
		$base['articleNames'] = $AModel -> getTitles($base['articleIDs']);
		// 获取时间节点
		$base['times'] = explode(',', $Ball['waittime']);
		// 获取会议主题
		$base['theme'] = explode(',', $Ball['theme']);
		// 获取会议亮点
		$base['spot']  = $Ball['spot'];
		// 获取会议logo
		$base['logo']  = $Ball['hostlogo'];
		return $base;
	}

	/**
	 * 获取轮播图、往届图片、往届回顾
	 */
	protected function getPic($id){
		$pic = [];
		$model  = new Model();
		$Ball   = $model -> getPicByID($id);
		$pic['banner'] = explode(',', $Ball['banner']);
		$pic['history'] = $Ball['history'];
		$pic['historypic'] = explode(',', $Ball['historypic']);
		return $pic;
	}

	/**
	 * 获取组织单位
	 * @param id 会议id
	 */
	protected function getUnit($id){
		$orgModel  = new OrgModel();
		$cateModel = new CateModel();
		$Org = [];
		// 获取媒体单位
		$mediaCate = $cateModel -> getCateByRemark('media');
		$media['data'] = $orgModel -> getByCID($id, $mediaCate['id']);
		$media['name'] = $mediaCate['name'];
		$Org['media'] = $media;
		// 获取其它单位
		$cates = $cateModel -> getAllCate();
		$count = count($cates);  // 获取数组长度
		$unitid = [];
		$units = [];
		for($i = 0; $i < $count; $i++){
			if($cates[$i]['remark'] == 'unit'){
				$unitid[$i] = $cates[$i]['id'];
				$orgsModel  = new OrgModel();
				$units[$cates[$i]['name']] = $orgsModel -> getByCID($id, $unitid[$i]);
			}
		}
		$Org['unit'] = $units;
		return $Org;
	}

	/**
	 * 确保id为有效id,如果给定id无效，则取库中
	 * 的id最大的一条数据对应的id作为当前id
	 * @param id 会议id
	 */
	protected function isID($id){
		$model = new Model();
		$balls = $model -> getAllIDs();
		$arr = [];
		$flag = false;
		for($i = 0; $i < count($balls); $i++){
			if($newArr = $balls[$i]['id'] == $id){
				$flag = true;
			}
			$newArr = [];
			$newArr = $balls[$i]['id'];
			$arr[$i] = $newArr;
		}
		$length = count($arr) - 1;
		if($flag == false){
			$id = $arr[$length];
		}
		return $id;
	}
}