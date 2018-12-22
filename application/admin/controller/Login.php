<?php

namespace app\admin\controller;

use think\Controller;
use think\Session;

class Login extends Controller
{
    /* 管理员登录 */
    public function index()
    {
        if (request()->isPost()) {
            $data = input('post.');
            /* 检查用户数据 */
            $result = $this -> loginCheck($data);
            // dump($result);die;
            if ($result['code'] == 0) {
                $this->error($result['msg']);
            }
            /* 登录成功 */
            // $this->success($result['msg'], '');
            $this->redirect('admin/index/index');
        }
        return view();
    }

    /* 退出登录 */
    public function logOut(){
        session(null,'admin'); // 删除保存在session中的值
        $this->success('退出成功！','login/index');
    }

    /**
     * 管理员登录验证，先进行格式验证以减少数据库的访问量，来减少服务器压力
     * @param  $data 管理员的登录信息
     * @return array['code','msg']
     */
    protected function loginCheck($data)
    {
        /* 对数据做格式验证 */
        $validate = Validate('Admin');
        if (!$validate->scene('login')->check($data)) {
            return [
                'code' => 0,
                'msg' => $validate->getError(),
            ];
        }

        /* 格式通过后进行数据库验证 */
        $result = db('admin')->where('name', $data['name'])->find();
        if (!$result) {
            return [
                'code' => 0,
                'msg' => '管理员不存在！',
            ];
        }

        /* 验证密码是否正确 */
        if ($result['pass'] != md5($data['pass'])) {
            return [
                'code' => 0,
                'msg' => '管理员密码不正确，请重试……',
            ];
        }

        /* 通过登录验证将管理员存入session */
        session('Messager', $data['name'], 'admin');
        return [
            'code' => 1,
            'msg' => '登录成功!',
        ];
    }
}