<?php

namespace app\admin\controller;

use app\admin\model\Admin;
use think\Controller;
use think\Session;

class Messager extends Common
{
    public function _initialize()
    {
        parent::_initialize();
        $this->assign("pageTitle", "管理员列表");
    }

    /* 管理员列表 */
    public function index()
    {
        $MessagerList = db('admin')->select();
        $this->assign('MessagerList', $MessagerList);
        return view();
    }

    /* 添加管理员 */
    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
            /* 判断当前管理员是不是超级管理员，只有超级管理员才能添加管理员 */
            $currAdmin = session('Messager');
            $getID = db('admin')->where('name', $currAdmin)->find();
            if ($getID['id'] != 1) {
                $this->error('很遗憾！只有超级管理员才能进行此操作!', 'admin/Messager/index');
            }

            /* 检查用户数据 */
            $result = $this->addCheck($data);
            if ($result['code'] == 0) {
                $this->error($result['msg']);
            }
            $this->success($result['msg'], 'admin/Messager/index');
        }
        return view('add');
    }

    /* 修改管理员密码 (未完成) */
    public function resetPass()
    {
        if (request()->isPost()) {
            $data = input('post.');
            /* 判断管理员输入的密码是否正确 */
            $AdminPass = db('admin')->where('name', $currAdmin)->find();
            if ($AdminPass['pass'] != md5($data['oldPass'])) {
                $this->error('请输入正确的管理员密码!');
            }

            /* 对新密码提交的数据进行验证 */
            unset($data['oldPass']);
            $validate = Validate('Admin');
            if (!$validate->scene('resetpass')->check($data)) {
                $this->error($validate->getError());
            }

            /* 整理数据写入数据库 */
            $data['pass'] = md5($data['pass']);
            $Admin = new Admin();
            $Admin->data($data);
            $sql = $Admin->allowField(true)->save();
            if (!$sql) {
                $this->error('服务器出错!');
            }
            $this->success('更改密码成功!', 'admin/messager/index');
        }
        return view('resetPass');
    }

    /* 删除管理员 */
    public function del($id)
    {
        /* 超级管理员不允许删除 */
        if ($id == 1) {
            // $this -> json(['code' => 0, 'msg' => '超级管理员不能删除']);
            $this->error('超级管理员不允许删除', 'messager/index', "", "1");
        }
        $result = db('admin')->where('id', $id)->delete();
        $this->success('删除成功', 'messager/index', "", "1");
    }

    /**
     * 添加管理员验证
     * @param  $data 添加的管理员信息
     * @return arry['code','msg]
     */
    protected function addCheck($data)
    {
        /* 数据格式验证 */
        $validate = Validate('Admin');
        if (!$validate->scene('add')->check($data)) {
            return [
                'code' => 0,
                'msg' => $validate->getError(),
            ];
        }

        /* 检查管理员名称是否已经存在 */
        $Admin = new Admin();
        $result = $Admin->where('name', $data['name'])->find();
        if ($result) {
            return [
                'code' => 0,
                'msg' => '管理员名已被占用!',
            ];
        }

        /* 数据验证通过 */
        unset($data['repass']);
        $data['pass'] = md5($data['pass']);
        $data['lltime'] = date('Y-m-d H:i:sa', time());
        $Admin = new Admin();
        $Admin->data($data);
        $sql = $Admin->allowField(true)->save();
        if (!$sql) {
            return [
                'code' => 0,
                'msg' => '服务器异常',
            ];
        }
        return [
            'code' => 1,
            'msg' => '管理员添加成功!',
        ];
    }
}
