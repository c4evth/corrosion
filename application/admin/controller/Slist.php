<?php

namespace app\admin\controller;

use think\Controller;
use app\common\model\Slist as Model;
use app\common\model\Standard;


class Slist extends Common
{
  public function  _initialize () {
    parent::_initialize();

    $this -> assign([
        "pageTitle"    => "标准列表",
        // 'currMessager' => $currMessager,
    ]);
  }

  public function index ($sid = 0) {
    if($sid == 0) {
      $slist = [];
    } else {
      $model = new Model();
      $slist =  $model -> where("sid", $sid) -> order("id", "desc") -> select();
    }
    $parentModel = new Standard();
    $parentData = $parentModel -> get($sid);
    $this -> assign('parentData', $parentData);
    $this -> assign("slist", $slist);
    $this -> assign("sid", $sid);

    return view();
  }

  public function edit ($id = 0) {
    if($id == 0) {
      return 0;
    }
    $model = new Model();
    $astandard = $model -> get($id);
    $this -> assign("astandard", $astandard);
    return view();
  }

  public function update() {
    $id = $this -> request -> post('id');
    $num = $this -> request -> post('num');
    $name = $this -> request -> post('name');
    $impletime = $this -> request -> post('impletime');
    $department = $this -> request -> post('department');
    $pdf = $this -> request -> post('pdf');

    $data = [
      'num' => $num,
      'name' => $name,
      'impletime' => $impletime,
      'department' => $department,
      'pdf' => $pdf,
    ];
    $model = new Model();
    if(!$id) {
      $data['sid'] = $this -> request -> post('sid');
      $id = $model -> add($data);
      return $this -> redirect("slist/index", ['sid' => $data['sid']]);
    }

    $res = $model -> updateById($id, $data);
    $astandard = $model -> get($id);
    $this -> assign("astandard", $astandard);
    return view("edit", ['id' => $id]);
  }

  /**
   * 删除操作
   */
  public function del($id, $sid) {
    if(!$id || !$sid) {
      return 0;
    }
    $carouselModel = new Model();
    $res = $carouselModel -> deleteById($id);

    return $this -> redirect("slist/index", ['sid' => $sid]);
  }

  public function add ($sid = 0) {
    if($sid == 0) {
      return 0;
    }
    $this -> assign("sid", $sid);
    return view();
  }
}