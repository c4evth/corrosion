<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:87:"/Users/iimt/Development/PHP/corrosion/public/../application/index/view/basic/bdsrc.html";i:1542776213;s:79:"/Users/iimt/Development/PHP/corrosion/application/index/view/common/header.html";i:1542099948;s:76:"/Users/iimt/Development/PHP/corrosion/application/index/view/common/nav.html";i:1541485908;s:79:"/Users/iimt/Development/PHP/corrosion/application/index/view/common/footer.html";i:1542023938;}*/ ?>
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
	#real-table {
		padding: 10px;
		border: 2px solid #ccc;
		border-radius: 5px;
		overflow-x: scroll;
	}
	.Basicdata {
		display: none;
	}
  #datas table {
    width: 1184px;
    margin: 0 auto;
    margin-top: 50px;
  }
  #datas table tr{
    height: 54px;
    line-height: 54px;
  }
  #datas table td {
    border: 2px solid #7d7d7d;
    text-align: center;
    font-size: 24px;
    color: #7d7d7d;
  }
  #datas {
    text-align: center;
    padding-top: 20px;
    height: auto;
  }
  #datas .data-img {
    width: 60%;
    margin: 0 auto;
    padding-top: 10px;
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
      <div class="Periodic-table-box pr">
        <div id="datas" class="Periodic-table DataTable clearfix">
            <h3>数据源<?php echo $data->id; ?> ： <?php echo $data->search; ?></h3>
              <?php if($data['type']==2): ?>
              <img class="data-img" src="<?php echo $data['content']; ?>">
              <?php else: ?>
                <?php echo $data['content']; endif; ?>
            </div>
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
  </script>
</body>

</html>