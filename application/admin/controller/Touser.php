<?php

namespace app\admin\controller;

use app\common\model\User;
use app\common\model\Touser as Model;

use think\Controller;
use think\Request;


class Touser extends Common
{
    public function _initialize() {
        parent::_initialize();

        $this->assign([
            "pageTitle" => "发送消息",
        ]);
    }

    public function index ($key = '') {
        $model = new User;
        if($key == '')
            $users = [];
        else {
            $users = $model -> where('name', 'LIKE', "%$key%") -> select();
        }
        $this -> assign('users', $users);
        return view();
    }

    public function add ($uid = 0) {
        $this -> assign('uid', $uid);
        return view();
    }

    public function send () {
        $info = Request::instance()->post();
        $model = new Model;
        $model -> add($info);
        $this -> assign('result', "发送成功！");

        return view('result');
    }

}