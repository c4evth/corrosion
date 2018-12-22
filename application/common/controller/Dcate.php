<?php
namespace app\common\controller;

use think\Controller;

use app\common\model\Dcate as Model;
use app\common\model\Indoordata as IndoorModel;
use app\common\model\Wilddata as WildModel;
use app\common\model\Data as DataModel;

class Dcate extends Controller
{

  /**
   * 通过分类级别
   * @param  Level 分类级别
   * @param  Type  室内1/室外2
   * @return json  查询结果
   */
  public function getByLevelAndType($Type, $Level)
  {
    $model = new Model();
    $modelDcate = $model->getByLevelAndType($Type, $Level);
    return json_encode($modelDcate);
  }

  /**
   * 获取室内数据所有行
   */
  public function getIndoorAll()
  {
    $model = new IndoorModel();
    $indoor = $model->getAll();
    return json_encode($indoor);
	}
	
	/**
	 * 增加时间 18/11/20
   * 根据检索值获取室内/室外数据所有行
	 * @param cid    数据分类id
	 * @param search 检索关键字
   */
  public function getIndoorAllBySearch($search,$type,$cidArr,$start,$length)
  {
		$model = new DataModel();
		$searchData = $model -> getDataAllBySearch($search,$type,$cidArr,$start,$length);
    return json_encode($searchData);
	}
	
	/**
	 * 增加时间 18/11/20
	 * 室内数据
	 * 根据name获取当前一级分类所对应的三级级分类id
	 * @param name 当前一级级分类name
	 */
	public function getIndoordataIdByName($name,$type){
		$model          = new Model();
		$currCate       = $model -> getCateByName($name,$type);

		$childCate      = $model -> getCateByParent($currCate['id'],$type);
		$count = count($childCate);  // 获取数组长度
		$childCateId = [];
		$indoorData = [];
		for($i = 0; $i < $count; $i++){
			$childCateId[$i] = $childCate[$i]['id'];
			$indoorDataModel = new IndoorModel();
			$indoorData[$i] = $indoorDataModel -> getIndoorIdByCid($childCateId[$i]);
		}
		return json_encode($indoorData);
	}

	/**
	 * 增加时间 18/11/20
	 * 室外数据
	 * 根据name获取当前一级分类所对应的三级级分类id
	 * @param name 当前一级级分类name
	 */
	public function getOutdoordataIdByName($name,$type){
		$model          = new Model();
		$currCate       = $model -> getCateByName($name,$type);
		$childCate      = $model -> getCateByParent($currCate['id'],$type);
		$count = count($childCate);  // 获取数组长度
		$childCateId = [];
		$wildData = [];
		for($i = 0; $i < $count; $i++){
			$childCateId[$i] = $childCate[$i]['id'];
			$wildDataModel = new WildModel();
			$wildData[$i] = $wildDataModel -> getOutdoorIdByCid($childCateId[$i]);
		}
		return json_encode($wildData);
	}

  /**
   * 获取野外数据所有行
   */
  public function getWildAll()
  {
    $model = new WildModel();
    $wild  = $model->getAll();
    return json_encode($wild);
  }

  /**
   * 通过cid获取所有数据
   * @param  cid  材料分类id
   * @return json
   */
  public function getDataByCid($cid,$start,$length)
  {
    $model = new DataModel();
    $res = $model->getAllByCid($cid,$start,$length);
    return json_encode($res);
  }

  /**
   * 通过cid获取一条数据
   * @param  id  数据id
   * @return json
   */
  public function getDataById($id)
  {
    $model = new DataModel();
    $res = $model->getById($id);
    return json_encode($res);
  }

  /**
   * 根据id更新数据
   */
  public function updateDataById($id, $data)
  {
    $model = new DataModel();
    $res = $model->updateById($id, $data);
    return json_encode($res);
  }
}