<?php
namespace app\index\controller;

use think\Controller;
use app\index\controller\Common;
use app\common\model\Article as Model;
use app\common\model\Acate;


class Article extends Common{
  public function _initialize(){
    parent::_initialize();
  }

  /**
   * 一篇文章
   */
  public function Index($id = 0){
    if($id != 0) {
        $model = new Model();
        $article = $model -> get($id);
    }
    $this -> assign('currTitle', $article['title']);
    $this -> assign('article', $article);
    return view();
  }

  public function cate ($id = 0) {
    $model = new Model();
    $acateMoel = new Acate();
    if($id != 0) {
      $cate = $acateMoel -> get($id);
      $articles = $model -> where('cid', $id) -> select();
    } else {
      $articles = [];
      $cate = ['name' => ''];
    }
    $ats = [];
    foreach($articles as $article) {
      $article['content'] = strip_tags($article['content']);

      array_push($ats, $article);
    }
    $this -> assign('currTitle', $cate['name']);
    $this -> assign('articles', $articles);
    $this -> assign('cate', $cate);

    return view();
  }

	/**
	 * 文章列表
	 * @param page 当前页
	 */
  public function newsList($page = 1) {
		$model = new Model();
		$articleAll = $model -> getAll();
		$length = 10;  // 每页数
		$count = count($articleAll);  // 文章总数
		$pageLength = intval(ceil($count / $length)); // 分页数

		$hasPageNext = false;
		$hasPagePre = false;
		if($page - 1 != 0){
			$hasPagePre = true;
		}
		if($page != $pageLength){
			$hasPageNext = true;
		}

		$pageInfo = $this -> makePageStyle($pageLength,$page);
		$start = $length * ($page - 1);
		$currPage = $page;
		$articles = $model -> getAllCardLimit($start, $length);
		
		$this -> assign([
			'pageName'    => '最新资讯',
			'data'        => $articles,
			'pageConunt'  => $pageInfo,
			'currPage'    => $currPage,
			'hasPagePre'  => $hasPagePre,
			'hasPageNext' => $hasPageNext,
			'count'       => $pageLength,
		]);
    return view('newsList');
  }

  /**
   * 搜索页面
	 * @param key  检索值
	 * @param page 当前分页
   */
  public function search ($key = '', $page = 1) {
		$model = new Model();
		$currKey = $key;
		$returnKey = $key;
		$articleAll = $model -> getSearchConut($key);
		$length = 10;  // 每页数
		$count = count($articleAll);  // 文章总数
		$pageLength = intval(ceil($count / $length)); // 分页数

		$hasPageNext = false;
		$hasPagePre = false;
		if($page - 1 != 0){
			$hasPagePre = true;
		}
		if($page != $pageLength){
			$hasPageNext = true;
		}

		$pageInfo = $this -> makePageStyle($pageLength,$page);
		$start = $length * ($page - 1);
		$currPage = $page;

		$articles = $model -> search($currKey, $start, $length);
		
		
		$this -> assign([
			'pageName'    => '专题数据',
			'data'        => $articles,
			'pageConunt'  => $pageInfo,
			'currPage'    => $currPage,
			'hasPagePre'  => $hasPagePre,
			'hasPageNext' => $hasPageNext,
			'count'       => $pageLength,
			'pageName'    => "搜索：$key",
			'searchKey'         => "$returnKey",
		]);
    return view('search');
  }


	/**
	 * 专题数据
	 * @param page 当前分页
	 */
  public function dataProList($page = 1) {
		$currController = 'dataProList';  // 存储当前控制器
		$model = new Model();
		$articleAll = $model -> getCateCard(6);
		$length = 10;  // 每页数
		$count = count($articleAll);  // 文章总数
		$pageLength = intval(ceil($count / $length)); // 分页数

		$hasPageNext = false;
		$hasPagePre = false;
		if($page - 1 != 0){
			$hasPagePre = true;
		}
		if($page != $pageLength){
			$hasPageNext = true;
		}

		$pageInfo = $this -> makePageStyle($pageLength,$page);
		$start = $length * ($page - 1);
		$currPage = $page;

		$articles = $model -> getCateCardByLimit(6, $start, $length);
		
		$this -> assign([
			'pageName'    => '专题数据',
			'data'        => $articles,
			'pageConunt'  => $pageInfo,
			'currPage'    => $currPage,
			'hasPagePre'  => $hasPagePre,
			'hasPageNext' => $hasPageNext,
			'count'       => $pageLength,
			'Controller'  => $currController,
		]);

    return view('list');
  }

  /**
   * 数据动态
	 * @param page 当前分页
   */
  public function dataActivity($page = 1) {
		$currController = 'dataActivity'; // 存储当前控制器
		$model = new Model();
		$articleAll = $model -> getCateCard(9);
		$length = 10;  // 每页数
		$count = count($articleAll);  // 文章总数
		$pageLength = intval(ceil($count / $length)); // 分页数

		$hasPageNext = false;
		$hasPagePre = false;
		if($page - 1 != 0){
			$hasPagePre = true;
		}
		if($page != $pageLength){
			$hasPageNext = true;
		}

		$pageInfo = $this -> makePageStyle($pageLength,$page);
		$start = $length * ($page - 1);
		$currPage = $page;

		$articles = $model -> getCateCardByLimit(9, $start, $length);
		
		$this -> assign([
			'pageName'    => '数据动态',
			'data'        => $articles,
			'pageConunt'  => $pageInfo,
			'currPage'    => $currPage,
			'hasPagePre'  => $hasPagePre,
			'hasPageNext' => $hasPageNext,
			'count'       => $pageLength,
			'Controller'  => $currController,
		]);

    return view('list');
	}
	
	/**
	 * 获取分页数
	 * @param  pages 分页总数
	 * @param  curr  当前分页
	 * @return arr   已经排好位置的分页信息
	 */
	private function makePageStyle($pages,$curr){
		$arr = [];
		if($pages > 10 && $curr > 3){
			$result = $pages - $curr;
			if($result > 8){
				$j = 0;
				for($i = $curr - 3; $i < $curr + 7; $i++){
					$arr[$j] = $i + 1;
					$j += 1;
				}
				return $arr;
			}
			else{
				$j = 0;
				$start = 10 -($pages -$curr);
				for($i =  $curr - $start + 1; $i <= $pages; $i++){
					$arr[$j] = $i;
					$j += 1;
				}
				return $arr;
			}
		}elseif($pages > 10 && $curr <= 3){
			for($i = 0; $i < 10; $i++){
				$arr[$i] = $i + 1;
			}
			return $arr;
		}else{
			for($i = 0; $i < $pages; $i++){
				$arr[$i] = $i + 1;
			}
			return $arr;
		}
	}
}