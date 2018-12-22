<?php
namespace app\index\controller;

use think\Controller;
use app\index\controller\Common;




class Equip extends Common
{
  public function _initialize(){
    parent::_initialize();
  }

  public function index () {

    $this -> assign([
      'hasPagePre' => true,
      'pageConunt' => 4,
      'currPage' => 2,
      'hasPageNext' => true,
    ]);
    return view();
  }
}