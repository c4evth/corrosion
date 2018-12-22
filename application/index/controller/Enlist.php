<?php
namespace app\index\controller;
use think\Controller;
use app\common\model\Enlist as Model;

class Enlist extends Common
{
	public function _initialize(){
    parent::_initialize();
	}

	public function index($id = 1){
		if(request() -> isPost()){
			$data = input('post.');
			$validate = Validate("Enlist");
			if(!$validate -> scene('join') -> check($data)){
				$ErrorMsg = $validate -> getError();
				$this -> assign([
					'msg'    => $ErrorMsg . "，请重新提交您的信息！",
					'currID' => $id,
				]);
				return view();
			}

			// 验证通过后清除token
			unset($data["__token__"]);
			// dump($data);die;
			$data['bid']    = $id;
			$data['status'] = "待审核";
			$model = new Model();
			$enlist = $model -> add($data);
			if(!$enlist){
				$ErrorMsg = "报名失败!请确认您的信息是否正确!";
				$this -> assign([
					'msg'    => $ErrorMsg,
					'currID' => $id,
				]);
			}
			$this->redirect('/index/conference/index', ['id' => $id]);
		}
		$this -> assign([
			'currID'   => $id,
			'msg' => '',
		]);
		return view();
	}
}