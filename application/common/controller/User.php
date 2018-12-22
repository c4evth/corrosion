<?php
namespace app\common\controller;

use think\Controller;
use app\common\model\User as Model;
use app\common\model\Token;

class User extends Controller
{
  public function _initialize()
  {
    $this->assign('notShowFooter', false); // 显示footer
  }

  public function logout()
  {
    cookie('corrosion_token', null);
    return json_encode(1);
  }

  public function login($name, $pass)
  {
    $model = new Model();

    $res = db('token')->where("uid", 1)->find();
    var_dump($res);

    return json_encode($model->login($name, $pass));
  }

  /**
   * 根据用户token获取用户信息
   * @param token token
   * @return res 用户信息
   */
  public function getByToken($token)
  {
    $tokenModel = new Token();
    $model = new Model();
    $uid = $tokenModel->getUidByToken($token, 2);
    if (!$uid) {
      $res = [
        'data' => 0,
      ];
      return json_encode($res);
    }
    $user = $model->getById($uid);
    $res = [
      'data' => $user,
    ];
    return json_encode($res);
  }

  /**
   * 短信登录
   * @param phone 手机号
   * @param code 验证码
   */
  public function msgLogin($phone, $code)
  {
    $model = new Model();
    $res = $model->msgLogin($phone, $code);
    if ($res['status'])
      cookie("corrosion_token", $res['token']);
    return json_encode($res);
  }

  /**
   * 更新用户信息
   */
  public function update()
  {
    $token = cookie('corrosion_token');
    $tokenModel = new Token();
    $id = $tokenModel->getUidByToken($token, 2);
    $model = new Model();
    $data = $this->request->param();
    array_splice($data, 0, 1);// 第一个param是
    $res = $model->updateById($id, $data);
    return json_encode($res);
  }
}