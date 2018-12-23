<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:87:"/Users/iimt/Development/PHP/corrosion/public/../application/index/view/equip/index.html";i:1545467803;s:79:"/Users/iimt/Development/PHP/corrosion/application/index/view/common/header.html";i:1542099950;s:76:"/Users/iimt/Development/PHP/corrosion/application/index/view/common/nav.html";i:1541485910;s:79:"/Users/iimt/Development/PHP/corrosion/application/index/view/common/footer.html";i:1542023940;}*/ ?>
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
  <link rel="stylesheet" href="/static/vendor/layui/css/layui.css">
  <link rel="stylesheet" href="/static/index/custom/css/reset.css">
  <link rel="stylesheet" href="/static/index/custom/css/p.css">
  <link rel="stylesheet" href="/static/index/custom/css/acm.css">
  <link rel="stylesheet" href="/static/index/custom/css/new.css">
  <style>
    .layui-laypage a, .layui-laypage span {
      background-color: inherit;
    }
    .layui-laypage button {
      background-color: #009688;
      color: #fff;
    }
    .layui-table-tool {padding-left: 5px;}
    .layui-table-tool-temp {
      display: none;
    }
    footer {
        margin-top: 3%;
      }

      .data-center {
        width: 100%;
        margin-left: 0;
        margin-bottom: 2%;
      }
      .data-header {
        padding-top: 30px;
      }
      .data-header .right-top input {
        background: none;
        text-indent: 0;
      }
      .xm-select-parent {
        display: inline-block;
        width: 220px;
      }
      .xm-select-parent .xm-select {
        width: 100%;
      }

      .xm-select-parent .xm-select .xm-select-label {
        overflow: hidden;
        height: 30px;
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


    <div class="width-1200">
      <div class="data-header">
        <div class="right-top">
          <span style="padding-left:3%">设备</span>
          <select name="dian" xm-select="selectId" xm-select-skin="default" id="equip">
          </select>
          <span style="padding-left:3%">开始时间</span>
          <input type="text" id="startTime" class="layui-input" style="background: none; text-indent: 0; display: inline-block;"
            placeholder="请输入开始时间" />
          <span>结束时间</span>
          <input type="text" id="endTime" class="layui-input" style="background: none; text-indent: 0; display: inline-block;"
            placeholder="请输入结束时间" />
          <button type="button" id="search">搜索</button>
        </div>
      </div>

      <table class="layui-hide" id="test"></table>
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
    let ROOT_PATH = "http://www.corrinfo.com";
    let EQUIP = {}
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

    $(document).ready(e => {
      EQUIP = JSON.parse(localStorage.getItem('corro_equip_row'))
      layui.use("laydate", function () {
        var laydate = layui.laydate;

        //执行一个laydate实例
        laydate.render({
          elem: "#startTime", //指定元素
          format: "yyyy-MM-dd HH:mm",
          type: "datetime"
        });
        laydate.render({
          elem: "#endTime", //指定元素
          format: "yyyy-MM-dd HH:mm",
          type: "datetime"
        });
      });
      $("#search").click(e => {
        let id = $("#equip").val()
        let start = $("#startTime").val()
        let end = $("#endTime").val()

        renderTable(id, start, end)
      })
      get_equipment()
    })



    // 获取设备列表
    function get_equipment() {
      $.ajax({
        url: ROOT_PATH + "/Api/Menu/get_equip",
        dataType: "json",
        success: res => {
          let selectDom = $("#equip");
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
          initTable()
        }
      });
    }

    function initTable() {
      let id = EQUIP.id
      $("#equip").val(id)
      renderTable(id)
    }

    function renderTable(id, start = '', end = '') {
      layui.use("table", function () {
        var table = layui.table;
        let URL = 'http://www.corrinfo.com/Api/Menu/get_equip_data?id=' + id
          + '&start=' + start
          + '&end=' + end
        // $(".layui-table-tool-self").hide()
        table.render({
          elem: '#test',
          toolbar: 'default',
          url: URL,
          parseData: d => {
            $(".layui-table-tool-self").hide()
            return d
          },
          cols: [
            [{
                field: 'id',
                width: 80,
                title: 'ID',
                sort: true
              },
              {
                field: 't',
                width: 120,
                title: '温度'
              },
              {
                field: 'h',
                width: 120,
                title: '湿度',
                sort: true
              },
              {
                field: 'i1',
                width: 120,
                title: '通道1电流'
              },
              {
                field: 'i2',
                width: 150,
                title: '通道2电流'
              },
              {
                field: 'i3',
                width: 150,
                title: '通道3电流'
              },
              {
                field: 'i4',
                width: 150,
                title: '通道4电流'
              },
              {
                field: 'v1',
                width: 150,
                title: '通道一电压'
              },
              {
                field: 'time',
                width: 150,
                title: '采集时间'
              },
            ]
          ],
          page: true,
          limit: 50,
          limits: [50, 200, 500, 1000, 5000, 10000],
          done: e => {
            console.log()
            $(".layui-table-tool .layui-laypage").remove()
            if($(".layui-table-page .layui-laypage"))
              $(".layui-table-tool").prepend($(".layui-table-page .layui-laypage"))
          $(".layui-table-tool-self").show()
          }
        });
      })
    }
  </script>
</body>

</html>