<?php

namespace app\admin\model;

use think\Model;

class Common extends Model
{
    protected function initialize(){
        parent::initialize();
    }

    /**
     * 获取器
     * 自定义获取器将数据表中的int类型的值处理为字符串类型，用于前台展示
     * @param   $value 处理前的值
     * @return  $gender 处理后的值
     */
    public function getSex($value){
        $gender = [
            0 => '女',
            1 => '男',
        ];
        return $gender[$value];
    }
}