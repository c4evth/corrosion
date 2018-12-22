<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\controller\Common;
use app\common\model\User;
use app\common\model\Token;
use app\common\model\Touser;
use app\common\model\Ucollect;
use app\common\model\Udownload;
use app\common\model\Indoordata;
use app\common\model\Wilddata;
use app\common\model\Data;
use app\common\model\Dcate;

use app\common\controller\Excel;


use app\common\model\Msg;

class Personal extends Common
{
  public function _initialize()
  {
    parent::_initialize();
  }

  /**
   * 个人信息
   */
  public function index()
  {
    $this->assign('currTitle', '个人信息');
    $userModel = new User();
    $token = cookie('corrosion_token');
    if (!$token) $this->redirect('login/index');
    $userInfo = $userModel->getUserByToken($token);
    if (!$userInfo) $this->redirect('login/index');
    $this->assign('user', $userInfo);
    return view();
  }

  public function update () {
    $info = Request::instance()->post();
    $info['gender'] = trim($info['gender']) == '男' ? 1:0;
    $model = new User();
    $res = $model -> save($info, ['id' => $info['id']]);

    return $this -> redirect("index");
  }

  /**
   * 个人收藏 
   */
  public function collection()
  {
    $model = new Ucollect();
    $data = $model -> getByUid($this -> getUid());
    $this->assign('currTitle', '我的收藏');

    $this->assign('data', $data);
    return view();
  }

  /**
   * 用户收藏 室内/室外
   * @return json
   */
  public function addCollect()
  {
    if (request()->isAjax()) {
      $data = input('post.');

      /* 通过session取得uid */
      $userModel = new User();
      $token = cookie('corrosion_token');
      if (!$token) return json(2);
      $userInfo = $userModel->getUserByToken($token);
      if (!$userInfo) return json(2);
      $uid = $userInfo->id;

      /* 通过data id取得data */
      $id = $data['id'];
      $modelDacte = new Dcate();

      if ($data['type'] == 'indoor') {
        $type = 1;

      } else {
        $type = 2;
      }
      db('data')->where('id', $id)->setInc('collect');

       /* 新增用户收藏 */
      
      $modelUCollect = new Ucollect();
      $isExit = json_decode($modelUCollect->getOneByDid($id, $type));
      if ($isExit) {
        return json(0);
      } else {
        $ucollectModel = new Ucollect();
        $collectData = [
          'uid' => $uid,
          'did' => $id,
          'type' => $type,
        ];
        $ucollectModel -> add($collectData);
      }
    
      return json(1);
    }
  }

  /**
   * 个人下载
   */
  public function download()
  {
    $model = new Udownload();
    $data = $model -> getByUid($this -> getUid());
    $this->assign('currTitle', '我的下载');
    $this->assign('data', $data);
    return view();
  }

  public function delCollect ($id) {
    $model = new Ucollect();
    $model -> deleteById($id);
  }
  public function delDownload ($id) {
    $model = new Udownload();
    $model -> deleteById($id);
  }
  public function myDownload()
  {
      $id = $this -> request -> get('id');

      if(!$id) return "<h1>无内容！</h1>";

      /* 通过session取得uid */
      $userModel = new User();
      $token = cookie('corrosion_token');
      $userInfo = $userModel->getUserByToken($token);

      $DataId = $id;

      $uLoadModel = new Udownload();
      $isExist = json_decode($uLoadModel->getByDid($DataId));
      $dataModel = new Data();
      $fileData = $dataModel->getById($DataId);


      $before = file_get_contents("static/index/custom/txt/before.txt");
      $after = file_get_contents("static/index/custom/txt/after.txt");
      $content = $fileData['content'];
      $res = $before . $content . $after;

      $ua = $_SERVER["HTTP_USER_AGENT"];    
      $filename = "数据.doc";    
      $encoded_filename = urlencode($filename);    
      $encoded_filename = str_replace("+", "%20", $encoded_filename);

      header("Content-Type: application/octet-stream");      
      if (preg_match("/MSIE/", $_SERVER['HTTP_USER_AGENT']) ) {      
          header('Content-Disposition:  attachment; filename="' . $encoded_filename . '"');      
      } elseif (preg_match("/Firefox/", $_SERVER['HTTP_USER_AGENT'])) {      
          header('Content-Disposition: attachment; filename*="utf8' .  $filename . '"');      
      } else {      
          header('Content-Disposition: attachment; filename="' .  $filename . '"');      
      }  
      echo $res;
  }

  /**
   * 消息中心
   */
  public function news($page = 1)
  {
    $length = 10;
    $start = ($page - 1) * $length;
    $model = new Touser();
    $userModel = new User();
    $token = cookie('corrosion_token');
    if(!$token) $this -> redirect('login/index');
    $userInfo = $userModel -> getUserByToken($token);
    $messages = $model -> getAllByUid($userInfo['id'], $start, $length);
    $this -> assign('messages', $messages);
    $this->assign('currTitle', '消息中心');
    return view();
  }

  public function viewed($id) {
    $model = new Touser();
    return $model -> viewed($id);
  }

  protected function getUid() {
    $userModel = new User();
    $token = cookie('corrosion_token');
    if(!$token) return $this -> redirect('login/index');
    $userInfo = $userModel -> getUserByToken($token);
    return $userInfo['id'];
  }
}