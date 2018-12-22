<?php

namespace app\admin\controller;

use app\common\model\Dcate;
use app\common\model\Wilddata as Model;
use think\Controller;

class Wilddata extends Common
{
    public function _initialize()
    {
        parent::_initialize();

        $this->assign([
            "pageTitle" => "野外数据管理",
        ]);
    }

    public function index()
    {
        $model = new Model();
        $data = $model->getAll();

        $this->assign('data', $data);
        return view();
    }

    public function edit($id = 0)
    {
        if ($id == 0) {
            return 0;
        }
        $model = new Model();
        $cateModel = new Dcate();
        $data = $model->get($id);
        $cates = $cateModel->where([
          "level" => 2,
          "type" => 1,
      ])->select();
        $this->assign("data", $data);
        $this->assign("cates", $cates);

        return view();
    }

    /**
     * 添加
     */
    public function add()
    {
        $cateModel = new Dcate();
        $cates = $cateModel->where([
          "level" => 2,
          "type" => 2,
      ])->select();
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
            'cid' => $cid,
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

        return $this->redirect("wilddata/index");
    }

    /**
     * 删除操作
     */
    public function del($id)
    {
        if (!$id) {
            return 0;
        }
        $model = new Model();
        $res = $model->deleteById($id);

        return $this->redirect("wilddata/index");
    }
}
