<?php
namespace app\common\controller;

use think\Controller;
use PHPExcel_IOFactory;
use PHPExcel;
use app\common\model\Slist as Model;
use app\common\model\Standard as ModelStandard;

class Standard extends Controller
{
  public function index()
  {
    return 1;
  }

  /**
   * 获取所有标准
   */
  public function getStandard()
  {
    $model = new ModelStandard();
    $standard = $model->getAll();
    return json_encode($standard);
  }

  /**
   * 通过id获取符合条件的标准详情
   * @param sid 标准id
   */
  public function getSlistBySid($sid)
  {
    $model = new Model();
    $slist = $model->getSlistBySid($sid);
    return json_encode($slist);
  }

  /**
   * 导入excel并写入
   */
  public function importExcelToStandard()
  {
    $res = [
      'status' => 0,
      'msg' => '',
      'data' => []
    ];
    $sid = request()->post("sid");
    $file = request()->file('file');
      // $sid = 2;
    if (!$file || !$sid) {
      $res['msg'] = "没有上传文件！";
      return json_encode($res);
    }
      //开始解析excel
    ini_set('memory_limit', '1024M');
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
          // $data['id']         = $objPHPExcel->getActiveSheet()->getCell("A" . $i)->getValue();
        $data['num'] = $objPHPExcel->getActiveSheet()->getCell("B" . $i)->getValue();
        $data['name'] = $objPHPExcel->getActiveSheet()->getCell("C" . $i)->getValue() | '';
        $data['impletime'] = $objPHPExcel->getActiveSheet()->getCell("D" . $i)->getValue();
        $data['department'] = $objPHPExcel->getActiveSheet()->getCell("E" . $i)->getValue();
          //看这里看这里,这个位置写数据库中的表名

        array_push($dataSet, $data);
        $model->add($data);
      }
      $res['data'] = $dataSet;

      return json_encode($res);
    } else {
      $res['msg'] = "解析excel失败";
      return json_encode($res);
    }
  }
}
