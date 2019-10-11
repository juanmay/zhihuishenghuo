option = [{
    title: {
        text: '活跃量情况'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['活跃量']
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
            name:'活跃量',
            type:'line',
            stack: '总量',
            data:userLineAll
        }
    ]
},{
	title: {
        text: '活跃量情况'
    },
    legend: {
        data:['活跃量']
    },
    xAxis: {
        type: 'category',
        data: timeX2
    },
    yAxis: {
        type: 'value'
    },
    series: [{
    	 name:'活跃量',
        data: userLineAll2,
        type: 'bar'
    }]
}
];

for (var i=0;i<2;i++){
  //$("#speedChartMain"+i).height(height+'px');
  var dom = document.getElementById("speedChartMain"+i);
  var myChart = echarts.init(dom);

  myChart.setOption(option[i]);
}
