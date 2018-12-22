<?php

namespace app\admin\controller;

use think\Controller;

class Common extends Controller
{
    /* 初始化控制器 */
    public function _initialize(){
        parent::_initialize();
        /* 开启session */
        // session_start();
        /* 判断管理员是否登录，如果session为空自动跳转到登录界面 */
        if (!session('Messager', '', 'admin')){
            $controller    = request()->controller();  // 获取当前控制器
            $action        = request()->action();  // 获取当前方法
            /* 控制器为index,且方法名为index时不用设置页面跳转 */
            if($controller === 'Index' && $action === 'index'){
               $this->redirect('login/index');
            }
            $this->error('未登录，不允许访问！','login/index');
        }

        /* 获取当前登录的管理员并分配到前端的header中 */
        $currMessager = session("Messager");
        $this -> assign('currMessager', $currMessager);
    }
}