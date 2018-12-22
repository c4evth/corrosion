<?php

namespace app\admin\controller;

use think\Controller;
use app\common\model\Standard as Model;
use app\common\model\Scate;

class Standard extends Common
{

  public function _initialize()
  {
    parent::_initialize();
    $this->assign('pageTitle', '标准管理');
  }

  public function index()
  {
    $model = new Model();
    $standards = $model->getAll();

    $this->assign("standards", $standards);
    return view();
  }

  public function edit($id = 0)
  {
    if ($id == 0) {
      return 0;
    }
    $model = new Model();
    $cateModel = new Scate();
    $standard = $model->get($id);
    $cates = $cateModel->where("level", 2)->select();
    $this->assign("standard", $standard);
    $this->assign("cates", $cates);


    return view();
  }

  public function add()
  {
    $cateModel = new Scate();
    $cates = $cateModel->where("level", 2)->select();
    $this->assign("cates", $cates);
    return view();
  }

  /**
   * 更新分类
   */
  public function update()
  {
    $id = $this->request->post('id');
    $name = $this->request->post('name');
    $cid = $this->request->post('cid');
    $data = [
      'name' => $name,
      'cid' => $cid
    ];
    $model = new Model();
    if (!$id) {
      $res = $model->add($data);
    } else {
      $res = $model->updateById($id, $data);
    }
    if ($res) {
      $this->assign('modifyed', true);
    }

    return $this->redirect("standard/index");
  }

  /**
   * 删除操作
   */
  public function del($id)
  {
    if (!$id) {
      return 0;
    }
    $carouselModel = new Model();
    $res = $carouselModel->deleteById($id);

    return $this->redirect("standard/index");
  }

  public function import()
  {
    $model = new Model();
    $standards = $model->getAll();

    $this->assign("standards", $standards);
    return view();
  }

  public function dealExcel()
  {
    ini_set('memory_limit', '1024M');
    $file = $this->request->post('file');
    $sid = $this->request->post('sid');
    if (!$file) {
      $result = "没有上传文件！";
      $this->assign("result", $result);
      return view("result");
    }
    //开始解析excel
    vendor("PHPExcel.PHPExcel");
    $model = new Model();
    $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
    $file_name = ROOT_PATH . 'public' . DS . 'uploads/' . $info->getSaveName();

    $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION)); //判断导入表格后缀格式
    if ($extension == 'xlsx') {
      if ($extension == 'xlsx') {
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $objPHPExcel = $objReader->load($file_name, $encode = 'utf-8');
      } else if ($extension == 'xls') {
        $objReader = PHPExcel_IOFactory::createReader('Excel5');
        $objPHPExcel = $objReader->load($file_name, $encode = 'utf-8');
      }
      $sheet = $objPHPExcel->getSheet(0);
      $highestRow = $sheet->getHighestRow(); //取得总行数
      $highestColumn = $sheet->getHighestColumn(); //取得总列数
      $dataSet = [];
      for ($i = 2; $i <= $highestRow; $i++) {
        //看这里看这里,前面小写的a是表中的字段名，后面的大写A是excel中位置
        $data = [];
        $data['sid'] = $sid;
        $data['id'] = $objPHPExcel->getActiveSheet()->getCell("A" . $i)->getValue();
        $data['num'] = $objPHPExcel->getActiveSheet()->getCell("B" . $i)->getValue();
        $data['name'] = $objPHPExcel->getActiveSheet()->getCell("C" . $i)->getValue() | '';
        $data['impletime'] = $objPHPExcel->getActiveSheet()->getCell("D" . $i)->getValue();
        $data['department'] = $objPHPExcel->getActiveSheet()->getCell("E" . $i)->getValue();
        //看这里看这里,这个位置写数据库中的表名

        array_push($dataSet, $data);
        $model->add($data);
      }
      $res['data'] = $dataSet;

      $result = "上传成功！";
      $this->assign("result", $result);
      return view("result");
    }
    $result = "解析excel失败";
    $this->assign("result", $result);
    return view("result");
  }
}