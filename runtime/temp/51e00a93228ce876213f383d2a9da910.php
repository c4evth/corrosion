<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:92:"/Users/iimt/Development/PHP/corrosion/public/../application/index/view/conference/index.html";i:1545202740;s:79:"/Users/iimt/Development/PHP/corrosion/application/index/view/common/header.html";i:1542099950;s:80:"/Users/iimt/Development/PHP/corrosion/application/index/view/conference/nav.html";i:1545385536;s:79:"/Users/iimt/Development/PHP/corrosion/application/index/view/common/footer.html";i:1542023940;}*/ ?>
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
			margin-top: 80px;
		}

		.Content {
			margin: 0 auto;
		}

		.contrnItem .border-title .Title {
			font-weight: bold;
			font-size: 1.4em;
			margin-left: -10px;
		}

		.contrnItem .ItemNews a h5 {
			margin: 0 0 10px 0;
		}

		.contrnItem .ItemNews p {
			text-indent: 2em;
			color: black;
		}

		.sideItem h4 {
			margin: 20px 0 20px 0;
			height: 50px;
			display: flex;
			align-items: center;
			justify-content: center;
			background-color: #f2f2f2;
			font-weight: bold;
		}

		.sideItem h5 {
			margin: 10px 0 10px 0;
		}

		.sideItem h5>a {
			/* margin: 10px 0 10px 0; */
			color: black;
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
		<li><a href="/index/conference/index">会议主页</a></li>
		<img src=" /static/index/custom/images/a2.png" alt="" class="sc-fl" style="margin-top: 1.1%;">
		<li><a href="/index/conference/unit">组织机构</a></li>
		<img src=" /static/index/custom/images/a2.png" alt="" class="sc-fl" style="margin-top: 1.1%;">
		<li><a href="/index/conference/hotel">住宿和交通</a></li>
		<img src=" /static/index/custom/images/a2.png" alt="" class="sc-fl" style="margin-top: 1.1%;">
		<li><a href="/index/conference/history">历届回顾</a></li>
		<img src=" /static/index/custom/images/a2.png" alt="" class="sc-fl" style="margin-top: 1.1%;">
		<li><a href="/index/conference/arrange">日程安排</a></li>
		<img src=" /static/index/custom/images/a2.png" alt="" class="sc-fl" style="margin-top: 1.1%;">
		<li><a href="/index/conference/peperDesc">摘要征集</a></li>
		<img src=" /static/index/custom/images/a2.png" alt="" class="sc-fl" style="margin-top: 1.1%;">
		<li><a href="/index/conference/travel">旅游</a></li>
		<img src=" /static/index/custom/images/a2.png" alt="" class="sc-fl" style="margin-top: 1.1%;">
		<li><a href="/index/conference/contact">联系我们</a></li>
	</ul>
</div></nav>
		<!-- content start -->
		<div class="width-1200 sw row" style="">
			<!-- 主体内容 -->
			<div class="col-md-8" style="min-height: 460px;">
					<div class="layui-carousel" id="test1" style="">
						<div carousel-item style="height: 380px;">
							<?php if(is_array($pic['banner']) || $pic['banner'] instanceof \think\Collection || $pic['banner'] instanceof \think\Paginator): $i = 0; $__LIST__ = $pic['banner'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<div style="">
								<img src="<?php echo $vo; ?>" style="width:772px;" alt="">
							</div>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>

				<div class="contrnItem">
					<div class="border-title clearfix">
						<span></span>
						<span class="Title">最新资讯</span>
						<a href="/index/article/newsList">
							<div class="sc-fr"><b>更多</b><img src="/static/index/custom/images/a7.png" alt=""></div>
						</a>
					</div>
					
					<div class="box-new clearfix">
						<div class="ItemNews" style="margin-left:20px;">
							<?php if(is_array($base['articleNames']) || $base['articleNames'] instanceof \think\Collection || $base['articleNames'] instanceof \think\Paginator): $i = 0; $__LIST__ = $base['articleNames'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<a target="_blank" href="/index/article/index?id=<?php echo $vo['id']; ?>" style="color:black;margin-bottom: 10px;">
								<h5><?php echo $vo['title']; ?></h5>
								</p>
							</a>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
				</div>

				<div class="contrnItem">
					<div class="border-title clearfix">
						<span></span>
						<span class="Title">时间节点</span>
					</div>
					<div class="box-new clearfix">
						<div class="ItemNews" style="margin-left:20px;">
							<?php if(is_array($base['times']) || $base['times'] instanceof \think\Collection || $base['times'] instanceof \think\Paginator): $i = 0; $__LIST__ = $base['times'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
								<h5><?php echo $vo; ?></h5>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
				</div>

				<div class="contrnItem">
					<div class="border-title clearfix">
						<span></span>
						<span class="Title">会议主题</span>
					</div>
					<div class="box-new clearfix">
						<div class="ItemNews row" style="margin-left:20px;">
							<?php if(is_array($base['theme']) || $base['theme'] instanceof \think\Collection || $base['theme'] instanceof \think\Paginator): $i = 0; $__LIST__ = $base['theme'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<h5 class="col-md-6"><?php echo $vo; ?></h5>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
				</div>

				<div class="contrnItem">
					<div class="border-title clearfix">
						<span></span>
						<span class="Title">会议亮点</span>
					</div>
					<div class="box-new clearfix">
						<div class="ItemNews" style="margin-left:20px;">
							<?php echo $base['spot']; ?>
						</div>
					</div>
				</div>

				<div class="contrnItem">
					<div class="border-title clearfix">
						<span></span>
						<span class="Title">历届回顾</span>
					</div>
					<div class="box-new clearfix">
						<div class="ItemNews" style="margin-left:20px;">
							<?php echo $pic['history']; ?>
						</div>
					</div>
				</div>

			</div>
			<!-- 主体内容end -->
			<!-- 侧栏start -->
			<div class="col-md-4" style="min-height: 460px;padding-left: 0px;padding-right: 0px;text-align: center;border:2px solid;border-color:#e4e1e1;padding-bottom: 30px;">
				<a href="/index/enlist/index?id=<?php echo $currID; ?>" class="btn btn-primary" style="font-size:40px;padding: 10px;padding-left:80px;padding-right: 80px; border-radius: 50px;margin-top: 20px">点击报名</a>
				<br>
				<a href=""></a>
				<a href="" class="btn btn-primary" style="font-size:32px;padding: 10px;padding-left:50px;padding-right: 50px; border-radius: 50px;margin-top: 20px">开票信息表下载</a>
				<div class="sideItem">
					<h4>主办单位</h4>
					<div style="width: 310px;margin: 0 auto">
						<img src="<?php echo $base['logo']; ?>" alt="">
					</div>
				</div>

				<?php if(is_array($Org['unit']) || $Org['unit'] instanceof \think\Collection || $Org['unit'] instanceof \think\Paginator): $i = 0; $__LIST__ = $Org['unit'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<div class="sideItem">
					<h4><?php echo $key; ?></h4>
					<?php if(is_array($vo) || $vo instanceof \think\Collection || $vo instanceof \think\Paginator): $i = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
					<h5><a href="<?php echo $v['Href']; ?>"><?php echo $v['name']; ?></a></h5>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<!-- 侧栏end -->

			<div class="row width-1200" style="padding-top: 20px;clear:both;text-align: center;display: flex;">
				<div class="layui-carousel" id="test2" style="flex: 1;">
					<div carousel-item style="height: 200px;">
						<?php if(is_array($pic['historypic']) || $pic['historypic'] instanceof \think\Collection || $pic['historypic'] instanceof \think\Paginator): $i = 0; $__LIST__ = $pic['historypic'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<div>
						<img width="100%" height="270px" src="<?php echo $vo; ?>" alt="">
						</div>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>

				<div style="flex: 1;margin-left: 10px" class="layui-carousel" id="test3">
					<div carousel-item style="height: 200px;">
						<?php if(is_array($pic['historypic']) || $pic['historypic'] instanceof \think\Collection || $pic['historypic'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($pic['historypic']) ? array_slice($pic['historypic'],1,null, true) : $pic['historypic']->slice(1,null, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<div>
							<img width="100%" height="270px" src="<?php echo $vo; ?>" alt="">
						</div>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>

				<div class="layui-carousel" id="test4" style="flex: 1;margin-left: 10px">
					<div carousel-item style="height: 200px;">
						<?php if(is_array($pic['historypic']) || $pic['historypic'] instanceof \think\Collection || $pic['historypic'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($pic['historypic']) ? array_slice($pic['historypic'],2,null, true) : $pic['historypic']->slice(2,null, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<div>
							<img width="100%" height="270px" src="<?php echo $vo; ?>" alt="">
						</div>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>

				<div class="layui-carousel" id="test5" style="flex: 1;margin-left: 10px">
					<div carousel-item style="height: 200px;">
						<?php if(is_array($pic['historypic']) || $pic['historypic'] instanceof \think\Collection || $pic['historypic'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($pic['historypic']) ? array_slice($pic['historypic'],3,null, true) : $pic['historypic']->slice(3,null, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<div>
							<img width="100%" height="270px" src="<?php echo $vo; ?>" alt="">
						</div>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
			</div>
			

			<!-- 媒体单位start -->
			<div class="row width-1200" style="clear:both;">
				<br>
				<div class="contrnItem">
					<div class="border-title clearfix" style="margin-left:15px;">
						<span></span>
						<span class="Title"><?php echo $Org['media']['name']; ?></span>
					</div>
					<div class="box-new clearfix row" style="margin-left:10px;">
						<div class="ItemNews row" style="margin-left:20px;">
							<?php if(is_array($Org['media']['data']) || $Org['media']['data'] instanceof \think\Collection || $Org['media']['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $Org['media']['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
							<a class="col-md-4" href="<?php echo $v['Href']; ?>" style="color:black;">
								<h5><?php echo $v['name']; ?></h5>
							</a>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
				</div>
			</div>
			<!-- 媒体单位end -->
		</div>
		<!-- content end -->
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
	<script src="/static/index/custom/js/jquery.min.js"></script>
	<script src="/static/index/custom/js/p.js"></script>
	<script src="/static/index/custom/js/bootstrap.min.js"></script>
	<script src="/static/vendor/layui/layui.js"></script>
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
			//描点定位
			$('.platform-aside a').each(function (i) {
				$('.platform-aside a').eq(i).on('click', function () {
					$('html, body').animate({ scrollTop: $('#pone' + i).offset().top }, 500);
					$(this).addClass('current').siblings().removeClass('current');
				})
			})

		})

		layui.use('carousel', function () {
				var carousel = layui.carousel;
				//建造实例
				carousel.render({
				elem: '#test1'
				, width: '100%' //设置容器宽度
				, height: '100%'
				, arrow: 'always' //始终显示箭头
				, anim: 'fade'
				, indicator: 'none'
				, arrow: 'none'
				//,anim: 'updown' //切换动画方式
			});

			carousel.render({
				elem: '#test2'
				, width: '100%' //设置容器宽度
				, height: '100%'
				, anim: 'fade'
				, arrow: 'always' //始终显示箭头
				//,anim: 'updown' //切换动画方式
				, indicator: 'none'
				, arrow: 'none'
			});
			carousel.render({
				elem: '#test3'
				, width: '100%' //设置容器宽度
				, height: '100%'
				, anim: 'fade'
				, arrow: 'always' //始终显示箭头
				//,anim: 'updown' //切换动画方式
				, indicator: 'none'
				, arrow: 'none'
			});
			carousel.render({
				elem: '#test4'
				, width: '100%' //设置容器宽度
				, height: '100%'
				, anim: 'fade'
				, arrow: 'always' //始终显示箭头
				//,anim: 'updown' //切换动画方式
				, indicator: 'none'
				, arrow: 'none'
			});
			carousel.render({
				elem: '#test5'
				, width: '100%' //设置容器宽度
				, height: '100%'
				, anim: 'fade'
				, arrow: 'always' //始终显示箭头
				//,anim: 'updown' //切换动画方式
				, indicator: 'none'
				, arrow: 'none'
			});
		});
	</script>
</body>

</html>