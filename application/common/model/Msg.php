<?php

namespace app\common\model;

use think\Model;
use app\common\model\Token;

class Msg extends Model
{

  public function send ($phone) {
    //删除之前该手机号的验证码
    $model = $this -> newInstance();
    $model -> where('phone', $phone) -> delete();

    //生成验证码
    $code = $this -> genCode();
    $content = '【国家材料环境腐蚀科学数据中心】您的验证码为：'."$code";
    $res = $this -> doSend($phone, $content);
    if($res) {
      $model = $this -> newInstance();
      $model -> code = $code;
      $model -> phone = $phone;
      $model -> save();
      return $code;
    } else {
      return false;
    }
  }

  /**
   * 验证手机号验证码是否有效
   */
  public function checkCode($phone, $code) {
    $model = $this -> newInstance();
    $msg = $model -> get([
      'code' => $code,
      'phone' => $phone
    ]);
    if (@!$msg['id']) return false;
    return true;
  }

  private function  genCode () {
    $code = time() % 1000000;
    $code /= rand(1, 1000000);
    $code *= rand(1000000, 10000000);

    return $code % 1000000;
  }

  private function doSend($phone, $content){
    $msg = urlencode($content);
    $username = "13697934925";
    $password = "123123q";

    $url="http://121.42.138.95:8888/sms.aspx?action=send&userid=462&account=$username&password=$password&mobile=$phone&content=$msg";

    $status = array(
    "0"  => "发送成功。",
    "30" => "密码错误。",
    "40" => "账号不存在。",
    "41" => "余额不足。",
    "42" => "账号过期。",
    "43" => "IP地址限制。",
    "50" => "内容含有敏感词。",
    "51" => "手机号码不正确。",
    );

    $ztx_code = [
      0  => 6020001,
      30 => 6040003,
      40 => 6040004,
      41 => 6040005,
      42 => 6040006,
      43 => 6040007,
      50 => 6040008,
      51 => 6040009,
    ];

    $code = file_get_contents($url);
    $code = $this -> xmlToArray($code);

    return $code['returnstatus'] == 'Success';

  }

  //将XML转为array
  private function xmlToArray($xml)
  {
      //禁止引用外部xml实体
      libxml_disable_entity_loader(true);
      $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
      return $values;
  }
}
