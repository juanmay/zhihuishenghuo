option = [{
    title: {
        text: '还款渠道统计'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:repaymentName
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
    series: repaymentAll
},{
  title : {
      text: '还款渠道统计',
      x:'center'
  },
    tooltip: {
        trigger: 'item',
        formatter: "{a} <br/>{b}: {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        x: 'left',
        data:repaymentName
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
            data:repaymentSource
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
