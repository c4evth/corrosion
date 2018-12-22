<?php
namespace app\admin\controller;
use think\Controller;
use app\common\model\Conference as ballModel;
use app\common\model\Organization as Model;
use app\common\model\Orgcate as Cate;

class Organization extends Common
{
	public function  _initialize () {
    parent::_initialize();
    $this -> assign([
      "pageTitle"  => "会议参与组织",
    ]);
	}
	
	/**
	 * 参会组织列表
	 */
	public function index(){
		$model = new Model();
		$Org = $model -> getAllOrg();
		$this -> assign([
			'Org' => $Org,
		]);
		return view();
	}

	/**
	 * 添加组织
	 */
	public function addorg(){
		$model     = new Model();
		$ballModel = new ballModel();
		$cateModel = new Cate();
		$ball  = $ballModel -> getAllID();
		$cate = $cateModel  -> getAllCate();
		if(request() -> isPost()){
			$data = input('post.');
			$validate = Validate('Conference');
			if(!$validate -> scene('addorg') -> check($data)){
				$result = $validate -> getError();
				$url    = "/admin/organization/addorg";
				$this -> assign([
					'result' => $result,
					'url'    => $url,
					'button' => false,
				]);
				return view('result');
			}
			// 验证完数据后清除token再存入数据库
			unset($data['__token__']);
			$Add = $model -> addOne($data);
			if(!$Add){
				$result = "添加组织失败";
				$url    = "/admin/organization/addorg";
				$this -> assign([
					'result' => $result,
					'url'    => $url,
					'button' => false,
				]);
				return view('result');
			}
			$result = "添加组织成功";
			$url    = "/admin/organization/index";
			$this -> assign([
				'result' => $result,
				'url'    => $url,
				'button' => true,
			]);
			return view('result');
		}

		$this -> assign([
			'AllBall' => $ball,
			'AllCate' => $cate,
		]);
		return view();
	}

	/**
	 * 编辑一个组织
	 * @param id 组织id
	 */
	public function editOrg($id){
		$model     = new Model();
		$ballModel = new ballModel();
		$cateModel = new Cate();
		$ball  = $ballModel -> getAllID();
		$cate = $cateModel  -> getAllCate();
		$currOrg = $model -> getByID($id);
		if(request() -> isPost()){
			$data = input('post.');
			$validate = Validate('Conference');
			if(!$validate -> scene('addorg') -> check($data)){
				$result = $validate -> getError();
				$url    = "/admin/organization/editOrg?id=" . $id;
				$this -> assign([
					'result' => $result,
					'url'    => $url,
					'button' => false,
				]);
				return view('result');
			}
			// 验证完数据后清除token再存入数据库
			unset($data['__token__']);

			$Edit = $model -> updateOne($id,$data);
			if(!$Edit){
				$result = "修改组织失败";
				$url    = "/admin/organization/editOrg?id=" . $id;
				$this -> assign([
					'result' => $result,
					'url'    => $url,
					'button' => false,
				]);
				return view('result');
			}
			$result = "修改组织成功";
			$url    = "/admin/organization/index";
			$this -> assign([
				'result' => $result,
				'url'    => $url,
				'button' => true,
			]);
			return view('result');

		}
		$this -> assign([
			'AllBall' => $ball,
			'AllCate' => $cate,
			'currOrg' => $currOrg,
			'currID'  => $id,
		]);
		return view('editOrg');
	}

	/**
	 * 删除一个组织
	 * @param id 组织id
	 */
	public function delOrg($id){
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
	 * 组织分类列表
	 */
	public function cate(){
		$model = new Cate();
		$cates = $model -> getAllCate();
		$this -> assign([
			'cates' => $cates,
		]);
		return view();
	}

	/**
	 * 添加组织分类
	 */
	public function addCate(){
		$model = new Cate();
		if(request() -> isPost())
		{
			$data = input('post.');
			$validate = Validate("Conference");
			if(!$validate -> scene('addCate') -> check($data))
			{
				$result = $validate -> getError();
				$url    = "/admin/organization/addCate";
				$this -> assign([
					'result' => $result,
					'url'    => $url,
					'button' => false,
				]);
				return view('result');
			}
			// 验证完数据后清除token再存入数据库
			unset($data['__token__']);
			$cate = $model -> addOne($data);
			if(!$cate){
				$result = "添加分类失败";
				$url    = "/admin/organization/addCate";
				$this -> assign([
					'result' => $result,
					'url'    => $url,
					'button' => false,
				]);
				return view('result');
			}
			$result = "添加分类成功";
				$url    = "/admin/organization/cate";
				$this -> assign([
					'result' => $result,
					'url'    => $url,
					'button' => true,
				]);
				return view('result');
		}
		return view("addCate");
	}

 /**
	* 根据id更新一条分类
	* @param id 分类id
	*/
	public function editCate($id){
		$model = new Cate();
		if(request() -> isPost())
		{
			$data = input('post.');
			$validate = Validate("Conference");
			if(!$validate -> scene('addCate') -> check($data))
			{
				$result = "修改分类失败";
				$url    = "/admin/organization/editCate?id=" . $id;
				$this -> assign([
					'result' => $result,
					'url'    => $url,
					'button' => false,
				]);
				return view('result');
			}
			$cate = $model -> updateCate($id, $data);
			if(!$cate){
				$result = "修改分类失败";
				$url    = "/admin/organization/editCate?id=" . $id;
				$this -> assign([
					'result' => $result,
					'url'    => $url,
					'button' => false,
				]);
				return view('result');
			}

			$result = "修改分类成功";
				$url    = "/admin/organization/cate";
				$this -> assign([
					'result' => $result,
					'url'    => $url,
					'button' => true,
				]);
				return view('result');
		}
		$cate = $model -> getOneCate($id);
		$this -> assign([
			'currID' => $id,
			'cate'   => $cate,
		]);
		return view("editCate");
	}

	/**
	 * 删除一条组织分类
	 * @param id 分类id
	 */
	public function delCate($id){
		$model = new Cate();
		$delete = $model -> deleteOne($id);
		if(!$delete){
			return json([
				'status' => 0,
				'msg'    => '删除失败!'
			]);
		}
		return json([
			'status' => 1,
			'msg'    => '删除成功!'
		]);
	}
}