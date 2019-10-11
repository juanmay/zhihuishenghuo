<?php /*a:1:{s:51:"E:\www\jinma\application\admin\view\total\bing.html";i:1559643682;}*/ ?>
	<style type="text/css">
		.container{
			width: 47.15%;
			height: 400px;
			margin-top: 10px;
			/*border: 1px solid #CCC;*/
		}
	</style>
	<div style="width:100%;height:auto;display:flex;justify-content:space-around;">
	<div id="payMoney" class="container"></div>
	<div id="bonusMoney" class="container"></div>
	</div>
	<script src="https://code.highcharts.com.cn/highcharts/highcharts.js"></script>
	<script src="https://code.highcharts.com.cn/highcharts/modules/exporting.js"></script>
	<script src="https://img.hcharts.cn/highcharts-plugins/highcharts-zh_CN.js"></script>
	<script>
		Highcharts.chart('bonusMoney', {
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false,
				type: 'pie'
			},
			title: {
				text: '收益占比'
			},
			tooltip: {
				pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					dataLabels: {
						enabled: true,
						format: '<b>{point.name}</b>: {point.percentage:.1f} %',
						style: {
							color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
						}
					}
				}
			},
			credits: {
        		enabled: false
    		},
    		exporting: {
				enabled: false
			},
			series: [{
				name: 'Brands',
				colorByPoint: true,
				data: [{
					name: '用户累计收益总额',
					y: <?php echo htmlentities($data['total']['bonusMoney']/($data['total']['sysMoney']+$data['total']['bonusMoney'])*100); ?>,
					sliced: true,
					selected: true
				}, {
					name: '平台收益总额（含渠道）',
					y: <?php echo htmlentities($data['total']['sysMoney']/($data['total']['sysMoney']+$data['total']['bonusMoney'])*100); ?>,
				}, ]
			}]
		});
		Highcharts.chart('payMoney', {
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false,
				type: 'pie'
			},
			title: {
				text: '支付占比'
			},
			tooltip: {
				pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					dataLabels: {
						enabled: true,
						format: '<b>{point.name}</b>: {point.percentage:.1f} %',
						style: {
							color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
						}
					}
				}
			},
			credits: {
        		enabled: false
    		},
			series: [{
				name: 'Brands',
				colorByPoint: true,
				data: [{
					name: '用户累计支付手续费',
					y: <?php echo htmlentities($data['total']['feeMoney']/($data['total']['feeMoney']+$data['total']['useMoney'])*100); ?>,
					sliced: true,
					selected: true
				}, {
					name: '用户累计支付升级费',
					y: <?php echo htmlentities($data['total']['useMoney']/($data['total']['feeMoney']+$data['total']['useMoney'])*100); ?>,
				}, ]
			}],
			exporting: {
				enabled: false
			},
		});
	</script>