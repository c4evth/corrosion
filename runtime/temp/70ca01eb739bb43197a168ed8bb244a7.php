<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:87:"/Users/iimt/Development/PHP/corrosion/public/../application/index/view/index/index.html";i:1544598430;s:79:"/Users/iimt/Development/PHP/corrosion/application/index/view/common/header.html";i:1542099950;s:76:"/Users/iimt/Development/PHP/corrosion/application/index/view/common/nav.html";i:1541485910;s:79:"/Users/iimt/Development/PHP/corrosion/application/index/view/common/footer.html";i:1542023940;}*/ ?>
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
    <link rel="stylesheet" href="/static/vendor/layui/css/layui.css">
    <style>
        .content-two .realtime-data .data-center{
            margin: 0;
            width: 97%;
            padding: 0 10px;
        }
        .content-two .realtime-data .data-center .icon{
            width: 20px;
            height: 20px;
        }
        .content-two .realtime-data .more{
            float: right;
            padding-right: 30px;
            font-size: 18px;
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
        <div class="banner-index">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">

                </ol>
                <div class="layui-carousel carousel-inner" role="listbox" id="test1">

                    <div carousel-item>
                        <?php if(is_array($banner) || $banner instanceof \think\Collection || $banner instanceof \think\Paginator): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <div class="item">
                            <img class="img-link" data-id="<?php echo $vo['linkto']; ?>" style="height:100%" src="<?php echo $vo['img']; ?>" alt="...">
                        </div>
                        <!-- <a  id="a-<?php echo $vo['id']; ?>" href="<?php echo $vo['linkto']; ?>"><?php echo $vo['linkto']; ?></a> -->
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="width-1200">
            <div class="public-title">
                <img src="/static/index/custom/images/a3.png" alt="">
								<span>资讯中心</span>
								<a style="font-size:16px;color:black;" href="/index/Conference/index">会议</a>
            </div>
            <div class="content-one clearfix">
                <div class="sc-fl left">
                    <a href="/index/article/index?id=<?php echo $selected['aid']; ?>">
                        <img src="<?php echo $selected['cover']; ?>" style="max-height: 430px; overflow: hidden;" alt="">
                        <h4><?php echo $selected['title']; ?></h4>

                        <p><?php echo $selected['content']; ?></p>
                    </a>
                </div>
                <div class="sc-fl right">
                    <h4 style="color: #0093d6"><span></span>科技焦点<a href="/index/focus" class="sc-fr">
                            <span>更多</span>
                            <img src="/static/index/custom/images/a31.png" alt="">
                        </a></h4>
                    <?php if(is_array($focus) || $focus instanceof \think\Collection || $focus instanceof \think\Paginator): $i = 0; $__LIST__ = $focus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <a href="/index/article/index?id=<?php echo $vo['aid']; ?>">
                        <p class="text-overflow-one"><?php echo $vo['title']; ?></p>
                    </a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <h4 style="color: #0093d6"><span></span>每周精选
                        <a href="/index/select" class="sc-fr">
                            <span>更多</span><img src="/static/index/custom/images/a31.png" alt="">
                        </a>
                    </h4>
                    <?php if(is_array($select) || $select instanceof \think\Collection || $select instanceof \think\Paginator): $i = 0; $__LIST__ = $select;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <a href="/index/article/index?id=<?php echo $vo['aid']; ?>">
                        <p class="text-overflow-one"><?php echo $vo['title']; ?></p>
                    </a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <h4 style="color: #0093d6"><span></span>最新资讯<a href="/index/article/newsList" class="sc-fr">
                            <span>更多</span><img src="/static/index/custom/images/a31.png" alt="">
                        </a></h4>
                    <?php if(is_array($news) || $news instanceof \think\Collection || $news instanceof \think\Paginator): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <a href="/index/article/index?id=<?php echo $vo['id']; ?>">
                        <p class="text-overflow-one"><?php echo $vo['title']; ?></p>
                    </a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <div class="gray-div"></div>
            <div class="public-title m25">
                <img src="/static/index/custom/images/a5.png" alt="">
                <span>数据中心</span>
            </div>
            <div class="content-two clearfix">
                <div class="sc-fl left realtime-data">
                    <div class="title">
                        <span></span>
                        <span>实时数据</span>
                        <span class="more">
                            <a href="/index/realtime">更多》</a>
                        </span>
                    </div>
                    
                    <div class="data-center">
                        <div class="chart-title clearfix">
                            <img class="icon" src="/static/index/custom/images/shang.png" alt="" />
                            <span>24h瞬态腐蚀量-时间曲线</span>
                            <select class="selectpicker" id="equipment" style=" float: right">
                            </select>
                        </div>
                        <div id="echarts3" class="echarts-data-center"></div>
                    </div>
                </div>
                <div class="sc-fl right">
                    <div class="title" style="position: relative;">
                        <span></span>
                        <span>数据动态</span>
                        <a href="/index/article/dataActivity" style="position: absolute; right: 2px;">
                            更多<img src="/static/index/custom/images/a31.png" alt="">
                        </a>
                    </div>
                    <?php if(is_array($dataActivity) || $dataActivity instanceof \think\Collection || $dataActivity instanceof \think\Paginator): $i = 0; $__LIST__ = $dataActivity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <a href="/index/article/index?id=<?php echo $vo['id']; ?>">
                        <h4><?php echo $vo['title']; ?></h4>
                        <p class="text-overflow-much">
                            <?php echo $vo['content']; ?>
                        </p>
                    </a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <div class="gray-div"></div>
            <div class="public-title m25">
                <img src="/static/index/custom/images/a6.png" alt="">
                <span>专题数据</span>
                <div class="sc-fr more">
                    <a href="/index/article/dataProList"><span class="c-333">更多</span>
                        <img src="/static/index/custom/images/a7.png" alt=""></a>
                </div>
            </div>
            <ul class="content-four clearfix m25">
                <?php if(is_array($dataPro) || $dataPro instanceof \think\Collection || $dataPro instanceof \think\Paginator): $i = 0; $__LIST__ = $dataPro;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li class="sc-fl "><a href="/index/article/index?id=<?php echo $vo['id']; ?>">
                        <img src="<?php echo $vo['cover']; ?>" alt="">
                        <p class="c-333 text-overflow-much"><?php echo $vo['title']; ?></p>
                    </a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="gray-div"></div>
            <div class="public-title m25">
                <img src="/static/index/custom/images/a9.png" alt="">
                <span>平台介绍</span>
            </div>
            <div class="content-five clearfix">
                <div class="sc-fl left">
                    <p class="c-333">国家材料环境腐蚀科学数据中心是经科技部批准成立，由北京科技大学牵头，联合民口部门和国防部门共同建设的新时期具有大数据特色的数据中心平台体系。数据中心通过长期持续开展了黑色金属、有色金属、建筑材料、涂镀层材料及高分子材料等5大类，600余种材料，建成了最长达35年的野外试验数据；近年来依托自主研发的材料腐蚀和相关环境数据自动采集的多探头传感器，建立了基于物联网的腐蚀和环境数据的高通量采集、无线传输及入库的“腐蚀大数据”创新技术体系，该项技术为材料腐蚀基础研究在线提供了实时24小时的环境腐蚀数据。目前国家材料环境腐蚀科学数据中心总有效数据量超过1800万条，在全国同类数据资源中占比超过80%以上，已成为我国乃至世界上最大的腐蚀数据资源拥有者。
                    </p>
                </div>
                <div class="sc-fr right"><img src="/static/index/custom/images/a32.png" alt=""></div>
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
    <script src="/static/index/custom/js/echarts.min.js"></script>
    <script
      type="text/javascript"
      src="http://echarts.baidu.com/gallery/vendors/echarts-gl/echarts-gl.min.js"
    ></script>
    <script
      type="text/javascript"
      src="http://echarts.baidu.com/gallery/vendors/echarts-stat/ecStat.min.js"
    ></script>
    <script
      type="text/javascript"
      src="http://echarts.baidu.com/gallery/vendors/echarts/extension/dataTool.min.js"
    ></script>
    <script
      type="text/javascript"
      src="http://echarts.baidu.com/gallery/vendors/echarts/map/js/china.js"
    ></script>
    <script
      type="text/javascript"
      src="http://echarts.baidu.com/gallery/vendors/echarts/map/js/world.js"
    ></script>
    <script
      type="text/javascript"
      src="https://api.map.baidu.com/api?v=2.0&ak=ZUONbpqGBsYGXNIYHicvbAbM"
    ></script>
    <script
      type="text/javascript"
      src="http://echarts.baidu.com/gallery/vendors/echarts/extension/bmap.min.js"
    ></script>
    <script
      type="text/javascript"
      src="http://echarts.baidu.com/gallery/vendors/simplex.js"
    ></script>
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

        layui.use('carousel', function () {
            var carousel = layui.carousel;
            //建造实例
            carousel.render({
                elem: '#test1',
                width: '100%', //设置容器宽度
                height: '408px',
                arrow: 'always', //始终显示箭头
                //,anim: 'updown' //切换动画方式
            });
        });

        $(document).ready(e => {
            $(".img-link").click(function () {
                let id = this.dataset.id
                return window.open(id, "_blank");
            })
            get_equipment()
        })

    function get_equipment() {
        $.ajax({
          url: "http://www.corrinfo.com/Api/Menu/get_equip",
          dataType: "json",
          success: res => {
            let selectDom = $("#equipment");
            selectDom.empty()
            let optionHtml = "";
            for (var i = 0; i < res.length; i++) {
              optionHtml =
                "<option value='" +
                res[i].id +
                "'>" +
                res[i].name +
                "</option>";
              selectDom.append(optionHtml);
            }
            selectDom.change(e => {
                let id = $("#equipment").val()
                echarts3(id)
            })
            let array_id = res[0].id
            echarts3(array_id)
          }
        });
      }


              //第一个统计图
      function echarts3(array_id = '', start_time = '', end_time = '') {
        var myChart = echarts.init(document.getElementById("echarts3"));
        $.ajax({
          type: "POST",
          url: "http://www.corrinfo.com/Api/Menu/moment_time_h",
          data: {
            array_id: array_id,
            start_time: start_time,
            end_time: end_time
          },
          dataType: "json",
          success: function(data) {
            myChart = echarts.init(document.getElementById("echarts3"));
            option = {
              tooltip: {
                trigger: "axis"
              },
              legend: {
                data: data.equipment_array
              },
              toolbox: {
                show: true,
                feature: {
                  saveAsImage: {}
                }
              },
              xAxis: {
                type: "category",
                boundaryGap: false,
                data: data.time_array
              },
              yAxis: [
                {
                  type: "value",
                  position: "left",
                  axisLabel: {
                    formatter: "{value}"
                  }
                },
                {
                  type: "value",
                  position: "right",
                  axisLabel: {
                    formatter: "{value}℃"
                  }
                },
                {
                  type: "value",
                  position: "right",
                  offset: 35,
                  axisLabel: {
                    formatter: "{value}%"
                  }
                }
              ],
              series: data.array_array
            };

            myChart.setOption(option);
          },
          error: function() {
            //alert("error2");
          }
        });
      }

    </script>
</body>

</html>