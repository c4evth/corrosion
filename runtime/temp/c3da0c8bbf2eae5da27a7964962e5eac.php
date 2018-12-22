<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:87:"/Users/iimt/Development/PHP/corrosion/public/../application/index/view/login/index.html";i:1542101120;s:79:"/Users/iimt/Development/PHP/corrosion/application/index/view/common/header.html";i:1542099948;s:79:"/Users/iimt/Development/PHP/corrosion/application/index/view/common/footer.html";i:1542023938;}*/ ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> -->
  <!-- <meta name="full-screen" content="yes" /> -->
  <!-- <meta name="x5-fullscreen" content="true" /> -->
  <!-- 是否启用 WebApp 全屏模式，删除苹果默认的工具栏和菜单栏 -->
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <title>国家材料环境腐蚀科学数据中心</title>
  <link rel="stylesheet" href="/static/index/custom/css/bootstrap.min.css">
  <link rel="stylesheet" href="/static/index/custom/css/reset.css">
  <link rel="stylesheet" href="/static/index/custom/css/p.css">
  <link rel="stylesheet" href="/static/index/custom/css/acm.css">
  <link rel="stylesheet" href="/static/index/custom/css/new.css">
  <style>
    .login-btn {
      width: 100%;
    background: #0093d6;
    color: #fff;
    height: 48px;
    text-align: center;
    line-height: 48px;
    display: block;
    font-size: 16px;
    letter-spacing: 2px;
    }
    .hint {
      color: red;
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
    <div class="login_next">
      <div class="width-1200">
        <form action="" method="post" id="loginForm">
          <div class="login_popup">
            <h1>欢迎登录</h1>
            <ul>
              <li>
                <input type="text" name="name" required lay-verify="required" placeholder="手机号/邮箱/用户名">
              </li>
              <li>
                <input type="password" name="pass" required lay-verify="required" placeholder="请输入密码">
              </li>
              <li>
                <a href="new_forget.html">忘记密码</a>
              </li>
              <li>
                <span class="hint"><?php echo $hint; ?></span>
                <button class="login-btn" type="submit">登录</button>
              </li>
            </ul>
            <div class="login_bottom">
              <p>还没有账户？那就注册一个吧! <a href="/index/login/register">注册</a></p>
            </div>
          </div>
        </form>
      </div>
    </div>
    <footer class="new_footer"><div class="width-1200">
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
  <script>
    $(function () {
      $('.qiehuan span').on('click', function () {
        $(this).addClass('active').siblings().removeClass('active')
      })
      var mynav = $('nav li').find('a'); //寻找导航的a元素 　　
      for (var i = 0; i < mynav.length; i++) {
        var links = mynav[i].getAttribute('href'); //取出每个链接的href属性的值
        var myurl = document.location.href; //取出当前窗口的链接
        if (myurl.indexOf(links) != -1) { //判断浏览器地址是否等于当前a元素的href属性
          $(mynav[i]).parent().addClass('nav-hover')
        }
      }
    })
  </script>
</body>

</html>