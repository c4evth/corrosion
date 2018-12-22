<?php
namespace app\index\controller;

use app\index\model\Nav as ModelNav;

use app\index\model\Friends;
use app\index\model\Site;
use app\common\model\Footer;
use think\Controller;

class Common extends Controller
{
    protected function _initialize()
    {
        parent::_initialize(); // 继承父类初始化
        /* 获取栏目 */
        $modelNav = new ModelNav();
        $Nav = $modelNav->getNav();

        /* 获取友情链接 */
        $modelFriends = new Friends();
        $Friends = $modelFriends->getFriends();

        /* 获取站点设置 */
        $modelSite = new Site();
        $Site = json_decode($modelSite->getSite());

        /** 获取页脚 */
        $footerModel = new Footer();
        $Footer = $footerModel -> getInfo();

        $this->assign([
            'nav' => $Nav,
            'friends' => $Friends,
            'site' => $Site,
            'footer' => $Footer,
        ]);
    }
}
