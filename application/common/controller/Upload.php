<?php

namespace app\common\controller;
use think\Controller;

class Upload extends Controller {

  /**
   * 上传文件
   */
  public function go() {
    $ROOT = "/uploads/";
    // 获取表单上传文件 例如上传了001.jpg
    $file = request() -> file('image');
    $res = [
      'errno' => 0,
      'data' => [],
      'status' => true,
      'url' => '',
      'msg' => '上传成功！',
    ];
    // 移动到框架应用根目录/public/uploads/ 目录下
    if($file) {
      $info = $file -> move(UPLOAD_PATH);
      if ($info) {
        // 成功上传后 获取上传信息
        // 输出 jpg
        $res['url'] = $ROOT . $info -> getSaveName();
        $res['data'] = [$ROOT . $info -> getSaveName()];
      } else {
        // 上传失败获取错误信息
        $res['errno'] = 1;
        $res['status'] = false;
        $res['msg'] = $file -> getError();
      }
    } else {
      $res['status'] = false;
      $res['msg'] = "没有上传文件！";
    }
    return json_encode($res);
  }
  /**
   * 从传入获取之后再上传
   */
  public function getGo($file) {
    $res = [
      'status' => true,
      'url' => '',
      'msg' => '上传成功！',
    ];
    // 移动到框架应用根目录/public/uploads/ 目录下
    if($file) {
      $info = $file -> move(UPLOAD_PATH);
      if ($info) {
        // 成功上传后 获取上传信息
        // 输出 jpg
        $res['url'] = $ROOT . $info -> getSaveName();
      } else {
        // 上传失败获取错误信息
        $res['status'] = false;
        $res['msg'] = $file -> getError();
      }
    } else {
      $res['status'] = false;
      $res['msg'] = "没有上传文件！";
    }
    return $res;
  }
}