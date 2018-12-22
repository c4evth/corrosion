<?php

namespace app\admin\validate;


use think\Validate;

class Admin extends Validate
{
    /* 验证规则 */
    protected $rule  = [
        'name'       => 'require|min:4',
        'pass'       => 'require|min:8',
        'repass'     => 'confirm:pass',
        'code'    => 'require|captcha',
    ];

    /* 验证提示信息 */
    protected $message = [
        'name.require'       => '账号不能为空',
        'name.min'           => '账号长度必须大于等于4位',
        'name.uniquee'       => '账号已存在',
        'pass.require'       => '密码不能为空',
        'pass.min'           => '密码长度必须大于或者等于8位',
        'repass.confirm'     => '两次输入密码不一致',
        'code.require'       => '验证码不能为空',
        'code.captcha'       => '验证码不正确',
    ];

    /* 场景验证 */
    protected $scene   =  [
        'login'        => ['name', 'pass','code'],
        'add'          => ['name', 'pass', 'repass'],
        'resetpass'    => ['pass', 'repass'],
    ];
}