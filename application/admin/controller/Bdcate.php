<?php

namespace app\admin\controller;

use think\Controller;
use app\common\model\Bdcate as Model;

class Bdcate extends Common
{
    public function  _initialize () {
        parent::_initialize();

        $this -> assign([
            "pageTitle"    => "基础数据分类管理",
        ]);
    }

    public function index () {
      $model = new Model();
      $cate = $model -> getAll();
      $this -> assign('cate', $cate);

      return view();
    }

    public function add () {

        return view();
    }

    public function update() {
        $this -> assign('modifyed', false);
        $id = $this -> request -> post('id');
        $name = $this -> request -> post('name');
        $icon = $this -> request -> post('icon');
        $data = [
          'name' => $name,
          'icon' => $icon,
        ];
        $model = new Model();
        if(!$id) {
          $res = $model -> add($data);
        } else {
          $res = $model -> updateById($id, $data);
        }
    
        return $this -> redirect('Bdcate/index');
    }

    public function edit ($id = 0) {
        if($id == 0) return 0;
        $model = new Model();
        $cate = $model -> get($id);
        $this -> assign('cate', $cate);

        return view();
    }

    public function del($id = 0) {
        if($id == 0) return 0;
        $model = new Model();
        $model -> where('id', $id) -> delete();

        return $this -> redirect('Bdcate/index');
    }
}