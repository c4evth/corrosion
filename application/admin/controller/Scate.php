<?php

namespace app\admin\controller;

use think\Controller;
use app\common\model\Scate as Model;

class Scate extends Common
{
  public function  _initialize () {
    parent::_initialize();

    $this -> assign([
        "pageTitle"    => "标准分类",
        // 'currMessager' => $currMessager,
    ]);
  }
  public function index () {
    $model = new Model();
    $cates = $model -> getAll();
    $this -> assign('cates', $cates);
    return view();
  }

  /**
   * 添加一级分类页面
   */
  public function add () {
    $model = new Model();
    $cates = $model -> getByLevel(1);
    $this -> assign('cates', $cates);
    return view();
  }

   /**
   * 添加二级分类页面
   */
  public function addchild () {
    $model = new Model();
    $cates = $model -> getByLevel(1);
    $this -> assign('cates', $cates);
    return view('addchild');
  }

  /**
   * 更新分类
   */
  public function updateScate() {
    $id = $this -> request -> post('id');
    $name = $this -> request -> post('name');
    $parent = $this -> request -> post('parent');
    $data = [
      'name' => $name,
    ];
    if($parent != "0") {
      //是二级分类
      $data['parent'] = $parent;
      $data['level'] = 2;
    }
    $model = new Model();
    if(!$id) {
      $res = $model -> add($data);
    } else {
      $res = $model -> updateById($id, $data);
    }
    if($res) {
      $this -> assign('modifyed', true);
    }

    return $this -> redirect("scate/index");
  }

  public function edit ($id = 0) {
    if($id == 0) {
      return 0;
    }
    $model = new Model();
    $cate = $model -> get($id);
    $cate['parentname'] = '';
    $level = $cate['level'];
    if($level == 2) {
      $parentCate = $model -> get($cate['parent']);
      $cate['parentname'] = $parentCate['name'];
    }
    $cates = $model -> getByLevel(1);
    $this -> assign('cates', $cates);
    $this -> assign('cate', $cate);

    return view();
  }

  /**
   * 删除操作
   */
  public function del($id) {
    if(!$id) {
      return 0;
    }
    $carouselModel = new Model();
    $res = $carouselModel -> deleteById($id);

    return $this -> redirect("scate/index");
  }
}