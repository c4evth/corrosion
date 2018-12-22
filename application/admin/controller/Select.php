<?php

namespace app\admin\controller;

use app\common\model\Dcate;
use app\common\model\Select as Model;
use app\common\model\Article;

use think\Controller;

class Select extends Common
{
    public function _initialize() {
        parent::_initialize();

        $this->assign([
            "pageTitle" => "每周精选管理",
        ]);
    }

    public function index () {
        $model = new Model;
        $articles = $model -> getAll();
        $this -> assign('articles', $articles);
        return view();
    }

    public function add ($aid = 0) {
        $articleModel = new Article();
        $model = new Model();
        if($aid != 0) {
            $data = ['aid' => $aid];
            $model -> add($data);
            return $this -> redirect('index');
        }
        $articles = $articleModel -> getAll();
        $this -> assign('articles', $articles);
        return view();
    }

    public function del ($id = 0) {
        if($id != 0) {
            $model = new Model();
            $model -> deleteById($id);
        }
        return $this -> redirect('index');
    }

}