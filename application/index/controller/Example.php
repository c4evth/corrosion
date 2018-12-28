<?php
namespace app\index\controller;

use think\Controller;
use app\index\controller\Common;
use app\common\model\Article as Model;
use app\common\model\Acate;



class Example extends Common
{
  public function _initialize(){
    parent::_initialize();
  }

  /**
   * 应用案例
   */
  public function index() {
    $articleModel = new Model();
    $acateModel = new Acate();
    $cates = $acateModel -> getAll();
    $this -> assign('cates', $cates);
    $res = [];
    $i = 0;
    foreach($cates as $cate) {
      $acate = [];
      $cid = $cate['id'];
      $articles = $articleModel -> getBrief(3, [
        'cid' => $cid,
      ]);
      $acate['index']    = $i;
      $acate['name']     = $cate['name'];
			$acate['articles'] = $articles;
			$acate['cid']      = $cid;
      if(count($articles) >= 1) {
        array_push($res, $acate);
      }
      $i++;
    }
    $this -> assign('currTitle','应用案例');
    // var_dump($res);
    // return 0;
    $this -> assign('data', $res);
    return view();
	}
	
	public function list($cid = 1, $page = 1){
		$currCid = $cid;
		$model = new Model();
		$articleAll = $model -> getCateCard($cid);
		$length = 10;  // 每页数
		$count = count($articleAll);  // 文章总数
		$pageLength = intval(ceil($count / $length)); // 分页数

		/* 判断上下一页是否有值 */
		$hasPageNext = false;
		$hasPagePre = false;
		if($page - 1 != 0){
			$hasPagePre = true;
		}
		if($page != $pageLength){
			$hasPageNext = true;
		}

		// 获取当前分类名字
		$cateModel = new Acate();
		$currCate = $cateModel -> getCateById($cid);
		$currCateName = $currCate -> name;

		// 获取分页信息
		$pageInfo = $this -> makePageStyle($pageLength, $page);
		$start = $length * ($page - 1);
		$currPage = $page;

		$articles = $model -> getCateCardByLimit($cid, $start, $length);
    $res = [];
    foreach($articles as $article) {
        $article['content'] = strip_tags(mb_substr($article['content'], 0, 200));

        array_push($res, $article);
    }
    $this -> assign([
			'pageName'   => '应用案列 &gt;'.$currCateName,
			'data'        => $articles,
			'pageConunt'  => $pageInfo,
			'currPage'    => $currPage,
			'hasPagePre'  => $hasPagePre,
			'hasPageNext' => $hasPageNext,
			'count'       => $pageLength,
			'currCid'     => $currCid,
		]);


		return view('list');
	}

  /**
   * 重大案例
   */
  public function majorCase(){
    $this -> assign('currTitle', '重大案例');
    return view('majorCase');
  }

  /**
   * 专题服务
   */
  public function special(){
    $this -> assign('currTitle', '专题服务');
    return view();
	}

	/**
   * 会议
   */
  public function ball(){
    $this -> assign('currTitle', '专题服务');
    return view();
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