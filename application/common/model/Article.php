<?php

namespace app\common\model;

use think\Model;
use app\common\model\Token;

/**
 * 文章层
 */
class Article extends Model
{
  /**
   * 获取所有行
   */
  public function getAll() {
    $model = $this -> newInstance();

    return $model -> order('id', 'desc') -> select();
	}
	
	/**
	 * 根据id查询文章
	 * 创建时间 2018/12/4
	 * @author ipso
	 */
	public function getByID($id){
		$model = $this -> newInstance();
		$res = $model -> where('id', $id) -> find();
		return $res;
	}

	/**
	 * 获取所有符合条件的文章标题
	 * @param ids id数组
	 */
	public function getTitles($ids){
		$model = $this -> newInstance();
		return $model -> where('id', 'in', $ids) -> field('id,title') -> select();
	}

  /**
   * 获取最新咨询
   */
  public function getNews ($limit = 5, $filter = []) {
    $model = $this -> newInstance();
    if($filter != []) {
      return $model
        -> where($filter)
        -> order('id', 'desc')
        -> limit($limit)
        -> select();
    }
    return $model -> order('id', 'desc') -> limit($limit) -> select();
	}
	
  /**
   * 获取数据专题
   */
  public function getDataPro () {
    $cid = 6;
    $model = $this -> newInstance();
    $res = $model
      -> where('cid', $cid)
      -> field('id, cover, title')
      -> order('id', 'desc')
      -> limit(5)
      -> select();

      return $res;
	}
	
	 /**
   * 获取会议信息
   */
  public function getMeeting () {
    $cid = 11;
    $model = $this -> newInstance();
    $res = $model
      -> where('cid', $cid)
      -> field('id, title')
      -> order('id', 'desc')
      -> select();
      return $res;
  }

  /**
   * 获取数据动态
   */
  public function getDataActivity () {
    $cid = 9;
    $model = $this -> newInstance();
    $res = $model
      -> where('cid', $cid)
      -> field('id, cover, title, content')
      -> order('id', 'desc')
      -> limit(2)
      -> select();
    $result = [];
    foreach($res as $r) {
      $article = $r;
      $content = mb_substr($article['content'], 0, 350); //选取前80个字
      $article['content'] = strip_tags($content . "...");
      array_push($result, $article);
    }
    return $result;
  }


  public function getBrief ($limit = 5, $filter = []) {
    $model = $this -> newInstance();
    if($filter != []) {
      $res =  $model
        -> where($filter)
        -> order('id', 'desc')
        -> limit($limit)
        -> select();
    } else {
      $res = $model -> order('id', 'desc') -> limit($limit) -> select();
    }
    $result = [];
    foreach($res as $r) {
      $article = $r;
      $content = mb_substr($article['content'], 0, 350); //选取前80个字
      $article['content'] = strip_tags($content . "...");
      array_push($result, $article);
    }
    return $result;
  }

  public function search ($key, $start = 0, $length = 10) {
    $model = $this -> newInstance();

    $res = $model
      -> where('title', 'LIKE', "%$key%")
      -> order('id', 'desc')
      -> limit($start, $length)
			-> select();
		$result = [];
		foreach($res as $r) {
			$article = $r;
			$content = $article['content'];
			$content = 	strip_tags($content . "...");
			$content = str_replace(' ', "", $content);
			$content = mb_substr($content, 0, 350); //选取前80个字
			$article['content'] = $content;
      array_push($result, $article);
		}
		
		return $result;
	}
	
	/**
	 * 通过关键字获取检索结果数量
	 * @param key  检索关键字
	 */
	 public function getSearchConut ($key) {
    $model = $this -> newInstance();

    return $model
      -> where('title', 'LIKE', "%$key%")
			-> order('id', 'desc')
			-> field('id')
      -> select();
	}


  /**
   * 获取所有行
   */
  public function getAllCardLimit($start = 1, $length = 10) {
    $model = $this -> newInstance();

    return $model
      -> field('id, title, cover, content, ctime, authors, src')
      -> order('id', 'desc')
      -> limit($start, $length)
      -> select();
  }

  /**
   * 获取所有行
   */
  public function getCateCardLimit($cid, $start = 0, $length = 10) {
    $model = $this -> newInstance();

    return $model
      -> where('cid', $cid)
      -> field('id, title, cover, content, ctime, authors, src')
      -> order('id', 'desc')
      // -> limit($start, $length)
      -> select();
	}

	/**
   * 获取所有行
   */
  public function getCateCardByLimit($cid, $start = 0, $length = 10) {
    $model = $this -> newInstance();

    return $model
      -> where('cid', $cid)
      -> field('id, title, cover, content, ctime, authors, src')
      -> order('id', 'desc')
      -> limit($start, $length)
      -> select();
	}
	
	/**
   * 获取所有行id通过Cid
   */
  public function getCateCard($cid) {
    $model = $this -> newInstance();
    return $model
      -> where('cid', $cid)
      -> field('id')
      -> order('id', 'desc')
      -> select();
  }

  /**
   * 根据id删除一个
   */
  public function deleteById ($id) {
    $model = $this -> newInstance();

    return $model -> where("id", $id) -> delete();
  }

  /**
   * 根据id更新
   */
  public function updateById ($id, $data) {
    $model = $this -> newInstance();

    return $model -> save($data, ['id' => $id]);
  }

  /**
   * 新增一个
   */
  public function add ($data) {
    $model = $this -> newInstance();

    return $model -> save($data);
  }

}