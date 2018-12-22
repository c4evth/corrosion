<?php
namespace app\admin\controller;
use think\Controller;
use app\common\model\Enlist as Model;
use app\common\model\Conference as BallModel;

class Enlist extends Common
{
	public function _initialize()
  {
    parent::_initialize();
    $this->assign	([
      "pageTitle" => "报名中心"
    ]);
  }

 /**
	* 显示所有报名表
	*/
	public function index(){
		$model   = new Model();
		$enlists = $model -> getAll();
		// dump($enlists);die;
		$this -> assign([
			'list' => $enlists,
		]);
		return view();
	}

	/**
	 * 添加一条数据
	 */
	public function add(){
		$ballModel = new BallModel();
		$AllBall = $ballModel -> getAllBall();
		// 接收管理员提交数据
		if(request() -> isPost()){
			$data = input('post.');
			$validate = Validate("Enlist");
			if(!$validate -> scene('join') -> check($data)){
				$Error = $validate -> getError();
				$this -> assign([
					'msg'     => $Error . ", 请稍后重试！",
					'AllBall' => $AllBall,
				]);
				return view();
			}
			// 验证数据后将token释放
			unset($data["__token__"]);
			$model = new Model();
			$sql = $model -> add($data);
			if(!$sql){
				$this -> assign([
					'msg'     => "添加失败!请稍后重试！",
					'AllBall' => $AllBall,
				]);
				return view();
			}
			$this->redirect('/admin/enlist/index');
		}

		$this -> assign([
			'AllBall' => $AllBall,
			'msg'     => '',
		]);
		return view();
	}

	/**
	 * 编辑数据
	 * @param id 报名id
	 */
	public function edit($id = 1){
		$ballModel = new BallModel();
		$AllBall = $ballModel -> getAllBall();
		$model = new Model();
		$enlist = $model -> getByID($id);
		if(request() -> isPost()){
			$data = input('post.');
			$validate = Validate("Enlist");
			if(!$validate -> scene('edit') -> check($data)){
				$this -> assign([
					'msg' => $validate -> getError(),
					'AllBall' => $AllBall,
					'enlist' => $enlist,
				]);
			}
			$sql = $model -> updateById($id,$data);
			if(!$sql){
				$this -> assign([
					'msg' => "修改失败!请稍后重试……",
					'AllBall' => $AllBall,
					'enlist' => $enlist,
				]);
			}
			$this->redirect('/admin/enlist/index');
		}
		$this -> assign([
			'AllBall' => $AllBall,
			'msg'     => '',
			'enlist' => $enlist,
		]);
		return view();
	}

	/**
	 * 删除一条记录
	 * @param id 报名id
	 */
	public function del($id = 1){
		$model = new Model();
		$sql = $model -> deleteById($id);
		if(!$sql){
			return json([
				'status' => 0,
				'msg'    => "删除失败，请稍后重试……"
			]);
		}
		return json([
				'status' => 1,
				'msg'    => "删除成功！",
			]);
	}
}