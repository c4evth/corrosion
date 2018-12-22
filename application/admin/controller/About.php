<?php

namespace app\admin\controller;

use app\common\model\About as Model;

use think\Controller;

class About extends Common
{
    public function _initialize() {
        parent::_initialize();

        $this->assign([
            "pageTitle" => "平台简介管理",
        ]);
    }

    public function desc ($inputContent = '') {
        $inputContent = $this -> request -> post('content');
        $model = new Model();
        $this -> assign('hint', "");  
        $content = $model -> where('id', 1) -> field('desc') -> find();
        $content = $content['desc'];
        if($inputContent != '') {
            $data = ['desc' => $inputContent];
            $res = $model -> updateById(1, $data);
            if($res == 1) {
                $this -> assign('hint', "已更新！");
                $content = $inputContent;       
            }
        }
        
        $this -> assign('content', $content);
        return view();
    }

    public function pro ($inputContent = '') {
        $inputContent = $this -> request -> post('content');
        $model = new Model();
        $this -> assign('hint', "");  
        $content = $model -> where('id', 1) -> field('pro') -> find();
        $content = $content['pro'];
        if($inputContent != '') {
            $data = ['pro' => $inputContent];
            $res = $model -> updateById(1, $data);
            if($res == 1) {
                $this -> assign('hint', "已更新！");
                $content = $inputContent;       
            }
        }
        
        $this -> assign('content', $content);
        return view();
    }

    public function example ($inputContent = '') {
        $inputContent = $this -> request -> post('content');
        $model = new Model();
        $this -> assign('hint', "");  
        $content = $model -> where('id', 1) -> field('example') -> find();
        $content = $content['example'];
        if($inputContent != '') {
            $data = ['example' => $inputContent];
            $res = $model -> updateById(1, $data);
            if($res == 1) {
                $this -> assign('hint', "已更新！");
                $content = $inputContent;       
            }
        }
        
        $this -> assign('content', $content);
        return view();
    }

    public function unit ($inputContent = '') {
        $inputContent = $this -> request -> post('content');
        $model = new Model();
        $this -> assign('hint', "");  
        $content = $model -> where('id', 1) -> field('unit') -> find();
        $content = $content['unit'];
        if($inputContent != '') {
            $data = ['unit' => $inputContent];
            $res = $model -> updateById(1, $data);
            if($res == 1) {
                $this -> assign('hint', "已更新！");
                $content = $inputContent;       
            }
        }
        
        $this -> assign('content', $content);
        return view();
    }

}