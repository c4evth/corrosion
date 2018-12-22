<?php
namespace app\index\controller;

use think\Controller;
use app\index\controller\Common;
use app\common\controller\Scate as commonScate;
use app\common\controller\Standard as commonStandard;

class Standard extends Common

{
  public function _initialize()
  {
    parent::_initialize();
  }

  /**
   * 标准规范
   */
  public function index()
  {
    /* 获取全部标准分类 */
    $modelScate = new commonScate();
    $parentScate = json_decode($modelScate->getScateByLevel(1));
    $childScate = json_decode($modelScate->getScateByLevel(2));

    /* 获取全部标准 */
    $modelStandard = new commonStandard();
    $standard = json_decode($modelStandard->getStandard());
    // dump($parentScate);
    // die;

    $this->assign([
      'currTitle' => '标准规范',
      'parentScate' => $parentScate,
      'childScate' => $childScate,
      'standard' => $standard,
    ]);
    return view();
  }

  /**
   * 标准详情
   */
  public function dataShow($id = 0)
  {
    $modelSlist = new commonStandard();
		$slist = json_decode($modelSlist->getSlistBySid($id));
		
		$modelScate = new commonScate();
    $parentScate = json_decode($modelScate->getScateByLevel(1));
    $this->assign([
			'slist'  => $slist,
			'parent' => $parentScate,
    ]);
    return view('dataShow');
	}
}