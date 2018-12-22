var myChart = echarts.init(document.getElementById("echarts-container4"));


option = {
    color: ['#3398DB'],
    tooltip: {
        trigger: 'axis',
        axisPointer: { // 坐标轴指示器，坐标轴触发有效
            type: 'shadow' // 默认为直线，可选为：'line' | 'shadow'
        }
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    xAxis: [{
        type: 'category',
        data: ['北京', '上海', '广州', '济南', '天津', '武汉', '南京', '云南'],

        axisTick: {
            alignWithLabel: true
        }
    }],
    yAxis: [{
        type: 'value'
    }],
    series: [{
        name: '直接访问',
        type: 'bar',
        barWidth: '60%',
        data: [10, 52, 200, 334, 390, 330, 220, 50],
        itemStyle: {
            normal: {
                color: function(params) {
                    var colorList = ['#fb754a', '#fb754a', '#0f8cd3'];
                    return colorList[params.dataIndex];
                }
            }
        }
    }]
};
myChart.setOption(option);

var myChart5 = echarts.init(document.getElementById("echarts-container5"));
// option = {
//     xAxis: {
//         type: 'category',
//         data: ['2010', '2012', '2012', '2014', '2016', '2018', '2020'],
//         axisLine: {
//             onZero: false,
//             lineStyle: {
//                 color: '#506eba',
//                 width: 2,
//             }

//         },
//     },
//     yAxis: {
//         type: 'value',
//         axisLine: {
//             onZero: false,
//             lineStyle: {
//                 color: '#506eba',
//                 width: 2,
//             }
//         },
//     },
//     series: [{
//         data: [820, 932, 901, 934, 1290, 1330, 1320],
//         type: 'line',
//         smooth: true
//     }]
// };

option = {
    tooltip: {
        trigger: 'axis'
    },

    grid: {
        left: '3%',
        right: '3%',
        bottom: '5%',
        containLabel: true
    },
    toolbox: {
        feature: {
            saveAsImage: {}
        }
    },
    xAxis: {
        type: 'category',
        boundaryGap: false,
        data: ['0', '10', '20', '30', '40', '50', '60', '70', '80', '90', '100'],
        axisLine: {
            onZero: false,
            lineStyle: {
                color: '#506eba',
                width: 2,
            }

        },
    },
    yAxis: {
        type: 'value',
        axisLine: {
            onZero: false,
            lineStyle: {
                color: '#506eba',
                width: 2,
            }
        },
    },
    series: [{
            name: 'one',
            type: 'line',
            smooth: true,
            stack: '总量',
            itemStyle: {
                normal: {
                    color: '#c74942',
                    borderColor: '#c74942', //拐点边框颜色  
                }
            },
            data: ['0', '310', '320', '330', '340', '600', '320', '300', '310', '320', '350']
        },
        {
            name: 'two',
            type: 'line',
            smooth: true,
            stack: '总量',
            itemStyle: {
                normal: {
                    color: '#7ab548',
                    borderColor: '#7ab548', //拐点边框颜色  
                }
            },
            data: ['0', '10', '20', '220', '40', '200', '60', '260', '80', '90', '100']
        },
        {
            name: 'three',
            type: 'line',
            smooth: true,
            stack: '总量',
            itemStyle: {
                normal: {
                    color: '#e7bb43',
                    borderColor: '#e7bb43', //拐点边框颜色  
                }
            },
            data: ['500', '10', '200', '30', '100', '60', '460', '70', '160', '90', '0']
        },
        {
            name: 'four',
            type: 'line',
            stack: '总量',
            smooth: true,
            itemStyle: {
                normal: {
                    color: '#6b90ee',
                    borderColor: '#6b90ee', //拐点边框颜色  
                }
            },
            data: ['0', '10', '20', '30', '40', '50', '500', '70', '80', '90', '100']
        }
    ]
};
myChart5.setOption(option);

var myChart6 = echarts.init(document.getElementById("echarts-container6"));

function randomData() {
    return Math.round(Math.random() * 1000);
}
$.post("areas",{},function(data){
    console.log(data);
})
option = {

    tooltip: {

    },
    legend: {
        orient: 'vertical',
        left: 'left',
    },
    visualMap: {
        min: 0,
        max: 2500,
        calculable: true,
        color: ['#78a3c6', '#f4f8fb']
    },
    series: [{
        name: '设备',
        type: 'map',
        mapType: 'china',
        roam: false,
        label: {
            normal: {
                show: false
            },
            emphasis: {
                show: true
            }
        },
        itemStyle: {
            normal: {
                color: '#6b90ee',
                borderColor: '#6b90ee', //拐点边框颜色  
            }
        },
        data: {[{
                        name: '南海诸岛',
                        value: 0,
                        itemStyle: {
                            normal: { opacity: 0, label: { show: false } }
                        }
                    },
                    { name: '北京', value: randomData() },
                    { name: '天津', value: randomData() },
                    { name: '上海', value: randomData() },
                    { name: '重庆', value: randomData() },
                    { name: '河北', value: randomData() },
                    { name: '河南', value: randomData() },
                    { name: '云南', value: randomData() },
                    { name: '辽宁', value: randomData() },
                    { name: '黑龙江', value: 200 },
                    { name: '湖南', value: 0 },
                    { name: '安徽', value: randomData() },
                    { name: '山东', value: randomData() },
                    { name: '新疆', value: 500 },
                    { name: '江苏', value: randomData() },
                    { name: '浙江', value: randomData() },
                    { name: '江西', value: randomData() },
                    { name: '湖北', value: randomData() },
                    { name: '广西', value: randomData() },
                    { name: '甘肃', value: randomData() },
                    { name: '山西', value: randomData() },
                    { name: '内蒙古', value: randomData() },
                    { name: '陕西', value: randomData() },
                    { name: '吉林', value: randomData() },
                    { name: '福建', value: randomData() },
                    { name: '贵州', value: randomData() },
                    { name: '广东', value: randomData() },
                    { name: '青海', value: 1500 },
                    { name: '西藏', value: 2000 },
                    { name: '四川', value: 2300 },
                    { name: '宁夏', value: randomData() },
                    { name: '海南', value: randomData() },
                    { name: '台湾', value: randomData() },
                    { name: '香港', value: randomData() },
                    { name: '澳门', value: randomData() }
                ]}
    }]
};

myChart6.setOption(option);