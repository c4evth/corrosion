<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use PHPExcel_IOFactory;
use PHPExcel;
use app\common\model\Bdsrc as Model;
use app\common\model\Bdata;
use ZipArchive;


class Bdsrc extends Common
{
    public function  _initialize () {
        parent::_initialize();

        $this -> assign([
            "pageTitle"    => "基础数据源管理",
        ]);
    }

    public function index ($id = 0) {
      if($id == 0) return 0;
      $model = new Model();
      $bdsrc = $model -> getAll($id);
      $bdataModel = new Bdata();
      $parentData = $bdataModel -> get($id);
      $this -> assign('data', $bdsrc);
			$this -> assign('parentData', $parentData);
			$this -> assign('ID', $id);

      return view();
    }

  public function dealImport($bdid)
  {
			$file = request()->file('file');
      if (!$file) {
        $this->assign('result', "没有文件");
        return view('result');
      }
        //开始解析excel
        vendor("PHPExcel.PHPExcel");
        $info = $file->move(ROOT_PATH.'public'.DS.'uploads');
        $file_name = ROOT_PATH . 'public' . DS . 'uploads/' . $info->getSaveName();
       
        $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION)); //判断导入表格后缀格式
        if ($extension == 'xlsx' || $extension == 'xls' || $extension == 'zip') {
          if ($extension == 'xlsx') {
            $objReader = PHPExcel_IOFactory::createReader('Excel2007');
            $objPHPExcel = $objReader->load($file_name, $encode = 'utf-8');
          } else if ($extension == 'xls') {
            $objReader = PHPExcel_IOFactory::createReader('Excel5');
            $objPHPExcel = $objReader->load($file_name, $encode = 'utf-8');
					} else if ($extension == 'zip') {
            //图片压缩包
            $extractName = md5($info -> getSaveName());
            $floder = ROOT_PATH . 'public' . DS . 'uploads/extract/' . $extractName;

            if(!file_exists($floder)) {
              mkdir($floder);
            }
            $zip = new ZipArchive;

            if ($zip->open($file_name) === TRUE) {//中文文件名要使用ANSI编码的文件格式
              $zip->extractTo($floder);//提取全部文件
              $zip->close();
              unset($info);
              unlink($file_name);

              $handle = opendir($floder);
              if($handle){
                $allData = [];
                $data = [];
                while(($fl = readdir($handle)) !== false){
                  $data = [];
                  $temp = $floder.DIRECTORY_SEPARATOR.$fl;
                  $pic_info = explode('.',$fl);
                  $ext = array_pop($pic_info);
                  $name = array_pop($pic_info);
                  if(!is_dir($temp) && ($ext == "jpg" || $ext == "png")){
                    $old_name = $floder."/".$name.".".$ext;
                    $new_name = $floder."/".md5($name).".".$ext;
                    rename($old_name,$new_name);
                    $data['search'] = $name;
                    $data['content'] = "/uploads/extract/$extractName/".md5($name).".$ext";;
                    $data['bdid']    = $bdid;
                    $data['type']    = 2;
                    array_push($allData, $data);
                  } else {
                    continue;
                  }
                }

                // 批量写入数据库
                $bdsrcModel = new Model();
                $result     = $bdsrcModel -> addAll($allData);
                $this->assign('result', "数据添加成功!");
                return view('result');
              } else {
                $this->assign('result', "压缩包导入失败！");
                return view('result');
              }
            } else {
              $this->assign('result', "压缩包导入失败！");
              return view('result');
            }


            return 1;
          }
					
					$allData = []; // 用于存储excel中所有记录，实现批量存储
					$data    = []; // 用于存储一条记录

          $sheet = $objPHPExcel->getSheet(0);
          $highestRow = $sheet->getHighestRow(); //取得总行数
          $dataSet = ''; // 存放元素含量
          $highestColumn = $sheet->getHighestColumn(); //取得总列数
					
          for ($i = 3; $i <= $highestRow; $i++) {
            $highestColumn = $sheet->getHighestColumn(); //取得总列数 $highestRow
            $GetLength = $this -> GetPos(52);
						$ColumnLen = array_search($highestColumn, $GetLength);
						$getBasePos = $this -> GetPos($ColumnLen);

						$table    = '<table width="112" height="152"><colgroup><col width="56"><col width="56"></colgroup><tbody>';
						$search   = ''; // 钢号
						$trRow    = ''; // 包含一种元素种类、含量tr
						$dataBase = []; // 存放元素种类
						$d        = []; // 存放元素含量

            for($j = 0; $j <= $ColumnLen; $j++){
							$tr_row = '<tr height="19">';
							$pos = $getBasePos[$j];
							$dataBase[$j] = $objPHPExcel->getActiveSheet()->getCell($pos . '2')->getValue();
							$d[$j] = $objPHPExcel->getActiveSheet()->getCell($getBasePos[$j] . $i)->getValue();
							$td = '<td x:str="" height="19" width="56">';
							$td_base  = $td.$dataBase[$j].'</td>';
							$td_value = $td.$d[$j].'</td></tr>';

							$trRow .= $tr_row.$td_base.$td_value;
							if($j == 0){
								$search = $d[$j];
							}
						}
						$dataSet = $table.$trRow.'</tbody></table>';
						//看这里看这里,这个位置写数据库中的表名
						$data['bdid']    = $bdid;
						$data['search']  = $search;
						$data['content'] = $dataSet;
						$allData[$i] = $data;
					}
					// 批量写入数据库
					$bdsrcModel = new Model();
					$result     = $bdsrcModel -> addAll($allData);
					$this->assign('result', "数据添加成功!");
          return view('result');
        }
				$this->assign('result', "解析excel失败");
        return view('result');
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

    public function update() {
        $this -> assign('modifyed', false);
        // $id = $this -> request -> post('id');
        $bdid = $this -> request -> post('bdid');
        $search = $this -> request -> post('search');
				$content = $this -> request -> post('content');
				
				// dump($id);
				dump($bdid);
				dump($search);
				dump($content);die;

        $data = [
          'bdid' => $bdid,
          'search' => $search,
          'content' => $content,
        ];
        $model = new Model();
        if(!$id) {
          $res = $model -> add($data);
          $this->assign('result', "添加成功！");
        } else {
          $res = $model -> updateById($id, $data);
          $this->assign('result', "更新成功！");
        }
        return view('result');
    }

    public function edit ($id = 0) {
        if($id == 0) return 0;
        $model = new Model();
        $data = $model -> get($id);
        $bdataModel = new Bdata();  
        $bdata = $bdataModel -> getAll();
        $this -> assign('bdata', $bdata);
        $this -> assign('data', $data);


        return view();
    }

    public function del($id = 0) {
        if($id == 0) {
            $this->assign('result', "无效的id！");
            return view('result');
        }
        $model = new Model();
        $model -> deleteById($id);
        $this->assign('result', "删除成功！");
        return view('result');
    }
}