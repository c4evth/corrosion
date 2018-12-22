<?php

namespace app\admin\controller;

use think\Controller;
use app\common\model\Site as Model;
use app\common\model\Carousel;
use app\common\model\Nav;
use app\common\model\Friends;
use app\common\model\Footer;

use app\common\controller\Upload;

class Site extends Common {
  public function _initialize()
  {
    parent::_initialize();
    $this -> assign('pageTitle', '站点设置');
  }
  /**
   * 基础信息
   */
  public function info () {
    $model = new Model();
    $siteInfo = $model -> getInfo();
    $this -> assign('site', $siteInfo);
    return view();
  }

  /**
   * 更新基础信息
   */
  public function updateInfo () {
    $this -> assign('modifyed', false);
    $title = $this -> request -> post("title");
    $vicetitle = $this -> request -> post("vicetitle");
    $description = $this -> request -> post("description");
    $vicedesc = $this -> request -> post("vicedesc");
    $data = [
      'title' => $title,
      'vicetitle' => $vicetitle,
      'description' => $description,
      'vicedesc' => $vicedesc
    ];
    $model = new Model();

    $res = $model -> updateById(1, $data);
    if($res) {
      $this -> assign('modifyed', true);
    }
    return view("edit");
  }

  /**
   * 首页幻灯片设置
   */
  public function carousel () {
    $carouselModel = new Carousel();

    $carousels = $carouselModel -> getAll();
    $this -> assign('carousels', $carousels);
    return view();
  }

  /**
   * 编辑幻灯片页面
   */
  public function editCarousel ($id = 0) {
    if($id == 0) {
      return 0;
    }
    $carouselModel = new Carousel();
    $carousel = $carouselModel -> get($id);
    $this -> assign("carousel", $carousel);
    return view();
  }

  /**
   * 更新/增加carousel操作
   */

  public function updateCarousel () {
    $this -> assign('modifyed', false);
    $id = $this -> request -> post('id');
    $img = $this -> request -> post('img');
    $linkto = $this -> request -> post('linkto');
    $data = [
      'img' => $img,
      'linkto' => $linkto
    ];
    $carouselModel = new Carousel();
    if(!$id) {
      $res = $carouselModel -> add($data);
    } else {
      $res = $carouselModel -> updateById($id, $data);
    }
    if($res) {
      $this -> assign('modifyed', true);
    }

    return $this -> redirect("site/carousel");
  }

  /**
   * 删除操作
   */
  public function delCarousel($id) {
    if(!$id) {
      return 0;
    }
    $carouselModel = new Carousel();
    $res = $carouselModel -> deleteById($id);

    return $this -> redirect("site/carousel");
  }

  public function addCarousel () {

    return view();
  }

  /**
   *****************    导航设置      *****************************
   *****************    导航设置      *****************************
   *****************    导航设置      *****************************
   */
  public function nav () {
    $model = new Nav();
    $navs = $model -> getAll();

    $this -> assign('navs', $navs);
    return view();
  }

  public function editNav ($id) {
    if(!$id) return 0;
    $model = new Nav();
    $nav = $model -> get($id);

    $this -> assign('nav', $nav);
    return view();
  }

  public function updateNav() {
    $this -> assign('modifyed', false);
    $id = $this -> request -> post('id');
    $img = $this -> request -> post('name');
    $linkto = $this -> request -> post('linkto');
    $priority = $this -> request -> post('priority');
    $data = [
      'name' => $img,
      'linkto' => $linkto,
      'priority' => $priority,
    ];
    $navModel = new Nav();
    if(!$id) {
      $res = $navModel -> add($data);
    } else {
      $res = $navModel -> updateById($id, $data);
    }
    if($res) {
      $this -> assign('modifyed', true);
    }

    return $this -> redirect("site/nav");
  }

  public function addNav () {
    return view();
  }

  /**
   * 删除操作
   */
  public function delNav($id) {
    if(!$id) {
      return 0;
    }
    $NavModel = new Nav();
    $res = $NavModel -> deleteById($id);

    return $this -> redirect("site/Nav");
  }

  /**
   *****************    友情链接      *****************************
   *****************    友情链接      *****************************
   *****************    友情链接      *****************************
   */

  public function friends () {
    $model = new Friends();
    $friends = $model -> getAll();

    $this -> assign('friends', $friends);
    return view();
  }

  public function editFriends ($id) {
    if(!$id) return 0;
    $model = new Friends();
    $nav = $model -> get($id);

    $this -> assign('nav', $nav);
    return view();
  }

  public function updateFriends() {
    $this -> assign('modifyed', false);
    $id = $this -> request -> post('id');
    $img = $this -> request -> post('name');
    $linkto = $this -> request -> post('linkto');
    $data = [
      'name' => $img,
      'linkto' => $linkto
    ];
    $navModel = new Friends();
    if(!$id) {
      $res = $navModel -> add($data);
    } else {
      $res = $navModel -> updateById($id, $data);
    }
    if($res) {
      $this -> assign('modifyed', true);
    }

    return $this -> redirect("site/friends");
  }

  public function addFriends () {
    return view();
  }

  public function delFriends($id) {
    if(!$id) {
      return 0;
    }
    $NavModel = new Friends();
    $res = $NavModel -> deleteById($id);

    return $this -> redirect("site/Friends");
  }

  /**
   *****************    页脚      *****************************
   *****************    页脚      *****************************
   *****************    页脚      *****************************
   */

  public function footer ($content = '') {
    $model = new Footer();
    if($content != '') {
      $data = ['content' => $content];
      $model -> updateById(1, $data);
      $this -> assign("hint", "修改成功！");
    }
    $footer = $model -> getInfo();
    $content = $footer['content'];
    $this -> assign("content", $content);
    $this -> assign("hint", "");

    return view("footer");
  }
}