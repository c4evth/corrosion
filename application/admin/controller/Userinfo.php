<?php

namespace app\admin\controller;

use think\Controller;
use app\index\model\User;
use think\Session;
use think\Request;


class Userinfo extends Common
{
    public function _initialize(){
        parent::_initialize();
        $this->assign("pageTitle", "用户信息");
    }
    /* 用户列表 */
    public function index(){
        $userInfo = db('user') -> select();
        $this     -> assign('Userinfo',$userInfo);
        return view();
    }

    /* 用户详情 */
    public function info($id = 0){
        $userinfo = db('user') -> where('id', $id) -> find();
        // dump($userinfo);die;
        return view();
    }

    /* 用户编辑 */
    public function edit($id = 0){
        $user = db('user') -> where('id', $id) -> find();
        $this -> assign('user', $user);
        return view();
    }

    public function update () {
        $user = Request::instance()->post();
        $id = $user['id'];
		$user['pass'] = md5($user['pass']);
        db('user') -> where('id', $id) -> update($user);

        return $this -> redirect("index");
    }

    public function del($id = 0) {
        if($id != 0) {
            db('user') -> where('id', $id) -> delete();
        }
        
        return $this -> redirect("index");
    }
}