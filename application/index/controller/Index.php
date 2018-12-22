<?php
namespace app\index\controller;

use app\index\controller\Common;
use app\index\model\Carousel as ModelBanner;
use think\Controller;
use app\common\model\Focus;
use app\common\model\Select;
use app\common\model\Article;


class Index extends Common
{
    public function _initialize() {
        parent::_initialize();
    }

    /**
     * 前台首页
     */
    public function index()
    {
        /* 获取轮播图 */
        $modelBanner = new ModelBanner();
        $banner = $modelBanner->getBanner();
        /**获取文章 */
        $focusModel = new Focus();
        $selectModel = new Select();
        $articleModel = new Article();
        $focusArticle = $focusModel -> getAll(); //科技焦点
        $selectArticle = $selectModel -> getAll(); //每周精选
        $newsArticle = $articleModel -> getNews(); //最新咨询
        $dataPro = $articleModel -> getDataPro();
        $dataActivity = $articleModel -> getDataActivity();
        $selectedArticle = $selectModel -> getTop();
        $selectedArticle['content'] = mb_substr(strip_tags($selectedArticle['content']), 0, 300);
        $this->assign([
            "currTitle" => '首页',
            'banner' => $banner,
            'focus' => $focusArticle,
            'select' => $selectArticle,
            'news' => $newsArticle,
            'dataPro' => $dataPro,
            'dataActivity' => $dataActivity,
            'selected' => $selectedArticle
        ]);
        return view();
    }

    /**
     * 显示详情
     */
    public function show()
    {
        $this->assign('currTitle', '详情');
        return view();
    }
}
