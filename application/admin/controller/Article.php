<?php

namespace app\admin\controller;

use think\Controller;
use app\common\model\Article as Model;
use app\common\model\Acate;


class Article extends Common
{
    public function  _initialize () {
        parent::_initialize();

        $this -> assign([
            "pageTitle"    => "文章管理",
        ]);
    }

    public function index () {
      $model = new Model();
      $articles = $model -> getAll();
      $this -> assign('articles', $articles);

      return view();
    }

    public function add () {
        $model = new Model();
        $acateModel = new Acate();
        $cates = $acateModel -> getAll();
        $this -> assign('acates', $cates);

        return view();
    }

    public function update() {
        $this -> assign('modifyed', false);
        $id = $this -> request -> post('id');
        $cid = $this -> request -> post('cid');
        $title = $this -> request -> post('title');
        $authors = $this -> request -> post('authors');
        $src = $this -> request -> post('src');
        $cover = $this -> request -> post('cover');
        $content = $this -> request -> post('content');
        $data = [
          'cid' => $cid,
          'title' => $title,
          'authors' => $authors,
          'src' => $src,
          'cover' => $cover,
          'content' => $content,
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
        return $this -> redirect('article/index');
    }

    public function edit ($id = 0) {
        if($id == 0) return 0;
        $model = new Model();
        $article = $model -> get($id);
        $acateModel = new Acate();
        $cates = $acateModel -> getAll();
        $this -> assign('acates', $cates);
        $this -> assign('article', $article);

        return view();
    }

    public function del($id = 0) {
        if($id == 0) return 0;
        $model = new Model();
        $model -> where('id', $id) -> delete();

        return $this -> redirect('article/index');
    }
}