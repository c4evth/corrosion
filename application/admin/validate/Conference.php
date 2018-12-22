<?php

namespace app\admin\validate;


use think\Validate;

class Conference extends Validate
{
    /* 验证规则 */
    protected $rule  = [
        'title'       => 'require|min:4|token',
        'host'        => 'require',
        'hostlogo'    => 'require',
				'theme'       => 'require',
				'waittime'    => 'require',
				'banner'      => 'require',
				'historypic'  => 'require',
				'ballid'      => 'require',
				'cid'         => 'require',
				'name'        => 'require',
				'remark'      => 'require',
				'Href'        => 'require|token',
    ];

    /* 验证提示信息 */
    protected $message = [
        'title.require'       => '会议标题不能为空',
				'title.min'           => '会议标题长度必须大于等于4位',
				'title.token'         => '请不要重复提交表单',
				'host.require'       	=> '主办方名称不能为空',
				'theme.require'       => '会议主题不能为空',
				'waittime.require'    => '会议时间不能为空',
				'hostlogo.require'    => '主办方logo不能为空',
				'banner.require'      => '会议轮播图不能为空',
				'historypic.require'  => '往届图片不能为空',
				'ballid.require'      => '会议编号不能为空',
				'cid.require'         => '组织分类不能为空',
				'Href.require'        => '组织链接不能为空',
				'name.require'        => '组织名称不能为空',
				'remark.require'      => '组织名称不能为空',
				'name.token'          => '请不要重复提交表单',
    ];

    /* 场景验证 */
    protected $scene   =  [
				'add'          => ['title', 'host', 'hostlogo','theme','waittime'],
				'edit'         => ['host', 'hostlogo','theme','waittime'],
				'addbanner'    => ['banner','ballid'],
				'addpic'       => ['historypic','ballid'],
				'addorg'       => ['ballid','cid','name','Href'],
				'addCate'      => ['name', 'remark'],
    ];
}