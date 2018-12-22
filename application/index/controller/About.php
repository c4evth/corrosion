<?php
namespace app\index\controller;

use think\Controller;
use app\index\controller\Common;
use app\common\model\About as Model;

class About extends Common{
  public function _initialize(){
    parent::_initialize();
  }

  /**
   * 平台简介
   */
  public function Index(){
    $this -> assign('currTitle','平台简介');
    $model = new Model();
    $about = $model -> get(1);
    $this -> assign('INFO', $about);
    return view();
  }
}