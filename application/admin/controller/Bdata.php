<?php

namespace app\admin\controller;

use think\Controller;
use app\common\model\Bdata as Model;
use app\common\model\Bdcate;


class Bdata extends Common
{
    public function  _initialize () {
        parent::_initialize();

        $this -> assign([
            "pageTitle"    => "基础数据管理",
        ]);
    }

    public function index () {
      $model = new Model();
      $bdata = $model -> getAll();
      $this -> assign('bdata', $bdata);

      return view();
    }

    public function add () {
        $model = new Model();
        $acateModel = new Bdcate();
        $cates = $acateModel -> getAll();
        $this -> assign('cates', $cates);
        return view();
    }

    public function update() {
        $this -> assign('modifyed', false);
        $id = $this -> request -> post('id');
        $cid = $this -> request -> post('cid');
        $name = $this -> request -> post('name');
        $data = [
          'cid' => $cid,
          'name' => $name,
        ];
        $model = new Model();
        if(!$id) {
          $res = $model -> add($data);
        } else {
          $res = $model -> updateById($id, $data);
        }
        if($res) {
          $this -> assign('modifyed', true);
        }
    
        return $this -> redirect('bdata/index');
    }

    public function edit ($id = 0) {
        if($id == 0) return 0;
        $model = new Model();
        $bdata = $model -> get($id);
        $acateModel = new Bdcate();
        $cates = $acateModel -> getAll();
        $this -> assign('cates', $cates);
        $this -> assign('bdata', $bdata);

        return view();
    }

    public function del($id = 0) {
        if($id == 0) return 0;
        $model = new Model();
        $model -> where('id', $id) -> delete();

        return $this -> redirect('bdata/index');
    }
}