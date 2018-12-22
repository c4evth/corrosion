<?php
namespace app\common\controller;

use think\Controller;
use PHPExcel_IOFactory;
use PHPExcel;
use app\common\model\Bdsrc as Model;
use app\common\model\Bdata;
use app\common\model\Standard as ModelStandard;

class Bdsrc extends Controller
{
  public function index()
  {
    return 1;
  }
  
  public function dealExcel()
  {
      $res = [
        'status' => 0,
        'msg' => '',
        'data' => []
      ];
      $file = request()->file('file');
      if (!$file) {
          $res['msg'] = "没有上传文件！";
          return json_encode($res);
      }
      // var_dump($file);
        //开始解析excel
        vendor("PHPExcel.PHPExcel");
        // $model = new Model();
        $info = $file->move(ROOT_PATH.'public'.DS.'uploads');
        $file_name = ROOT_PATH . 'public' . DS . 'uploads/' . $info->getSaveName();
        // var_dump($file_name);

        //  $ipso = $this -> GetPos(50);
        //  var_dump($ipso);
        //
        $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION)); //判断导入表格后缀格式
        if ($extension == 'xlsx' || $extension == 'xls') {
          if ($extension == 'xlsx') {
            $objReader = PHPExcel_IOFactory::createReader('Excel2007');
            $objPHPExcel = $objReader->load($file_name, $encode = 'utf-8');
          } else if ($extension == 'xls') {
            $objReader = PHPExcel_IOFactory::createReader('Excel5');
            $objPHPExcel = $objReader->load($file_name, $encode = 'utf-8');
          }

          $sheet = $objPHPExcel->getSheet(0);
          $highestRow = $sheet->getHighestRow(); //取得总行数
          $dataSet = []; // 存放元素含量
          $dataBase = []; // 存放元素种类
          $highestColumn = $sheet->getHighestColumn(); //取得总列数

          $GetLength = $this -> GetPos(52);
          $ColumnLen = array_search($highestColumn, $GetLength); // 获取列长度

          $getBasePos = $this -> GetPos($ColumnLen);
          // var_dump($getBasePos);
          for($p = 0; $p <= $ColumnLen; $p++){
            $pos = $getBasePos[$p];
            $dataBase[$p] = $objPHPExcel->getActiveSheet()->getCell($pos . '2')->getValue();
          }
          for ($i = 3; $i <= 5; $i++) {
            $highestColumn = $sheet->getHighestColumn(); //取得总列数 $highestRow
            $data = []; // 存放元素含量
            $GetLength = $this -> GetPos(52);
            $ColumnLen = array_search($highestColumn, $GetLength);
            // var_dump($ColumnLen);
            $d = [];
            for($j = 0; $j <= $ColumnLen; $j++){
                //$data[$j] = $objPHPExcel->getActiveSheet()->getCell($getBasePos[$j] . $i)->getValue();
                $d[$j] = $objPHPExcel->getActiveSheet()->getCell($getBasePos[$j] . $i)->getValue();
            }
            $data[$i] = $d;
            //看这里看这里,这个位置写数据库中的表名
            array_push($dataSet, $data);
            // $model->add($data);
          }
          $BaseData[0] = $dataSet;
          $BaseData[1] = $dataBase;

          $res['data'] = $BaseData;
          // dump($res);
          $res['status'] = 1;
          $res['msg'] = "上传成功！";
          return json_encode($res);
        }
        $res['msg'] = "解析excel失败";
        return json_encode($res);
  }
	
	
	/**
   * 获取Excel坐标
   * @param  count 每行总列数
   * @return arr   包含Excel坐标的数组
   */
  public function GetPos($count){
    $words = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $count += 5;
    $base = 0;
    $limit = $count;
    $res = [];
    for($i = 0; $i < $count; $i++) {
      $res[$i] = '';
    }

    while($limit != 0) {
      if($base == 0) {
        $times = 1;
      } else {
        $times = ceil($base / 25);
      }
      $num = $base;
      while($times != 0) {
        $index = (int)($num / 25) - 1;
        if($index < 0) $index = 0;
        $times--;
        if($times != 0) {
          $res[$base] = $res[$base] . $words[$index];
        } else {
          $res[$base] = $res[$base] . $words[$num % 26];
        }
        $num %= 26;
      }
      $base++;
      $limit = $limit - 1;
    }
    return $res;
  }
}
