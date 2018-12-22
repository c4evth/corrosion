<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:87:"/Users/iimt/Development/PHP/corrosion/public/../application/index/view/basic/index.html";i:1545464128;s:79:"/Users/iimt/Development/PHP/corrosion/application/index/view/common/header.html";i:1542099950;s:76:"/Users/iimt/Development/PHP/corrosion/application/index/view/common/nav.html";i:1541485910;s:79:"/Users/iimt/Development/PHP/corrosion/application/index/view/common/footer.html";i:1542023940;}*/ ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> -->
    <!-- <meta name="full-screen" content="yes" /> -->
    <!-- <meta name="x5-fullscreen" content="true" /> -->
    <!-- 是否启用 WebApp 全屏模式，删除苹果默认的工具栏和菜单栏 -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>国家材料环境腐蚀科学数据中心-<?php echo $currTitle; ?></title>
    <link rel="stylesheet" href="/static/index/custom/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/index/custom/css/reset.css">
    <link rel="stylesheet" href="/static/index/custom/css/p.css">
    <link rel="stylesheet" href="/static/index/custom/css/acm.css">
    <link rel="stylesheet" href="/static/vendor/layui/css/layui.css">
    <style>
        footer {
        margin-top: 3%;
    }
    </style>
</head>

<body>
    <div class="main">
        <header><div class="width-1200 clearfix">
    <div class="sc-fl logo-text">
        <a href="/">
            <h1 style="color: #0093d6"><?php echo $site->title; ?></h1>
            <h6><?php echo $site->vicedesc; ?></h6>
            <p style="color: #0093d6" class="c-999"><?php echo $site->vicetitle; ?></p>
            <h6><?php echo $site->description; ?></h6>
        </a>
    </div>
    <div class="sc-fr searchall pr">
        <div class="pa">
            <div class="sc-fr qiehuan">
                <span class="active">中</span>
                <span class="">EN</span>
            </div>
            <?php if(cookie('corrosion_token')): ?>
            <a href="<?php echo url('index/login/logout'); ?>" class="register sc-fr">退出</a>
            <a href="<?php echo url('index/personal/index'); ?>" class="login sc-fr" style="width: 80px;">个人中心</a>
            <?php else: ?>
            <a href="<?php echo url('index/login/register'); ?>" class="register sc-fr">注册</a>
            <a href="<?php echo url('index/login/index'); ?>" class="login sc-fr">登录</a>
            <?php endif; ?>
            <div class="sc-fl search">
                <form action="/index/article/search">
                    <button type="submit">
                        <img src="/static/index/custom/images/a.png" alt="">
                    </button>
                    <input type="text" name="key" placeholder="请输入您要搜索的内容" id="lang" />
                </form>
            </div>
        </div>
    </div>
</div></header>
        <nav><div class="width-1200" style="height:30px;">
    <ul class="clearfix">
        <li><a href="<?php echo url('index/index'); ?>">首页</a></li>
        <?php if(is_array($nav) || $nav instanceof \think\Collection || $nav instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($nav) ? array_slice($nav,0,7, true) : $nav->slice(0,7, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <img src=" /static/index/custom/images/a2.png" alt="" class="sc-fl" style="margin-top: 1.1%;">
        <li><a href="<?php echo $vo['linkto']; ?>"><?php echo $vo['name']; ?></a></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div></nav>
        <div class="width-1200 clearfix">
            <div class="Basicdata" style="margin-bottom: 20px;">
                <?php if(is_array($Cate) || $Cate instanceof \think\Collection || $Cate instanceof \think\Paginator): $i = 0; $__LIST__ = $Cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <a class="Cate" href="javascript:;">
                    <img style="width:30px;height:30px;" src="<?php echo $vo->icon; ?>" alt="<?php echo $vo->id; ?>">
                    <p><?php echo $vo->name; ?></p>
                </a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <h4 class="jsh4"><?php echo $cateName; ?></h4>
            <div class="Periodic-table-box pr">
                <div class="clearfix Periodic-search pa">
                        <form action="" method="POST">
                    <div class="select sc-fl">
                        <select name="searchCid" id="">
                            <?php if(is_array($Data) || $Data instanceof \think\Collection || $Data instanceof \think\Paginator): $i = 0; $__LIST__ = $Data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo->id==$searchCid): ?>
                                <option value="<?php echo $vo->id; ?>" selected><?php echo $vo->name; ?></option>
                                <?php else: ?>
                                <option value="<?php echo $vo->id; ?>"><?php echo $vo->name; ?></option>
                                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            <!-- <option value="1">按元素种类搜索</option> -->
                        </select>
                    </div>
                    <div class="search2 sc-fl">
                            <input type="text" name="search" value="<?php echo $search; ?>">
                            <button type="submit" id="doSearch">搜索</button>
                        </div>
                    </form>
                    <img src="/static/index/custom/images/a58.png" alt="" class="zhouqibiao">
                </div>
                <div class="Periodic-table clearfix">
                    <div class="squarebox cGreen">
                        <span class="pr square"><span class="pa">1</span><a href="/index/basic/search?key=H">H</a></span>
                    </div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="squarebox cPurple">
                        <span class="pr square"><span class="pa">2</span><a href="/index/basic/search?key=He">He</a></span>
                    </div>
                    <div class="squarebox cRed sc-fl">
                        <span class="pr square"><span class="pa">3</span><a href="/index/basic/search?key=Li">Li</a></span>
                    </div>
                    <div class="squarebox cOrange sc-fl">
                        <span class="pr square"><span class="pa">4</span><a href="/index/basic/search?key=Be">Be</a></span>
                    </div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="squarebox cGreenJ">
                        <span class="pr square"><span class="pa">5</span><a href="/index/basic/search?key=B">B</a></span>
                    </div>
                    <div class="squarebox cGreen">
                        <span class="pr square"><span class="pa">6</span><a href="/index/basic/search?key=C">C</a></span>
                    </div>
                    <div class="squarebox cGreen">
                        <span class="pr square"><span class="pa">7</span><a href="/index/basic/search?key=N">N</a></span>
                    </div>
                    <div class="squarebox cGreen">
                        <span class="pr square"><span class="pa">8</span><a href="/index/basic/search?key=O">O</a></span>
                    </div>
                    <div class="squarebox cBlue">
                        <span class="pr square"><span class="pa">9</span><a href="/index/basic/search?key=F">F</a></span>
                    </div>
                    <div class="squarebox cPurple">
                        <span class="pr square"><span class="pa">10</span><a href="/index/basic/search?key=Ne">Ne</a></span>
                    </div>
                    <div class="squarebox cRed sc-fl">
                        <span class="pr square"><span class="pa">11</span><a href="/index/basic/search?key=Na">Na</a></span>
                    </div>
                    <div class="squarebox cOrange sc-fl">
                        <span class="pr square"><span class="pa">12</span><a href="/index/basic/search?key=Mg">Mg</a></span>
                    </div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="square-f"></div>
                    <div class="squarebox cYellow sc-fr">
                        <span class="pr square"><span class="pa">13</span><a href="/index/basic/search?key=AI">AI</a></span>
                    </div>
                    <div class="squarebox cGreenJ sc-fr">
                        <span class="pr square"><span class="pa">14</span><a href="/index/basic/search?key=Si">Si</a></span>
                    </div>
                    <div class="squarebox cGreen sc-fr">
                        <span class="pr square"><span class="pa">15</span><a href="/index/basic/search?key=P">P</a></span>
                    </div>
                    <div class="squarebox cGreen sc-fr">
                        <span class="pr square"><span class="pa">16</span><a href="/index/basic/search?key=S">S</a></span>
                    </div>
                    <div class="squarebox cBlue sc-fr">
                        <span class="pr square"><span class="pa">17</span><a href="/index/basic/search?key=CI">CI</a></span>
                    </div>
                    <div class="squarebox cPurple sc-fr">
                        <span class="pr square"><span class="pa">18</span><a href="/index/basic/search?key=Ar">Ar</a></span>
                    </div>
                    <div class="squarebox cRed sc-fl">
                        <span class="pr square"><span class="pa">19</span><a href="/index/basic/search?key=K">K</a></span>
                    </div>
                    <div class="squarebox cOrange sc-fl">
                        <span class="pr square"><span class="pa">20</span><a href="/index/basic/search?key=Ca">Ca</a></span>
                    </div>
                    <div class="squarebox cOrangeJ sc-fl">
                        <span class="pr square"><span class="pa">21</span><a href="/index/basic/search?key=Sc">Sc</a></span>
                    </div>
                    <div class="squarebox cOrangeJ sc-fl">
                        <span class="pr square"><span class="pa">22</span><a href="/index/basic/search?key=Ti">Ti</a></span>
                    </div>
                    <div class="squarebox cOrangeJ sc-fl">
                        <span class="pr square"><span class="pa">23</span><a href="/index/basic/search?key=V">V</a></span>
                    </div>
                    <div class="squarebox cOrangeJ sc-fl">
                        <span class="pr square"><span class="pa">24</span><a href="/index/basic/search?key=Cr">Cr</a></span>
                    </div>
                    <div class="squarebox cOrangeJ sc-fl">
                        <span class="pr square"><span class="pa">25</span><a href="/index/basic/search?key=Mn">Mn</a></span>
                    </div>
                    <div class="squarebox cOrangeJ sc-fl">
                        <span class="pr square"><span class="pa">26</span><a href="/index/basic/search?key=Fe">Fe</a></span>
                    </div>
                    <div class="squarebox cOrangeJ sc-fl">
                        <span class="pr square"><span class="pa">27</span><a href="/index/basic/search?key=Co">Co</a></span>
                    </div>
                    <div class="squarebox cOrangeJ sc-fl">
                        <span class="pr square"><span class="pa">28</span><a href="/index/basic/search?key=Ni">Ni</a></span>
                    </div>
                    <div class="squarebox cOrangeJ sc-fl">
                        <span class="pr square"><span class="pa">29</span><a href="/index/basic/search?key=Cu">Cu</a></span>
                    </div>
                    <div class="squarebox cOrangeJ sc-fl">
                        <span class="pr square"><span class="pa">30</span><a href="/index/basic/search?key=Zn">Zn</a></span>
                    </div>
                    <div class="squarebox cYellow sc-fl">
                        <span class="pr square"><span class="pa">31</span><a href="/index/basic/search?key=Ga">Ga</a></span>
                    </div>
                    <div class="squarebox cGreenJ sc-fl">
                        <span class="pr square"><span class="pa">32</span><a href="/index/basic/search?key=Ge">Ge</a></span>
                    </div>
                    <div class="squarebox cGreenJ sc-fl">
                        <span class="pr square"><span class="pa">33</span><a href="/index/basic/search?key=As">As</a></span>
                    </div>
                    <div class="squarebox  cGreen sc-fl">
                        <span class="pr square"><span class="pa">34</span><a href="/index/basic/search?key=Se">Se</a></span>
                    </div>
                    <div class="squarebox cBlue sc-fl">
                        <span class="pr square"><span class="pa">35</span><a href="/index/basic/search?key=Br">Br</a></span>
                    </div>
                    <div class="squarebox cPurple sc-fl">
                        <span class="pr square"><span class="pa">36</span><a href="/index/basic/search?key=Kr">Kr</a></span>
                    </div>
                    <div class="squarebox cRed">
                        <span class="pr square"><span class="pa">37</span><a href="/index/basic/search?key=Rb">Rb</a></span>
                    </div>
                    <div class="squarebox cOrange">
                        <span class="pr square"><span class="pa">38</span><a href="/index/basic/search?key=Sr">Sr</a></span>
                    </div>
                    <div class="squarebox cOrangeJ">
                        <span class="pr square"><span class="pa">39</span><a href="/index/basic/search?key=Y">Y</a></span>
                    </div>
                    <div class="squarebox cOrangeJ">
                        <span class="pr square"><span class="pa">40</span><a href="/index/basic/search?key=Zr">Zr</a></span>
                    </div>
                    <div class="squarebox cOrangeJ">
                        <span class="pr square"><span class="pa">41</span><a href="/index/basic/search?key=Nb">Nb</a></span>
                    </div>
                    <div class="squarebox cOrangeJ">
                        <span class="pr square"><span class="pa">42</span><a href="/index/basic/search?key=Mo">Mo</a></span>
                    </div>
                    <div class="squarebox cOrangeJ">
                        <span class="pr square"><span class="pa">43</span><a href="/index/basic/search?key=Tc">Tc</a></span>
                    </div>
                    <div class="squarebox cOrangeJ">
                        <span class="pr square"><span class="pa">44</span><a href="/index/basic/search?key=Ru">Ru</a></span>
                    </div>
                    <div class="squarebox cOrangeJ">
                        <span class="pr square"><span class="pa">45</span><a href="/index/basic/search?key=Rh">Rh</a></span>
                    </div>
                    <div class="squarebox cOrangeJ">
                        <span class="pr square"><span class="pa">46</span><a href="/index/basic/search?key=Pd">Pd</a></span>
                    </div>
                    <div class="squarebox cOrangeJ">
                        <span class="pr square"><span class="pa">47</span><a href="/index/basic/search?key=Ag">Ag</a></span>
                    </div>
                    <div class="squarebox cOrangeJ">
                        <span class="pr square"><span class="pa">48</span><a href="/index/basic/search?key=Cd">Cd</a></span>
                    </div>
                    <div class="squarebox cYellow">
                        <span class="pr square"><span class="pa">49</span><a href="/index/basic/search?key=In">In</a></span>
                    </div>
                    <div class="squarebox cYellow">
                        <span class="pr square"><span class="pa">50</span><a href="/index/basic/search?key=Sn">Sn</a></span>
                    </div>
                    <div class="squarebox cGreenJ">
                        <span class="pr square"><span class="pa">51</span><a href="/index/basic/search?key=Sb">Sb</a></span>
                    </div>
                    <div class="squarebox cGreenJ">
                        <span class="pr square"><span class="pa">52</span><a href="/index/basic/search?key=Te">Te</a></span>
                    </div>
                    <div class="squarebox cBlue">
                        <span class="pr square"><span class="pa">53</span><a href="/index/basic/search?key=I">I</a></span>
                    </div>
                    <div class="squarebox cPurple">
                        <span class="pr square"><span class="pa">54</span><a href="/index/basic/search?key=Xe">Xe</a></span>
                    </div>
                    <div class="squarebox cRed">
                        <span class="pr square"><span class="pa">55</span><a href="/index/basic/search?key=Cs">Cs</a></span>
                    </div>
                    <div class="squarebox cOrange">
                        <span class="pr square"><span class="pa">56</span><a href="/index/basic/search?key=Ba">Ba</a></span>
                    </div>
                    <div class="squarebox cBrown">
                        <span class="pr square"><span class="pa">57-71</span><a href="/index/basic/search?key=La-Lu">La-Lu</a></span>
                    </div>
                    <div class="squarebox cOrangeJ">
                        <span class="pr square"><span class="pa">72</span><a href="/index/basic/search?key=Hf">Hf</a></span>
                    </div>
                    <div class="squarebox cOrangeJ">
                        <span class="pr square"><span class="pa">73</span><a href="/index/basic/search?key=Ta">Ta</a></span>
                    </div>
                    <div class="squarebox cOrangeJ">
                        <span class="pr square"><span class="pa">74</span><a href="/index/basic/search?key=W">W</a></span>
                    </div>
                    <div class="squarebox cOrangeJ">
                        <span class="pr square"><span class="pa">75</span><a href="/index/basic/search?key=Re">Re</a></span>
                    </div>
                    <div class="squarebox cOrangeJ">
                        <span class="pr square"><span class="pa">76</span><a href="/index/basic/search?key=Os">Os</a></span>
                    </div>
                    <div class="squarebox cOrangeJ">
                        <span class="pr square"><span class="pa">77</span><a href="/index/basic/search?key=Ir">Ir</a></span>
                    </div>
                    <div class="squarebox cOrangeJ">
                        <span class="pr square"><span class="pa">78</span><a href="/index/basic/search?key=Pt">Pt</a></span>
                    </div>
                    <div class="squarebox cOrangeJ">
                        <span class="pr square"><span class="pa">79</span><a href="/index/basic/search?key=Au">Au</a></span>
                    </div>
                    <div class="squarebox cOrangeJ">
                        <span class="pr square"><span class="pa">80</span><a href="/index/basic/search?key=Hg">Hg</a></span>
                    </div>
                    <div class="squarebox cYellow">
                        <span class="pr square"><span class="pa">81</span><a href="/index/basic/search?key=Ti">Ti</a></span>
                    </div>
                    <div class="squarebox cYellow">
                        <span class="pr square"><span class="pa">82</span><a href="/index/basic/search?key=Pb">Pb</a></span>
                    </div>
                    <div class="squarebox cYellow">
                        <span class="pr square"><span class="pa">83</span><a href="/index/basic/search?key=Bi">Bi</a></span>
                    </div>
                    <div class="squarebox cYellow">
                        <span class="pr square"><span class="pa">84</span><a href="/index/basic/search?key=Po">Po</a></span>
                    </div>
                    <div class="squarebox cGreen">
                        <span class="pr square"><span class="pa">85</span><a href="/index/basic/search?key=At">At</a></span>
                    </div>
                    <div class="squarebox cPurple">
                        <span class="pr square"><span class="pa">86</span><a href="/index/basic/search?key=Rn">Rn</a></span>
                    </div>
                    <div class="squarebox cRed">
                        <span class="pr square"><span class="pa">87</span><a href="/index/basic/search?key=Fr">Fr</a></span>
                    </div>
                    <div class="squarebox cOrange">
                        <span class="pr square"><span class="pa">88</span><a href="/index/basic/search?key=Ra">Ra</a></span>
                    </div>
                    <div class="squarebox cGray">
                        <span class="pr square"><span class="pa">89-103</span><a href="/index/basic/search?key=Ac-Lr">Ac-Lr</a></span>
                    </div>
                    <div class="squarebox cOrangeJ">
                        <span class="pr square"><span class="pa">104</span><a href="/index/basic/search?key=Rf">Rf</a></span>
                    </div>
                    <div class="squarebox cOrangeJ">
                        <span class="pr square"><span class="pa">105</span><a href="/index/basic/search?key=Db">Db</a></span>
                    </div>
                    <div class="squarebox cOrangeJ">
                        <span class="pr square"><span class="pa">106</span><a href="/index/basic/search?key=Sg">Sg</a></span>
                    </div>
                    <div class="squarebox cOrangeJ">
                        <span class="pr square"><span class="pa">107</span><a href="/index/basic/search?key=Bh">Bh</a></span>
                    </div>
                    <div class="squarebox cOrangeJ">
                        <span class="pr square"><span class="pa">108</span><a href="/index/basic/search?key=Hs">Hs</a></span>
                    </div>
                    <div class="squarebox cCyan">
                        <span class="pr square"><span class="pa">109</span><a href="/index/basic/search?key=Mt">Mt</a></span>
                    </div>
                    <div class="squarebox cCyan">
                        <span class="pr square"><span class="pa">1</span><a href="/index/basic/search?key=Ds">Ds</a></span>
                    </div>
                    <div class="squarebox cCyan">
                        <span class="pr square"><span class="pa">110</span><a href="/index/basic/search?key=Rg">Rg</a></span>
                    </div>
                    <div class="squarebox cCyan">
                        <span class="pr square"><span class="pa">112</span><a href="/index/basic/search?key=Cn">Cn</a></span>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <div class="clearfix zhaihezi">
                        <div class="squarebox cBrown">
                            <span class="pr square"><span class="pa">57</span><a href="/index/basic/search?key=La">La</a></span>
                        </div>
                        <div class="squarebox cBrown">
                            <span class="pr square"><span class="pa">58</span><a href="/index/basic/search?key=Ce">Ce</a></span>
                        </div>
                        <div class="squarebox cBrown">
                            <span class="pr square"><span class="pa">59</span><a href="/index/basic/search?key=Pr">Pr</a></span>
                        </div>
                        <div class="squarebox cBrown">
                            <span class="pr square"><span class="pa">60</span><a href="/index/basic/search?key=Nd">Nd</a></span>
                        </div>
                        <div class="squarebox cBrown">
                            <span class="pr square"><span class="pa">61</span><a href="/index/basic/search?key=Pm">Pm</a></span>
                        </div>
                        <div class="squarebox cBrown">
                            <span class="pr square"><span class="pa">62</span><a href="/index/basic/search?key=Sm">Sm</a></span>
                        </div>
                        <div class="squarebox cBrown">
                            <span class="pr square"><span class="pa">63</span><a href="/index/basic/search?key=Eu">Eu</a></span>
                        </div>
                        <div class="squarebox cBrown">
                            <span class="pr square"><span class="pa">64</span><a href="/index/basic/search?key=Gd">Gd</a></span>
                        </div>
                        <div class="squarebox cBrown">
                            <span class="pr square"><span class="pa">65</span><a href="/index/basic/search?key=Tb">Tb</a></span>
                        </div>
                        <div class="squarebox cBrown">
                            <span class="pr square"><span class="pa">66</span><a href="/index/basic/search?key=Dy">Dy</a></span>
                        </div>
                        <div class="squarebox cBrown">
                            <span class="pr square"><span class="pa">67</span><a href="/index/basic/search?key=Ho">Ho</a></span>
                        </div>
                        <div class="squarebox cBrown">
                            <span class="pr square"><span class="pa">68</span><a href="/index/basic/search?key=Er">Er</a></span>
                        </div>
                        <div class="squarebox cBrown">
                            <span class="pr square"><span class="pa">69</span><a href="/index/basic/search?key=Tm">Tm</a></span>
                        </div>
                        <div class="squarebox cBrown">
                            <span class="pr square"><span class="pa">70</span><a href="/index/basic/search?key=Yb">Yb</a></span>
                        </div>
                        <div class="squarebox cBrown">
                            <span class="pr square"><span class="pa">71</span><a href="/index/basic/search?key=Ac">Ac</a></span>
                        </div>
                        <div class="squarebox cGray">
                            <span class="pr square"><span class="pa">89</span><a href="/index/basic/search?key=Lu">Lu</a></span>
                        </div>
                        <div class="squarebox cGray">
                            <span class="pr square"><span class="pa">90</span><a href="/index/basic/search?key=Th">Th</a></span>
                        </div>
                        <div class="squarebox cGray">
                            <span class="pr square"><span class="pa">91</span><a href="/index/basic/search?key=Pa">Pa</a></span>
                        </div>
                        <div class="squarebox cGray">
                            <span class="pr square"><span class="pa">92</span><a href="/index/basic/search?key=U">U</a></span>
                        </div>
                        <div class="squarebox cGray">
                            <span class="pr square"><span class="pa">93</span><a href="/index/basic/search?key=Np">Np</a></span>
                        </div>
                        <div class="squarebox cGray">
                            <span class="pr square"><span class="pa">94</span><a href="/index/basic/search?key=Pu">Pu</a></span>
                        </div>
                        <div class="squarebox cGray">
                            <span class="pr square"><span class="pa">95</span><a href="/index/basic/search?key=Am">Am</a></span>
                        </div>
                        <div class="squarebox cGray">
                            <span class="pr square"><span class="pa">96</span><a href="/index/basic/search?key=Cm">Cm</a></span>
                        </div>
                        <div class="squarebox cGray">
                            <span class="pr square"><span class="pa">97</span><a href="/index/basic/search?key=Bk">Bk</a></span>
                        </div>
                        <div class="squarebox cGray">
                            <span class="pr square"><span class="pa">98</span><a href="/index/basic/search?key=Cf">Cf</a></span>
                        </div>
                        <div class="squarebox cGray">
                            <span class="pr square"><span class="pa">99</span><a href="/index/basic/search?key=Es">Es</a></span>
                        </div>
                        <div class="squarebox cGray">
                            <span class="pr square"><span class="pa">100</span><a href="/index/basic/search?key=Fm">Fm</a></span>
                        </div>
                        <div class="squarebox cGray">
                            <span class="pr square"><span class="pa">101</span><a href="/index/basic/search?key=Md">Md</a></span>
                        </div>
                        <div class="squarebox cGray">
                            <span class="pr square"><span class="pa">102</span><a href="/index/basic/search?key=No">No</a></span>
                        </div>
                        <div class="squarebox cGray">
                            <span class="pr square"><span class="pa">103</span><a href="/index/basic/search?key=Lr">Lr</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-h clearfix m25">
                <div class="sc-fl left">
                    <span>每页显示</span>
                    <select name="" id="">
                        <option value="0">50</option>
                    </select>
                    <span>条</span>
                </div>
                <div class="sc-fr right">
                    <soan class="btn showhide">显示/隐藏</soan>
                    <soan class="btn copy">复制</soan>
                    <soan class="btn print">打印</soan>
                    <soan class="btn export">导出</soan>
                </div>
            </div>
            <table class="table-p m25">
                
                <?php if($searchData!=[]): ?>
                <tr>
                    <td>ID</td>
                    <td>数据</td>
                </tr>
                <?php if(is_array($searchData) || $searchData instanceof \think\Collection || $searchData instanceof \think\Paginator): $i = 0; $__LIST__ = $searchData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                
                <tr>
                    <td>
                        <?php echo $v->id; ?>
                    </td>
                    <td>
                        <a href="/index/basic/bdsrc?id=<?php echo $v->id; ?>">
                            <?php echo $v->search; ?>
                        </a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; else: ?>
                <h1 style="padding-top: 20px; text-align: center;">无数据</h1>
                <?php endif; ?>
            </table>
            <div class="table-paging c-333 sc-center">
                <span class="prev">
                    <?php if($hasPrePage): ?>
                    <a href="?cid=<?php echo $cid; ?>&search=<?php echo $search; ?>&searchCid=<?php echo $searchCid; ?>&page=<?php echo $page-1; ?>">← 向前</a>
                    <?php else: ?>
                    -
                    <?php endif; ?>
                </span>
                <span class="num"><?php echo $page; ?></span>
                <span class="next">
                    <?php if($hasNextPage): ?>
                    <a href="?cid=<?php echo $cid; ?>&search=<?php echo $search; ?>&searchCid=<?php echo $searchCid; ?>&page=<?php echo $page+1; ?>">向后 →</a>
                    <?php else: ?>
                    -
                    <?php endif; ?>
                </span>
            </div>
        </div>
        <footer><div class="width-1200">
    <?php echo $footer['content']; ?>
    <div class="link clearfix">
        友情连接：&nbsp;&nbsp;
        <div class="sc-fr">
            <?php if(is_array($friends) || $friends instanceof \think\Collection || $friends instanceof \think\Paginator): $i = 0; $__LIST__ = $friends;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <a target="_blank" href="<?php echo $vo['linkto']; ?>"><?php echo $vo['name']; ?></a>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <br>
            <br>
        </div>
    </div>
</div></footer>
    </div>
    <script src="/static/index/custom/js/jquery.min.js"></script>
    <script src="/static/index/custom/js/p.js"></script>
    <script src="/static/index/custom/js/bootstrap.min.js"></script>
    <script src="/static/vendor/layui/layui.js"></script>
    <script>
        $(function () {
            var mynav = $('nav li').find('a'); //寻找导航的a元素 　　
            for (var i = 0; i < mynav.length; i++) {
                var links = mynav[i].getAttribute('href'); //取出每个链接的href属性的值
                var myurl = document.location.href; //取出当前窗口的链接
                if (myurl.indexOf(links) != -1) { //判断浏览器地址是否等于当前a元素的href属性
                    $(mynav[i]).parent().addClass('nav-hover')
                }
            }
            $('.zhouqibiao').on('click', function () {
                $('.Periodic-table').toggle()

            })
        })

        layui.use(['form', 'layer'], function () {
            var form = layui.form,
                layer = layui.layer;

            //监听提交
            form.on('submit(formDemo)', function (data) {});

            // 切换分类
            $(".Cate").on('click', function () {
                var cid = $(this).children('img').attr("alt");
                location.href = "<?php echo url('index/basic/index'); ?>?cid=" + cid;
            })

            // 切换数据分类
            $(".Data").on('click', function () {
                var Did = $(this).children('.DataId').text();
                var cid = $(this).siblings('.DataCid').text();
                location.href = "<?php echo url('index/basic/dataContent'); ?>?cid=" + cid + "&bid=" + Did;
            })

        })
    </script>

    <script>
        $(".squarebox").click(function (e) {
            e.preventDefault()
            let key = $(this).find("a").html()
            let input = $('.search2 input')
            input.val(input.val() + " " + key)
            $("#doSearch").click()
            return
        })
    </script>
</body>

</html>