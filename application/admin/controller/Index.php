<?php
namespace app\admin\controller;

use think\Controller;


class Index extends Common
{
    public function  _initialize () {
        parent::_initialize();

        $this -> assign([
            "pageTitle"    => "标准列表",
        ]);
    }
    public function index()
    {
        return view();
    }
}
