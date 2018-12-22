var myChart = echarts.init(document.getElementById("echarts-container1"));
option = {
    title: {
        text: '腐蚀量',
        left: 'center'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        // data:[]
    },
    grid: {
        left: '10%',
        right: '10%',
        bottom: '3%',
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
        data: ['周一', '周二', '周三', '周四', '周五', '周六', '周日']
    },
    yAxis: {
        type: 'value'
    },
    series: [

        {
            name: '视频广告',
            type: 'line',
            stack: '总量',
            itemStyle: {
                normal: {
                    color: '#b78847',
                    borderColor: '#b78847', //拐点边框颜色  
                }
            },
            data: [0, 200, 140, 198, 300, 600]
        },
        {
            name: '直接访问',
            type: 'line',
            stack: '总量',
            itemStyle: {
                normal: {
                    color: '#607f8d',
                    borderColor: '#607f8d', //拐点边框颜色  
                }
            },
            data: [220, 0, 210, 410, 200, 500]
        }
    ]
};
myChart.setOption(option);

var myChart3 = echarts.init(document.getElementById("echarts-container3"));
option = {
    title: {
        text: '电压曲线',
        left: 'center'
    },
    tooltip: {
        trigger: 'axis'
    },

    grid: {
        left: '10%',
        right: '10%',
        bottom: '12%',
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
        data: ['周一', '周二', '周三', '周四', '周五', '周六', '周日']
    },
    yAxis: {
        type: 'value'

    },
    series: [{
            name: 'one',
            type: 'line',
            stack: '总量',
            itemStyle: {
                normal: {
                    color: '#298aac',
                    borderColor: '#1f81a3', //拐点边框颜色  
                }
            },
            data: [, 0, 1000, 300, 0]
        },
        {
            name: 'two',
            type: 'line',
            stack: '总量',
            itemStyle: {
                normal: {
                    color: '#2f7e68',
                    borderColor: '#2a745f', //拐点边框颜色  
                }
            },
            data: [, , 0, 1500, 2000, 500, 0]
        },
        {
            name: 'three',
            type: 'line',
            stack: '总量',
            itemStyle: {
                normal: {
                    color: '#2f5f84',
                    borderColor: '#2a5779', //拐点边框颜色  
                }
            },
            data: [320, 332, 301, 334, 390, 330, 320]
        },
        {
            name: 'four',
            type: 'line',
            stack: '总量',
            itemStyle: {
                normal: {
                    color: '#99b088',
                    borderColor: '#92a782', //拐点边框颜色  
                }
            },
            data: [820, 932, 901, 934, 1290, 1330, 1320]
        }
    ],
    legend: {
        x: 'center',
        y: 'bottom',
        data: ['one', 'two', 'three', 'four']
    }
};
myChart3.setOption(option);


var myChart2 = echarts.init(document.getElementById("echarts-container2"));
option = {
    title: {
        text: '温湿度曲线',
        left: 'center'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {

    },
    toolbox: {
        show: true,
        feature: {
            dataZoom: {
                yAxisIndex: 'none'
            },
            dataView: { readOnly: false },
            magicType: { type: ['line', 'bar'] },
            restore: {},
            saveAsImage: {}
        }
    },
    xAxis: {
        type: 'category',
        boundaryGap: false,
        data: ['周一', '周二', '周三', '周四', '周五', '周六', '周日']
    },
    yAxis: {
        type: 'value',
        axisLabel: {
            formatter: '{value} °C'
        }
    },
    series: [{
            name: '最高气温',
            type: 'line',
            itemStyle: {
                normal: {
                    color: '#2dc8cb',
                    borderColor: '#2dc8cb', //拐点边框颜色  
                }
            },
            data: [11, 11, 15, 13, 12, 13, 10],
            markPoint: {
                data: [
                    { type: 'max', name: '最大值' },
                    { type: 'min', name: '最小值' }
                ]
            },
            markLine: {
                data: [
                    { type: 'average', name: '平均值' }
                ]
            }
        },
        {
            name: '最低气温',
            type: 'line',
            itemStyle: {
                normal: {
                    color: '#b6a1e1',
                    borderColor: '#b6a1e1', //拐点边框颜色  
                }
            },
            data: [1, -2, 2, 5, 3, 2, 0],
            markPoint: {
                data: [
                    { name: '周最低', value: -2, xAxis: 1, yAxis: -1.5 }
                ]
            },
            markLine: {
                data: [
                    { type: 'average', name: '平均值' },
                    [{
                        symbol: 'none',
                        x: '90%',
                        yAxis: 'max'
                    }, {
                        symbol: 'circle',
                        label: {
                            normal: {
                                position: 'start',
                                formatter: '最大值'
                            }
                        },
                        type: 'max',
                        name: '最高点'
                    }]
                ]
            }
        }
    ]
};

myChart2.setOption(option);