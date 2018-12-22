<?php
//配置文件
return [
    'view_replace_str'  => [
        '__ADMIN__'     => '/static/admin',
        '__ADMIN_CSS__' => '/static/admin/css',
        '__ADMIN_JS__'  => '/static/admin/js',
        '__PUBLIC__'    => '/static',
        '__UPLOADS__'   => '/uploads',
				'__LAYUI__'     => '/vendor/layui',
				'__JQUERY__'    => '/vendor/js'
    ],
    'session'          => [
        'prefix'       => 'admin',
        'type'         => '',
        'auto_start'   => true,
    ],
];
