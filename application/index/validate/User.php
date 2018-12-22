<?php

namespace app\index\validate;


use think\Validate;

class User extends Validate
{
    /* 验证规则 */
    protected $rule  = [
        'name'       => 'require|min:4',
        'phone'      => 'require|max:11|/^1[3-8]{1}[0-9]{9}$/',
        'pass'       => 'require|min:8',
        'repass'     => 'confirm:pass',
        'gender'     => 'between:0,1|require',
        'saying'     => 'max:600',
        'code'       => 'require|captcha',
    ];

    /* 验证提示信息 */
    protected $message = [
        'name.require'       => '账号不能为空',
        'name.min'           => '账号长度必须大于等于4位',
        'phone.require'      => '手机号不能为空',
        'phone.max'          => '手机号码最多不超过11位',
        'phone./^1[3-8]{1}[0-9]{9}$/' => '手机号码格式不正确',
        'code.require'       => '验证码不能为空',
        'pass.require'       => '密码不能为空',
        'pass.min'           => '密码长度必须大于或者等于8位',
        'repass.confirm'     => '两次输入密码不一致',
        'gender.between'     => '年龄只能是女或者男',
        'gender.require'     => '年龄不能为空',
        'saying.max'         => '200字内介绍自己',
    ];

    /* 场景验证 */
    protected $scene   =  [
        'login'  => ['code'],
        'loginByPhone' => ['phone','code'],
        'register'     => ['name' => 'require|min:4','pass','repass'],
        'safeInfo'     => ['pass', 'repass'],
        'basicInfo'    => ['name', 'gender', 'saying'],
    ];
}