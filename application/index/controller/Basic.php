<?php
namespace app\index\controller;

use think\Controller;
use app\index\controller\Common;
use app\common\model\Bdcate;
use app\common\model\Bdata;
use app\common\model\Bdsrc;

class Basic extends Common
{
  public function _initialize()
  {
    parent::_initialize();
  }

  /**
   * 基础数据
   * @param cid=1 默认选中的分类id为1
   */
  public function index($cid = 4, $search = '', $searchCid = 0, $page = 1)
  {
    $BdcateModel = new Bdcate();
    $Cate = $BdcateModel->getAll();

    $searchData = [];
    $hasNextPage = false;
    $hasPrePage = false;
    if($search != '' && $searchCid != 0) {
      //搜索
      $bdsrcModel = new Bdsrc;
      $length = 50;
      $start = ($page - 1) * $length;
      $searchData = $bdsrcModel
        -> where('bdid', $searchCid)
        -> where("search", "LIKE", "%".$search."%")
        -> limit($start, $length)
        -> select();
      
      if(count($searchData) > 0) {
        $hasNextPage = true;
      }
      if($page > 1) {
        $hasPrePage = true;
      }
    }

    $BdataModel = new Bdata();
    if($cid == 4) {
      $CurrCate = json_decode($BdcateModel->order('id', 'asc') -> find());
    } else {
      $CurrCate = json_decode($BdcateModel->getById($cid));

    }
    $currCateName = $CurrCate->name;
    $cateCid = $CurrCate -> id;
    $Data = json_decode($BdataModel->getByCid($cid));

    $this->assign([
      'currTitle' => '基础数据',
      'Cate' => $Cate,
      'Data' => $Data,
      'cateName' => $currCateName,
      'cateCid' => $cateCid,
      'currCateName' => $currCateName,
      'searchData' => $searchData,
      'hasPrePage' => $hasPrePage,
      'hasNextPage' => $hasNextPage,
      'page' => $page,
      'search' => $search,
      'searchCid' => $searchCid,
      'cid' => $cid
    ]);
    return view();
  }

  public function bdsrc ($id = 0) {
    $data = [];
    if($id == 0) {
      return view();
    } else {
      $model = new Bdsrc;
      $data = $model -> getById($id);
    }
    $this -> assign("data", $data);
    $this -> assign("currTitle", "数据");
    // var_dump($data);

    return view();
  }

  /**
   * 基础数据
   * @param cid=1 默认选中的分类id为1
   */
  public function dataContent($cid = 1, $bid = 1, $page = 1)
  {
    $BdcateModel = new Bdcate();
    $Cate = $BdcateModel->getAll();

    $BdataModel = new Bdata();
    $CurrCate = json_decode($BdcateModel->getById($cid));
    $currCateName = $CurrCate->name;
    $Data = json_decode($BdataModel->getByCid($cid));

    $BdsrcModel = new Bdsrc();
    $length = 15;
    $start = ($page - 1) * $length;
    $Src = json_decode($BdsrcModel->getByBdid($bid, $start, $length));
    $totalPage = $BdsrcModel -> getPageNum($bid, $length);
    $totalPage = ceil($totalPage);
    $nextPage = -1;
    $prePage = -1;
    if($page + 1 <= $totalPage) {
      $nextPage = $page + 1;
    }
    if($page - 1 > 0) {
      $prePage = $page - 1;
    }
    $this->assign([
      'currTitle' => '基础数据',
      'Cate' => $Cate,
      'Data' => $Data,
      'bdataName' => $Data[0]->name,
      'Src' => $Src,
      'totalPage' => $totalPage,
      'curPage' => $page,
      'cid' => $cid,
      'bid' => $bid,
      'nextPage'=> $nextPage,
      'prePage' => $prePage,
    ]); 
    return view('dataContent');
  }

  public function search ($key = '') {
    $model = new Bdsrc();
    if($key == '') {
      $Src = [];
    } else {
      $Src = $model -> search($key);
    }
    $BdcateModel = new Bdcate();
    $Cate = $BdcateModel->getAll();
    $this -> assign('Src', $Src);
    $this -> assign('Cate', $Cate);
    $this -> assign('currTitle', "基础数据搜索 $key");

    
    return view('list');
  }
}