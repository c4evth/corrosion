<?php
namespace app\index\controller;

use think\Controller;
use app\index\controller\Common;
use app\common\controller\Dcate as commonDcate;
use app\common\model\Data;

class Outdoor extends Common
{
  public function _initialize()
  {
    parent::_initialize();
  }

  /**
   * 室外数据
   */
  public function index()
  {
    $modelDcate = new commonDcate();
    $parentDcate = json_decode($modelDcate->getByLevelAndType(2, 1));
    $childDcate = json_decode($modelDcate->getByLevelAndType(2, 2));
    $dataShow = json_decode($modelDcate->getWildAll());
    $this->assign([
      'currTitle' => '室外数据',
      'parentDcate' => $parentDcate,
      'childDcate' => $childDcate,
      'dataShow' => $dataShow,
    ]);
    return view();
  }
	
	/**
   * 显示数据
   * @param id   当前选中分类的id
   * @param type 当前数据对应的分类名
   */
  public function dataShow($id = 1,$search = '', $name = '',$page = 1)
  {
    $modelData = new commonDcate();
		$currType = 2; // 室外
		$hasNextPage = false;
    $hasPrePage = false;
		$length = 5;
		$start = ($page - 1) * $length;
		$parentData = json_decode($modelData->getByLevelAndType(2, 1));
		if($search == ''){
			$Data = json_decode($modelData->getDataByCid($id,$start,$length));
			$this -> assign([
				'currName' => $name,
			]);
		}else{
			// 根据一级分类name，获取分类对应的三级分类id
			$getSearchCate = json_decode($modelData -> getOutdoordataIdByName($name,2));
			$cidArr = $this -> changeArr($getSearchCate,'id');
			// 开始模糊查询
			$searchResult = json_decode($modelData -> getIndoorAllBySearch($search,2,$cidArr,$start,$length));
			$Data = $searchResult;

			$currName = $name;
			$this -> assign([
				'currName' => $currName,
			]);
		}
		if(count($Data) > 0) {
        $hasNextPage = true; 
      }
      if($page > 1) {
        $hasPrePage = true;
      }
    $this->assign([
      'currTitle'   => '室外数据',
      'parentDcate' => $parentData,
      'Data'        => $Data,
			'currType'    => $currType,
			'search'      => $search,
			'Page'        => $page,
			'hasPrePage'  => $hasPrePage,
			'hasNextPage' => $hasNextPage,
			'cid'         => $id,
    ]);
    return view('dataShow');
  }


  /**
   * 显示数据内容
   * @param id 当前查看数据id
   */
  public function dataContent($id = 1)
  {
    $modelData = new commonDcate();
    $Data = json_decode($modelData->getDataById($id));
    $this->assign([
      'currTitle' => '室外数据',
      'Data' => $Data,
    ]);
    return view('dataContent');
  }

  /**
   * 用户进入数据详情页之后浏览数加1
   */
  public function addDataView()
  {
    if (request()->isAjax()) {
      $data = input('post.');
      $model = new Data();
      $Data = json_decode($model->getDataById($data['id']));
      $Data->viewer += 1;

      $update = json_encode($model->updateDataById($data['id'], $Data));
      return 'ok';
    }
	}
	
		/**
	 * 将一个三维数组转换为一维数组
	 * @param  arr    三维数组
	 * @param  key    第三维数组下标
	 * @return newArr 新生成的一维数组
	 * 
	 */
	private function changeArr($arr,$key){
		$count = count($arr);
		$newArr = [];
		for($i = 0; $i < $count; $i++){
			$length = count($arr[$i]);
			$currArr = [];
			for($j = 0; $j < $length; $j++){
				$currArr[$j] = $arr[$i][$j] -> $key;
			}
			$newArr[$i] = $currArr;
		}
		$res = [];
		foreach($newArr as $row) {
			foreach($row as $id) {
				array_push($res, $id);
			}
		}

		return $res;
	}
}