<?php
namespace app\admin\controller;
use think\Controller;
use app\common\model\Conference as Model;
use app\common\mdoel\OrgCate as CateModel;
use app\common\model\Organization as orgModel;
use app\common\model\Article as NewsModel;

/**
 * 会议管理中心
 * @author ipso
 */

class Conference extends Common
{
	public function  _initialize () {
    parent::_initialize();
    $this -> assign([
      "pageTitle"    => "会议管理",
    ]);
  }

	/**
	 * 会议列表
	 */
	public function index(){
		$model = new Model();
		$ball = $model -> getAll();
		$this -> assign([
			'ball' => $ball,
		]);
		return view();
	}

	/**
	 * 添加一次会议，其中不包括会议历史的添加，会
	 * 议历届回顾在历史图片添加中可以添加修改
	 */
	public function add(){
		if(request() -> isPost()){
			$data = input('post.');
			$validate = Validate('Conference');
			if(!$validate -> scene('add') -> check($data))
			{
				$result = $validate -> getError();
				$url    = "/admin/Conference/add";
				$this -> assign([
					'result' => $result,
					'url'    => $url,
					'button' => false,
				]);
				return view('result');
			}
			// 验证完数据后清除token再存入数据库
			unset($data['__token__']);
			$data["waittime"] = $data["waittime"].",".$data["waittimes"];
			$data["theme"] = $data["theme"].",".$data["themes"];
			unset($data["waittimes"]);
			unset($data["themes"]);
			// dump($data);die;

			$model = new Model();
			$res = $model -> insertOne($data);
			if(!$res){
				$result = "添加会议失败";
				$url    = "/admin/Conference/add";
				$this -> assign([
					'result' => $result,
					'url'    => $url,
					'button' => false,
				]);
				return view('result');
			}
			$result = "添加会议成功!";
			$url    = "/admin/Conference/index";
			$this -> assign([
				'result' => $result,
				'url'    => $url,
				'button' => true,
			]);
			return view('result');
		}
		$articleModel = new NewsModel();
		$list = $articleModel -> getAll();
		$this -> assign([
			'article' => $list,
		]);
		return view();
	}

	/**
	 * 会议编辑
	 * @param id 需要编辑的会议id
	 */
	public function edit($id){
		$model = new Model();
		$oldBall = $model -> getOneByID($id);
		$themeArr = explode(',',$oldBall["theme"]);
		$timeArr = explode(',',$oldBall["waittime"]);
		$oldBall["theme"] = $themeArr[0];
		$oldBall["themes"] = $themeArr[1];
		$oldBall["waittime"] = $timeArr[0];
		$oldBall["waittimes"] = $timeArr[1];
		$articleModel = new NewsModel();
		$list = $articleModel -> getAll();
		if(request() -> isPost()){
			$data = input('post.');
			$validate = Validate('Conference');
			if(!$validate -> scene('edit') -> check($data))
			{
				$result = $validate -> getError();
				$url    = "/admin/Conference/edit?id=" . $id;
				$this -> assign([
					'result' => $result,
					'url'    => $url,
					'button' => false,
				]);
				return view('result');
			}

			$data["waittime"] = $data["waittime"].",".$data["waittimes"];
			$data["theme"] = $data["theme"].",".$data["themes"];
			unset($data["waittimes"]);
			unset($data["themes"]);
			
			$res = $model -> updateOne($id,$data);
			if(!$res){
				$result = "添加编辑失败";
				$url    = "/admin/Conference/edit?id=" . $id;
				$this -> assign([
					'result' => $result,
					'url'    => $url,
					'button' => false,
				]);
				return view('result');
			}
			$result = "会议编辑成功!";
			$url    = "/admin/Conference/index";
			$this -> assign([
				'result' => $result,
				'url'    => $url,
				'button' => true,
			]);
			return view('result');
		}

		$this -> assign([
			'oldBall' => $oldBall,
			'ballID'  => $id,
			'article' => $list,
		]);
		return view();
	}

	/**
	 * 增加一张会议轮播图
	 */
	public function addbanner(){
		$model = new Model();
		$AllBall = $model -> getAllBall();
		if(request() -> isPost()){
			$data = input('post.');
			$validate = Validate('Conference');
			if($validate -> scene('addbanner') -> check($data) == false){
				$msg = $validate -> getError();
				$url = "/admin/Conference/addbanner";
				$this -> assign([
					'result' => $msg,
					'url'    => $url,
					'button' => false,
				]);
				return view('result');
			}
			$ballid = $data['ballid'];
			unset($data['ballid']);
			$type = 0;
			$result = $model -> addPic($ballid,$type,$data);
			if(!$result){
				$msg = "轮播图添加失败!";
				$url    = "/admin/Conference/addbanner";
				$this -> assign([
					'result' => $msg,
					'url'    => $url,
					'button' => false,
				]);
				return view('result');
			}
			$msg = "轮播图添加成功!";
			$url    = "/admin/Conference/index";
			$this -> assign([
				'result' => $msg,
				'url'    => $url,
				'button' => true,
			]);
			return view('result');
		}
		$this -> assign([
			'AllBall' => $AllBall,
		]);
		return view();
	}

	/**
	 * 增加一张往届历史图片
	 */
	public function addpic(){
		$model = new Model();
		$AllBall = $model -> getAllBall();
		// dump($AllBall);die;
		if(request() -> isPost()){
			$data = input('post.');
			$validate = Validate('Conference');
			if(!$validate -> scene('addpic') -> check($data)){
				$msg = $validate -> getError();
				$url = "/admin/Conference/addpic";
				$this -> assign([
					'result' => $msg,
					'url'    => $url,
					'button' => false,
				]);
				return view('result');
			}

			$ballid = $data['ballid'];
			unset($data['ballid']);
			$type = 1;
			$result = $model -> addPic($ballid,$type,$data);
			if(!$result){
				$msg = "往届图片添加失败!";
				$url    = "/admin/Conference/addpic";
				$this -> assign([
					'result' => $msg,
					'url'    => $url,
					'button' => false,
				]);
				return view('result');
			}
			$msg = "往届图片添加成功!";
			$url    = "/admin/Conference/index";
			$this -> assign([
				'result' => $msg,
				'url'    => $url,
				'button' => true,
			]);
			return view('result');
		}
		$this -> assign([
			'AllBall' => $AllBall,
		]);
		return view();
	}

	/**
	 * 判断对应的文章是否存在
	 */
	public function isExistNews(){
		$data = '';
		if(request() -> isPost()) $data = input('post.');
		$aID = explode(',',$data['data']);
		$model = new NewsModel();
		$str = '';
		$arr =[];
		foreach($aID as $value){
			$res = '';
			$id = intval($value);
			$res = $model -> getByID($id);
			if($res == ''){ 
				$str .= $id . '、';
			}
		}
		$result = substr($str, 0, strlen($str) - 3);
		if($result != false){
			return json([
				'status' => 0,
				'msg'    => "文章编号" . $result . "不存在！",
			]);
		}
		return json([
			'status' => 1,
			'msg'    => "ok!",
		]);
	}

	/**
	 * 删除一个会议
	 */
	public function del($id){
		$model = new Model(); // deleteOne
		$result = $model -> deleteOne($id);
		if(!$result){
			return json([
				'status' => 0,
				'msg'    => '删除失败',
			]);
		}else{
			return json([
				'status' => 1,
				'msg'    => '删除成功',
			]);
		}
	}

	/**
	 * 会议图片
	 * @param id   会议id
	 * @param type 图片类型0：轮播图/1：往届图片
	 */
	public function pics($id = 1, $type = 0){
		// dump($type);
		$model = new Model();
		$banner = $model -> getPics($id);
		$ballId = $banner['id'];
		$title = $banner['title'];
		if($type == 0){
			$ballbanner = $banner['banner'];
			$this -> assign([
				"banner" => $ballbanner,
				"type"   => 0,
			]);
		}
		if($type == 1){
			$ballhistory = $banner['historypic'];
			// dump($ballhistory);die;
			$this -> assign([
				"history" => $ballhistory,
				"type"   => 1,
			]);
		}
		// dump($ballbanner);die;
		$this -> assign([
			"ballId" => $ballId,
			"title"  => $title,
		]);
		return view();
	}

	/**
	 * 删除里条会议主题或者时间节点
	 * @param id 会议id
	 */
	public function delOne($id = 1,$type = 0){
		$data = '';
		$part = '';
		if(request() -> isPost()) $data = input("post.");
		$part = $data['data'];
		$model = new Model();
		$res = $model -> deletePart($id,$type,$part);
		if(!$res){
			return json([
			'status' => 0,
			'msg'    => "删除失败！",
			]);
		}else{
			return json([
			'status' => 1,
			'msg'    => "删除成功！",
			]);
		}
	}

	/**
	 * 删除一条会议轮播图或者往届图片
	 * @param id 会议id
	 */
	public function delpic($id = 1,$type = 0){
		$data = '';
		$part = '';
		if(request() -> isPost()) $data = input("post.");
		$part = $data['data'];
		$model = new Model();
		$res = $model -> deletePic($id,$type,$part);
		if(!$res){
			return json([
				'status' => 0,
				'msg'    => "删除失败1！",
			]);
		}
		$file = ROOT_PATH."public/".$part;
		if(file_exists($file)){
			if (unlink($file)){
				return json([
					'status' => 1,
					'msg'    => "删除成功！",
				]);
			}
			return json([
				'status' => 0,
				'msg'    => "删除失败2！",
			]);
		}else{
			return json([
				'status' => 0,
				'msg'    => "文件不存在",
			]);
		}
	}

	/**
	 * 大会主题和时间节点
	 */
	public function themeOrTime($id =1,$type = 0){
		$model = new Model();
		$both = $model -> getThemeAndTime($id);
		$ballId = $both['id'];
		$title = $both['title'];
		$content = '';
		if($type == 0){
			$Theme = $both['theme'];
			$content = $Theme;
			$this -> assign([
				"type"   => 0,
			]);
		}else{
			$Time = $both['time'];
			$content = $Time;
			$this -> assign([
				"type"   => 1,
			]);
		}
		$this -> assign([
			"ballId"  => $ballId,
			"title"   => $title,
			"content" => $content,
		]);
		return view('themeOrTime');
	}

	/**
	 * 会议后续准备内容编辑
	 */
	public function editText(){
		$model = new Model();
		$ball = $model -> getAll();
		if(request() -> isPost()){
			$data = input('post.');
			$id = $data['ballid'];
			// $type = $data['actId'];
			// dump($data);
			unset($data['ballid']);
			unset($data['actId']);
			// dump($data);die;
			$sql = $model -> updateOne($id, $data);
			if(!$sql){
				$msg = "编辑内容失败!";
				$url    = "/admin/Conference/index";
				$this -> assign([
					'result' => $msg,
					'url'    => $url,
					'button' => true,
				]);
				return view('result');
			}
			$msg = "内容编辑成功!";
			$url    = "/admin/Conference/index";
			$this -> assign([
				'result' => $msg,
				'url'    => $url,
				'button' => true,
			]);
			return view('result');
		}
		$this -> assign([
			'ball' => $ball,
		]);
		return view("editText");
	}

	/**
	 * 获取编辑前的对应操作内容
	 * @param  bid  会议id
	 * @param  act  操作名
	 * @return json 包含内容的json数据
	 */
	public function getText($bid = 1, $act = ''){
		$model = new Model();
		$ball = $model -> getText($bid);
		$Text = $ball[$act];

		return json([
			"content" => $Text,
		]);
	}

	public function getHistory($id){
		$model = new Model();
		$ball = $model -> getText($id);
		$Text = $ball['history'];

		return json([
			"content" => $Text,
		]);
	}
}