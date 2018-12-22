<?php
namespace app\admin\controller;

use think\Controller;
use app\common\model\Acate as Model;

class Acate extends Common
{
    public function  _initialize () {
        parent::_initialize();

        $this -> assign([
            "pageTitle"    => "文章管理",
        ]);
    }

    public function index () {
        $model = new Model();
        $navs = $model -> getAll();
    
        $this -> assign('cates', $navs);
        return view();
    }
    
    public function edit ($id) {
        if(!$id) return 0;
        $model = new Model();
        $nav = $model -> get($id);

        $this -> assign('acate', $nav);
        return view();
    }

    public function update() {
        $this -> assign('modifyed', false);
        $id = $this -> request -> post('id');
        $name = $this -> request -> post('name');
        $data = [
            'name' => $name,
        ];
        $navModel = new Model();
        if(!$id) {
            $res = $navModel -> add($data);
        } else {
            $res = $navModel -> updateById($id, $data);
        }
        if($res) {
            $this -> assign('modifyed', true);
        }

        return $this -> redirect("acate/index");
    }

    public function add () {
        return view();
    }

    /**
     * 删除操作
     */
    public function del($id) {
        if(!$id) {
            return 0;
        }
        $NavModel = new Model();
        $res = $NavModel -> deleteById($id);

        return $this -> redirect("acate/index");
    }
}
