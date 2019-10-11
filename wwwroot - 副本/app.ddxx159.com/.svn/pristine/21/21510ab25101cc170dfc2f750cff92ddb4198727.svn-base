option = [{
    title: {
        text: '注册认证情况'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['认证量','未认证量']
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    xAxis: {
        type: 'category',
        boundaryGap: false,
        data: timeX
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'认证量',
            type:'line',
            stack: '总量',
            data:userLineAll1
        },
        {
            name:'未认证量',
            type:'line',
            stack: '总量',
            data:userLineAll2
        }
    ]
},{
  title : {
      text: '注册认证情况',
      //left: 'center'
      x:'center'
  },
    tooltip: {
        trigger: 'item',
        formatter: "{a} <br/>{b}: {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        x: 'left',
        data:['认证量','未认证量']
    },
    series: [
        {
            name:'访问来源',
            type:'pie',
            radius: ['50%', '70%'],
            avoidLabelOverlap: false,
            label: {
                normal: {
                    show: false,
                    position: 'center'
                },
                emphasis: {
                    show: true,
                    textStyle: {
                        fontSize: '30',
                        fontWeight: 'bold'
                    }
                }
            },
            labelLine: {
                normal: {
                    show: false
                }
            },
            data:userSource
        }
    ]
}
];

for (var i=0;i<2;i++){
  //$("#speedChartMain"+i).height(height+'px');
  var dom = document.getElementById("speedChartMain"+i);
  var myChart = echarts.init(dom);

  myChart.setOption(option[i]);
}
