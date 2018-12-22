<?php

// 配置文件
return [
    'view_replace_str' =>[
        '__INDEX__'    => '/static/index',
        '__VENDOR__'   => '/static/vendor',
    ],
    'session'          => [
        'prefix'       => 'index',
        'type'         => '',
        'auto_start'   => true,
		],
];