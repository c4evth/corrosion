<?php
namespace app\common\controller;

use think\Controller;
use app\common\model\Msg as Model;

class Msg extends Controller
{
  /**
   * 发送短信
   * @param phone 手机号
   * @return [
   *  code: 0 失败 其他(验证码)
   *  phone: 手机号
   * ]
   */
  public function send ($phone = '') {
    // $phone = get('phone');
    if($phone == '') {
      $res = [
        'code' => 0,
        'msg' => '手机号不能为空'
      ];

      return json_encode($res);
    }

    $model = new Model();
    $res = $model -> send($phone);
    if($res == false) {
      $res = [
        'code' => 0,
        'msg' => '发送失败'
      ];

      return json_encode($res);
    }
    $res = [
      'code' => $res,
      'msg' => '发送成功！'
    ];
    return json_encode($res);
  }
}