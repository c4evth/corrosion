<?php

namespace app\index\validate;

use think\Validate;

class Enlist extends Validate
{
    /* 验证规则 */
    protected $rule  = [
        'name'       => 'require|min:4|token',
        'phone'      => 'require|max:11|/^1[3-8]{1}[0-9]{9}$/',
        'email'      => 'require|/^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/',
        'org'        => 'require',
				'hasPaper'      => 'between:0,1|require',
				'isReport'     => 'between:0,1|require',
    ];

    /* 验证提示信息 */
    protected $message = [
        'name.require'       => '账号不能为空',
				'name.min'           => '账号长度必须大于等于4位',
				'name.token'         => '请不要重复提交表单',
        'phone.require'      => '手机号不能为空',
        'phone.max'          => '手机号码最多不超过11位',
				'phone./^1[3-8]{1}[0-9]{9}$/' => '手机号码格式不正确',
				'email.require'      => '邮箱不能为空',
        'email./^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/' => '邮箱格式不正确',
        'org.require'        => '单位不能为空',
        'hasPaper.require'   => '是否有论文不能为空',
        'hasPaper.between'   => '是否有论文只能是‘是’或者‘否’',
        'isReport.require'   => '是否做报告不能为空',
        'isReport.between'   => '是否做报告只能是‘是’或者‘否’',
    ];

    /* 场景验证 */
    protected $scene   =  [
        'join' => ['name', 'phone', 'email', 'org', 'hasPaper', 'isReport'],
    ];
}