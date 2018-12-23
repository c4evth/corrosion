<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:90:"/Users/iimt/Development/PHP/corrosion/public/../application/index/view/realtime/index.html";i:1545463580;s:79:"/Users/iimt/Development/PHP/corrosion/application/index/view/common/header.html";i:1542099950;s:76:"/Users/iimt/Development/PHP/corrosion/application/index/view/common/nav.html";i:1541485910;s:79:"/Users/iimt/Development/PHP/corrosion/application/index/view/common/footer.html";i:1542023940;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <!--
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    -->
  <!-- <meta name="full-screen" content="yes" /> -->
  <!-- <meta name="x5-fullscreen" content="true" /> -->
  <!-- 是否启用 WebApp 全屏模式，删除苹果默认的工具栏和菜单栏 -->
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <title>国家材料环境腐蚀科学数据中心-<?php echo $currTitle; ?></title>
  <link rel="stylesheet" href="/static/vendor/layui/css/layui.css" media="all" />
  <link rel="stylesheet" href="/static/index/custom/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/static/index/custom/css/bootstrap-select.css" />
  <link rel="stylesheet" href="/static/index/custom/css/reset.css" />
  <link rel="stylesheet" href="/static/index/custom/css/p.css" />
  <link rel="stylesheet" href="/static/index/custom/css/acm.css" />
  <link rel="stylesheet" href="/static/vendor/layui/css/formSelects-v4.css" />
  <script src="/static/index/custom/js/jquery.min.js"></script>
  <script src="/static/vendor/layui/layui.js"></script>
  <style>
    footer {
        margin-top: 3%;
      }

      .data-center {
        width: 100%;
        margin-left: 0;
        margin-bottom: 2%;
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
      #tooltip {
        position: absolute;
        float: left;
        top: -300px;
        left: 200px;
        width: 250px;
        height: 160px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-shadow: 1px 1px 3px #ddd;
        padding: 10px 30px;
        background-color: #fff;
        display: flex;
        justify-content: center;
        flex-direction: column;
      }
      #tooltip p {
        margin: 0;
      }
      #tooltip .title {
        font-size: 18px;
        font-weight: bold;
        color: #0093d6;
      }
      #tooltip .status {
        font-size: 13px;
        font-weight: bold;
        margin-bottom: 3px;
      }
      #tooltip .status span {
        font-weight: normal;
        color: #00ff33;
      }
      #tooltip .location {
        margin-bottom: 3px;
        font-size: 12px;
      }
      #tooltip a {
        color: #fff;
        background: #0093d6;
        border-radius: 2px;
        display: inline-block;
        width: 100%;
        padding: 8px 0;
        text-align: center;
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
    <div class="navQuery">
      <div class="width-1200 pr">
        <div style="display: none" class="sc-fl left">
          <a href="#"><span>北京C2</span> </a>
          <a href=""> <span>青岛C4</span></a>
          <a href=""> <span>三亚C2</span></a>
          <a href=""> <span>吐鲁番C1</span></a>
          <a href=""> <span>杭州C2</span></a>
          <a href=""> <span>武汉C3</span></a>

          <!-- <a href="sssj_qd.html">  <span>青岛C4</span></a> -->
          <!-- <a href="sssj_sy.html">  <span>三亚C2</span></a> -->
          <!-- <a href="sssj_tlf.html">  <span>吐鲁番C1</span></a> -->
          <!-- <a href="sssj_hz.html">  <span>杭州C2</span></a> -->
          <!-- <a href="sssj_wh.html">  <span>武汉C3</span></a> -->
        </div>
        <div class="switch">
          <b></b>
          <p><a href="#">环境腐蚀性</a></p>
          <p><a href="<?php echo url('index/realtime/material'); ?>">材料腐蚀性</a></p>
        </div>
        <div class="sc-fr right">
          <p class="c-000" id="curTime"></p>
        </div>
      </div>
    </div>
    <div class="width-1200">
      <h4 class="jsh4">环境腐蚀性</h4>
      <div class="data-header clearfix">
        <div class="sc-fl left">
          <div class="top clearfix">
            <div class="sc-fl">
              <img src="/static/index/custom/images/a66.png" alt="" />
              <span id="device_location">--</span>
            </div>
            <!-- <div class="sc-fr">更换位置</div> -->
            <div class="clearfix"></div>
            <p id="device_test_location">---</p>
          </div>
          <div class="classify">
            <img src="/static/index/custom/images/a60.png" alt="" /><span>腐蚀等级</span><span id="corr_level">C2</span>
          </div>
          <div class="classify">
            <img src="/static/index/custom/images/a61.png" alt="" /><span>腐蚀速率</span><span id="corr_speed">0.05mm/a</span>
          </div>
          <div class="classify">
            <img src="/static/index/custom/images/a62.png" alt="" /><span>相对湿度</span><span id="device_h">--</span>
          </div>
          <div class="classify">
            <img src="/static/index/custom/images/a63.png" alt="" /><span>环境温度</span><span id="device_t">--</span>
          </div>
          <div class="classify">
            <img src="/static/index/custom/images/a64.png" alt="" /><span>PM2.5</span><span>30μg/m³</span>
          </div>
          <div class="classify">
            <img src="/static/index/custom/images/a65.png" alt="" /><span>SO2污染</span><span>4ppm</span>
          </div>
        </div>
        <div class="right sc-fl">
          <div class="right-top">
            <span style="padding-left:3%">地理位置</span>
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
          <div class="right-echarts clearfix">
            <div class="map-middle-box sc-fl">
              <div id="echartsmap"></div>
            </div>
            <div class="sc-fr binge">
              <div id="echarts10"></div>
              <div id="echarts11"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="data-center">
        <div class="chart-title clearfix">
          <img src="/static/index/custom/images/shang.png" alt="" />
          <span>24h瞬态腐蚀量-时间曲线</span>
          <select class="selectpicker" id="moment_chart" style=" float: right">
          </select>
        </div>
        <div id="echarts3" class="echarts-data-center"></div>
      </div>
      <div class="data-center">
        <div class="chart-title clearfix">
          <img src="/static/index/custom/images/shang.png" alt="" />
          <span>24h累计腐蚀量-时间曲线 </span>
          <select class="selectpicker" id="summary_chart" style=" float: right">
          </select>
        </div>
        <div id="echarts4" class="echarts-data-center"></div>
      </div>
      <div class="data-center">
        <div class="chart-title clearfix">
          <img src="/static/index/custom/images/shang.png" alt="" />
          <span>24h各监测点累计腐蚀量</span>
          <select class="selectpicker" id="every_chart" style=" float: right">
          </select>
        </div>
        <div id="echarts5" class="echarts-data-center"></div>
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
  <div id="tooltip">
    <p class="title">武汉测试</p>
    <p class="status">状态: <span>在线</span></p>
    <p class="location">地址：浙江省绍兴市越城区绍兴文理学院荷西校区是武装</p>
    <a href="/index/equip" target="_blank">进入设备</a>
  </div>
  <script src="/static/index/custom/js/bootstrap-select.min.js"></script>
  <script src="/static/index/custom/js/echarts.min.js"></script>
  <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts-gl/echarts-gl.min.js"></script>
  <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts-stat/ecStat.min.js"></script>
  <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/extension/dataTool.min.js"></script>
  <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/map/js/china.js"></script>
  <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/map/js/world.js"></script>
  <script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=ZUONbpqGBsYGXNIYHicvbAbM"></script>
  <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/extension/bmap.min.js"></script>
  <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/simplex.js"></script>

  <script src="/static/index/custom/js/p.js"></script>
  <script src="/static/index/custom/js/bootstrap.min.js"></script>
  <script src="/static/vendor/layui/formSelects-v4.js"></script>
  <script>
    let ROOT_PATH = "http://www.corrinfo.com";
    let EQUIP = []
    let DEVICE = []
    let TIMER = {}
    let TIP_X = 0
    let TIP_Y = 0
    var formSelects = layui.formSelects;
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

    $(function () {
      //获取时间
      setInterval(e => {
        $("#curTime").html(getCurTime());
      }, 1000)
      var mynav = $("nav li").find("a"); //寻找导航的a元素
      for (var i = 0; i < mynav.length; i++) {
        var links = mynav[i].getAttribute("href"); //取出每个链接的href属性的值
        var myurl = document.location.href; //取出当前窗口的链接
        if (myurl.indexOf(links) != -1) {
          //判断浏览器地址是否等于当前a元素的href属性
          $(mynav[i])
            .parent()
            .addClass("nav-hover");
        }
      }
      var arrcolor = [
        "#f55e5e",
        "#58cdb3",
        "#6697f7",
        "#ff934a",
        "#4eaded",
        "#3ac5d1"
      ];
      for (var i = 0; i < $(".classify").length; i++) {
        $(".classify")
          .eq(i)
          .css({
            background: arrcolor[i]
          });
      }
      $(".switch b").on("click", function () {
        $(this)
          .siblings("p")
          .toggle();
      });
    });

    $(document).ready(e => {
      get_equipment();
      $("#search").click(e => {
        let equip = formSelects.value("selectId", "valStr");
        let start = $("#startTime").val();
        let end = $("#endTime").val();
        if (!start) start = "";
        if (!end) end = "";

        if (start == "" || end == "") {
          alert("请选择完整起止时间！")
          return;
        }
        echartsMap(equip);
        let firstId = equip.split(',')[0]
        console.log(firstId)
        //更新左边信息
        device_info(firstId)
      });
    });

    // 初始化 画图
    function drawChart(id = "", start = "", end = "") {
      let firstId = id.split(',')[0]
      console.log(firstId)
      //更新左边信息
      device_info(firstId)
      //画地图
      echartsMap(firstId);
      //24h瞬态腐蚀量-时间曲线
      echarts3(id, start, end);
      //24h累计腐蚀量-时间曲线
      echarts4(id, start, end);
      //各监测点累计腐蚀量
      echarts5(id, start, end);

      //饼图始终显示全部
      //第一个饼图
      echarts10();
      //第二个饼图
      echarts11();

      //瞬态选择框变化时
      $("#moment_chart").change(e => {
        let id = $("#moment_chart").val()
        echarts3(id);
      })
      //累计选择框变化时
      $("#summary_chart").change(e => {
        let id = $("#summary_chart").val()
        echarts4(id);
      })
      //各监测点选择框变化时
      $("#every_chart").change(e => {
        let id = $("#every_chart").val()
        echarts5(id);
      })
    }

    function device_info(id) {
      $.ajax({
        url: ROOT_PATH + "/Api/Menu/device_info",
        method: "POST",
        data: {
          id: id
        },
        dataType: "json",
        success: res => {
          let val = ""
          console.log("device")
          console.log(res)
          let i1 = res.i1
          for (var i in res) {
            val = res[i] == "null" ? "无" : res[i]
            $("#device_" + i).html(val)
          }
        }
      })
    }

    function get_equipment() {
      $.ajax({
        url: ROOT_PATH + "/Api/Menu/get_equip",
        dataType: "json",
        success: res => {
          EQUIP = res
          getAllDeviceInfo();
          let selectDom = $("#equip");
          let momentSelect = $("#moment_chart")
          let summarySelect = $("#summary_chart")
          let everySelect = $("#every_chart")
          let optionHtml = "";
          for (var i = 0; i < res.length; i++) {
            optionHtml =
              "<option value='" +
              res[i].id +
              "'>" +
              res[i].name +
              "</option>";
            selectDom.append(optionHtml);
            momentSelect.append(optionHtml);
            summarySelect.append(optionHtml);
            everySelect.append(optionHtml);
          }
          formSelects.render("selectId");
          drawChart(res[0].id);
        }
      });
    }

    // 地图
    function echartsMap(id) {
      var myChart = echarts.init(document.getElementById("echartsmap"));
      let url = ROOT_PATH + "/Api/Menu/ditu_ajax";
      $.ajax({
        type: "POST",
        url: url,
        data: {
          id: id
        },
        dataType: "json",
        success: function (res2) {
          var data = res2.corrosion_addres;
          var geoCoordMap = res2.corrosion;

          var convertData = function (data) {
            var res = [];
            for (var i = 0; i < data.length; i++) {
              var geoCoord = geoCoordMap[data[i].name];
              if (geoCoord) {
                res.push({
                  name: data[i].name,
                  value: geoCoord
                });
              }
            }
            return res;
          };

          option = {
            title: {
              sublink: "http://www.pm25.in",
              left: "center"
            },
            tooltip: {
              trigger: "item",
              formatter: data => {
                showToolTip(data)
              }
            },
            bmap: {
              center: [104.114129, 37.550339],
              zoom: 5,
              roam: true,
              mapStyle: {
                styleJson: [{
                    featureType: "water",
                    elementType: "all",
                    stylers: {
                      color: "#d1d1d1"
                    }
                  },
                  {
                    featureType: "land",
                    elementType: "all",
                    stylers: {
                      color: "#f3f3f3"
                    }
                  },
                  {
                    featureType: "railway",
                    elementType: "all",
                    stylers: {
                      visibility: "off"
                    }
                  },
                  {
                    featureType: "highway",
                    elementType: "all",
                    stylers: {
                      color: "#fdfdfd"
                    }
                  },
                  {
                    featureType: "highway",
                    elementType: "labels",
                    stylers: {
                      visibility: "off"
                    }
                  },
                  {
                    featureType: "arterial",
                    elementType: "geometry",
                    stylers: {
                      color: "#fefefe"
                    }
                  },
                  {
                    featureType: "arterial",
                    elementType: "geometry.fill",
                    stylers: {
                      color: "#fefefe"
                    }
                  },
                  {
                    featureType: "poi",
                    elementType: "all",
                    stylers: {
                      visibility: "off"
                    }
                  },
                  {
                    featureType: "green",
                    elementType: "all",
                    stylers: {
                      visibility: "off"
                    }
                  },
                  {
                    featureType: "subway",
                    elementType: "all",
                    stylers: {
                      visibility: "off"
                    }
                  },
                  {
                    featureType: "manmade",
                    elementType: "all",
                    stylers: {
                      color: "#d1d1d1"
                    }
                  },
                  {
                    featureType: "local",
                    elementType: "all",
                    stylers: {
                      color: "#d1d1d1"
                    }
                  },
                  {
                    featureType: "arterial",
                    elementType: "labels",
                    stylers: {
                      visibility: "off"
                    }
                  },
                  {
                    featureType: "boundary",
                    elementType: "all",
                    stylers: {
                      color: "#fefefe"
                    }
                  },
                  {
                    featureType: "building",
                    elementType: "all",
                    stylers: {
                      color: "#d1d1d1"
                    }
                  },
                  {
                    featureType: "label",
                    elementType: "labels.text.fill",
                    stylers: {
                      color: "#999999"
                    }
                  }
                ]
              }
            },
            series: [{
                name: "",
                type: "scatter",
                coordinateSystem: "bmap",
                data: convertData(data),
                symbolSize: function (val) {
                  return 8;
                },
                label: {
                  normal: {
                    formatter: "{b}",
                    position: "right",
                    show: false
                  },
                  emphasis: {
                    show: true
                  }
                },
                itemStyle: {
                  normal: {
                    color: "purple"
                  }
                }
              },
              {
                name: 'Top 5',
                type: 'effectScatter',
                coordinateSystem: 'bmap',
                data: convertData(data.sort(function (a, b) {
                  return b.value - a.value;
                }).slice(0, 10)),
                symbolSize: function (val) {
                  // 2  12  19
                  if (val[2] < 10) return 2;
                  else if (val[2] >= 10 && val[2] < 100)
                    return 10
                  else
                    return 18
                },
                showEffectOn: 'render',
                rippleEffect: {
                  brushType: 'stroke'
                },
                hoverAnimation: true,
                label: {
                  normal: {
                    formatter: '{b}',
                    position: 'right',
                    show: true
                  }
                },
                itemStyle: {
                  normal: {
                    color: 'purple',
                    shadowBlur: 10,
                    shadowColor: '#333'
                  }
                },
                zlevel: 1
              }
            ]
          };

          myChart.setOption(option);
        }
      });
    }

    //第一个统计图
    function echarts3(array_id, start_time, end_time) {
      var myChart = echarts.init(document.getElementById("echarts3"));
      $.ajax({
        type: "POST",
        url: ROOT_PATH + "/Api/Menu/moment_time_h",
        data: {
          array_id: array_id,
          start_time: start_time,
          end_time: end_time
        },
        dataType: "json",
        success: function (data) {
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
            yAxis: [{
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
        error: function () {
          //alert("error2");
        }
      });
    }

    //中间统计图 24h累计腐蚀量-时间曲线
    function echarts4(array_id, start_time, end_time) {
      $.ajax({
        type: "POST",
        url: ROOT_PATH + "/Api/Menu/cumulative_time_h",
        data: {
          array_id: array_id,
          start_time: start_time,
          end_time: end_time
        },
        dataType: "json",
        success: function (data) {
          myChart2 = echarts.init(document.getElementById("echarts4"));
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
            yAxis: {
              type: "value",
              axisLabel: {
                formatter: "{value} "
              }
            },
            series: data.array_array
          };

          myChart2.setOption(option);
          //累计腐蚀量时间曲线
        },
        error: function () {
          //alert("error3");
        }
      });
    }

    var myChart5;
    //最下面 24h各监测点累计腐蚀量
    function echarts5(array_id, start_time, end_time) {
      if (myChart5 != null && myChart5 != "" && myChart5 != undefined) {
        myChart5.dispose();
      }
      $.ajax({
        type: "POST",
        url: "http://www.corrinfo.com/Api/Menu/change_time_h_h",
        data: {
          array_id: array_id,
          start_time: start_time,
          end_time: end_time
        },
        dataType: "json",
        success: function (data) {
          var dom = document.getElementById("echarts5");
          myChart5 = echarts.init(dom);
          var app = {};
          option = null;
          var posList = [
            "left",
            "right",
            "top",
            "bottom",
            "inside",
            "insideTop",
            "insideLeft",
            "insideRight",
            "insideBottom",
            "insideTopLeft",
            "insideTopRight",
            "insideBottomLeft",
            "insideBottomRight"
          ];

          app.configParameters = {
            rotate: {
              min: -90,
              max: 90
            },
            align: {
              options: {
                left: "left",
                center: "center",
                right: "right"
              }
            },
            verticalAlign: {
              options: {
                top: "top",
                middle: "middle",
                bottom: "bottom"
              }
            },
            position: {
              options: echarts.util.reduce(
                posList,
                function (map, pos) {
                  map[pos] = pos;
                  return map;
                }, {}
              )
            },
            distance: {
              min: 0,
              max: 100
            }
          };

          app.config = {
            rotate: 90,
            align: "left",
            verticalAlign: "middle",
            position: "insideBottom",
            distance: 15,
            onChange: function () {
              var labelOption = {
                normal: {
                  rotate: app.config.rotate,
                  align: app.config.align,
                  verticalAlign: app.config.verticalAlign,
                  position: app.config.position,
                  distance: app.config.distance
                }
              };
              myChart5.setOption({
                series: [{
                    label: labelOption
                  },
                  {
                    label: labelOption
                  },
                  {
                    label: labelOption
                  },
                  {
                    label: labelOption
                  }
                ]
              });
            }
          };

          var labelOption = {
            normal: {
              show: true,
              position: app.config.position,
              distance: app.config.distance,
              align: app.config.align,
              verticalAlign: app.config.verticalAlign,
              rotate: app.config.rotate,
              formatter: "{c}  {name|{a}}",
              fontSize: 16,
              rich: {
                name: {
                  textBorderColor: "#fff"
                }
              }
            }
          };

          option = {
            color: ["#003366", "#006699", "#4cabce", "#e5323e"],
            tooltip: {
              trigger: "axis",
              axisPointer: {
                type: "shadow"
              }
            },
            legend: {
              data: ["通道1", "通道2", "通道3", "通道4"]
            },
            toolbox: {
              show: true,
              orient: "vertical",
              left: "right",
              top: "top",
              feature: {
                saveAsImage: {
                  show: true
                }
              }
            },
            calculable: true,
            xAxis: [{
              type: "category",
              axisTick: {
                show: false
              },
              data: data.equipment_array
            }],
            yAxis: [{
              type: "value"
            }],
            //series: data.array_array
            series: [{
                name: "通道I1",
                type: "bar",
                label: labelOption,
                data: data.array_array.dian1.data
              },
              {
                name: "通道I2",
                type: "bar",
                label: labelOption,
                data: data.array_array.dian2.data
              },
              {
                name: "通道I3",
                type: "bar",
                label: labelOption,
                data: data.array_array.dian3.data
              },
              {
                name: "通道I4",
                type: "bar",
                label: labelOption,
                data: data.array_array.dian4.data
              }
            ]
          };
          if (option && typeof option === "object") {
            myChart5.setOption(option, true);
          }
        },
        error: function () {
          alert("error5");
        }
      });
    }

    var myChart1;
    //第一个饼图
    function echarts10(array_id = "", start_time = "", end_time = "") {
      if (myChart1 != null && myChart1 != "" && myChart1 != undefined) {
        myChart1.dispose();
      }

      $.ajax({
        type: "POST",
        url: "http://www.corrinfo.com/Api/Menu/pie_chart_jun",
        data: {
          array_id: array_id,
          start_time: start_time,
          end_time: end_time
        },
        dataType: "json",
        success: function (m_data) {
          console.log(m_data);

          var myChart1 = echarts.init(document.getElementById("echarts10"));
          option = {
            title: {
              text: "腐蚀情况统计-平均腐蚀量",
              left: "center"
            },
            tooltip: {
              trigger: "item",
              formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
              // orient: 'vertical',
              // top: 'middle',
              bottom: 10,
              left: "center",
              data: m_data.name
            },
            series: [{
              type: "pie",
              radius: "60%",
              center: ["50%", "50%"],
              selectedMode: "single",
              data: m_data.array_array,
              itemStyle: {
                emphasis: {
                  shadowBlur: 10,
                  shadowOffsetX: 0,
                  shadowColor: "rgba(0, 0, 0, 0.5)"
                }
              }
            }]
          };
          myChart1.setOption(option);
        },
        error: function () {
          alert("error5");
        }
      });
    }

    //腐蚀情况统计—累计腐蚀量
    var myChart2;
    //第二个饼图
    function echarts11(array_id = "", start_time = "", end_time = "") {
      if (myChart2 != null && myChart2 != "" && myChart2 != undefined) {
        myChart2.dispose();
      }
      $.ajax({
        type: "POST",
        url: "http://www.corrinfo.com/Api/Menu/pie_chart_jun",
        data: {
          array_id: array_id,
          start_time: start_time,
          end_time: end_time
        },
        dataType: "json",
        success: function (m_data) {
          myChart2 = echarts.init(document.getElementById("echarts11"));
          var weatherIcons = {
            Sunny: "./data/asset/img/weather/sunny_128.png",
            Cloudy: "./data/asset/img/weather/cloudy_128.png",
            Showers: "./data/asset/img/weather/showers_128.png"
          };

          option = {
            title: {
              text: "腐蚀情况统计—累计腐蚀量",
              left: "center"
            },
            tooltip: {
              trigger: "item",
              formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
              // orient: 'vertical',
              // top: 'middle',
              bottom: 10,
              left: "center",
              data: m_data.name
            },
            series: [{
              type: "pie",
              radius: "65%",
              center: ["50%", "50%"],
              selectedMode: "single",
              data: m_data.array_array,
              itemStyle: {
                emphasis: {
                  shadowBlur: 10,
                  shadowOffsetX: 0,
                  shadowColor: "rgba(0, 0, 0, 0.5)"
                }
              }
            }]
          };
          myChart2.setOption(option);
        },
        error: function () {
          alert("error5");
        }
      });
    }

    function getCurTime() {
      var date = new Date();
      var sign1 = "-";
      var sign2 = ":";
      var year = date.getFullYear(); // 年
      var month = date.getMonth() + 1; // 月
      var day = date.getDate(); // 日
      var hour = date.getHours(); // 时
      var minutes = date.getMinutes(); // 分
      var seconds = date.getSeconds(); //秒
      var weekArr = [
        "星期一",
        "星期二",
        "星期三",
        "星期四",
        "星期五",
        "星期六",
        "星期天"
      ];
      var week = weekArr[date.getDay()];
      // 给一位数数据前面加 “0”
      if (month >= 1 && month <= 9) {
        month = "0" + month;
      }
      if (day >= 0 && day <= 9) {
        day = "0" + day;
      }
      if (hour >= 0 && hour <= 9) {
        hour = "0" + hour;
      }
      if (minutes >= 0 && minutes <= 9) {
        minutes = "0" + minutes;
      }
      if (seconds >= 0 && seconds <= 9) {
        seconds = "0" + seconds;
      }
      var currentdate =
        year +
        sign1 +
        month +
        sign1 +
        day +
        " " +
        hour +
        sign2 +
        minutes +
        sign2 +
        seconds +
        " " +
        week;
      return currentdate;
    }

    function getAllDeviceInfo() {
      for (var i = 0; i < EQUIP.length; i++) {
        (i => {
          DEVICE[i] = {}
          $.ajax({
            url: ROOT_PATH + "/Api/Menu/device_info",
            method: "POST",
            data: {
              id: EQUIP[i].id
            },
            dataType: "json",
            success: res => {
              let item = EQUIP[i]
              item.info = res
              DEVICE[i] = item
            }
          })
        })(i)
      }
    }

    function showToolTip(data) {
      let equipName = data.name
      let row = {}
      for (var i = 0; i < DEVICE.length; i++) {
        if (DEVICE[i].name == equipName) {
          row = DEVICE[i]
          break;
        }
      }
      $("#tooltip .title").html(row.name)
      $("#tooltip .location").html("地址：" + row.info.test_location)
      localStorage.setItem("corro_equip_row", JSON.stringify(row))
      $("#tooltip").css({
        'top': TIP_Y + 10,
        'left': TIP_X + 10
      })

      $("#tooltip").fadeIn(100)
      clearTimeout(TIMER)
      TIMER = setTimeout(e => {
        $("#tooltip").fadeOut()
      }, 700)
      $("#tooltip")
      $("#tooltip").unbind("mouseleave").mouseleave(e => {
        $("#tooltip").fadeOut()
      })
      $("#tooltip").unbind("mouseover").mouseover(e => {
        $("#tooltip").show()
        clearTimeout(TIMER)
      })
    }

    document.onmousemove = function (event) {
      moveMouse(event);
    }

    function moveMouse(event) {
      event = event || window.event;
      var scrollX = document.documentElement.scrollLeft || document.body.scrollLeft;
      var scrollY = document.documentElement.scrollTop || document.body.scrollTop;
      TIP_X = event.pageX || event.clientX + scrollX
      TIP_Y = event.pageY || event.clientY + scrollY
    }
  </script>
</body>

</html>