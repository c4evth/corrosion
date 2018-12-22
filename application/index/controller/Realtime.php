<?php
namespace app\index\controller;

use think\Controller;
use app\index\controller\Common;

class Realtime extends Common
{
  public function _initialize(){
    parent::_initialize();
  }

  /**
   * 实时数据,环境腐蚀性
   */
  public function index(){
    $this -> assign('currTitle','实时数据');
    return view();
  }

  /**
   * 实时数据，材料腐蚀性
   */
  public function material(){
    $this -> assign('currTitle', '材料腐蚀性');
    return view();
  }
}