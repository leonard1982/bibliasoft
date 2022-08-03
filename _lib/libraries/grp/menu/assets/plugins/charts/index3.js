( function ( $ ) {
	"use strict";

	/*-----echart-----*/
	var chartdata3 = [
		{
			name: 'Project Budget',
			type: 'line',
			smooth:true,
			data: [7635, 5465, 6754, 5432, 5435, 6545, 4453, 3425, 7654, 3245, 4532, 5643],
			lineStyle:{  
				normal:{  
					opacity:0.8,
					width:4,
					curveness:1
				}
			}
		},
		{
			name: 'Expenses',
			type: 'line',
			smooth:true,
			data: [ 5435, 3452, 5432, 3452, 2564, 3456, 3123, 2435, 5463, 1245, 3245, 4534,],
			lineStyle:{  
				normal:{  
					opacity:0.8,
					width:4,
					curveness:1
				}
			}
		}
	];

	var option5 = {
		grid: {
			top: '6',
			right: '0',
			bottom: '17',
			left: '35',
		},
		tooltip: {
			show: true,
			showContent: true,
			alwaysShowContent: true,
			triggerOn: 'mousemove',
			trigger: 'axis',
			axisPointer:
			{
				label: {
					show: false,
				}
			}

		},
		xAxis: {
			data: ['Ene','Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
			axisLine: {
				lineStyle: {
					color: 'rgba(67, 87, 133, .09)'
				}
			},
			axisLabel: {
				fontSize: 10,
				color: '#8e9cad'
			}
		},
		yAxis: {
			splitLine: {
				lineStyle: {
					color: 'rgba(67, 87, 133, .09)'
				}
			},
			axisLine: {
				lineStyle: {
					color: 'rgba(67, 87, 133, .09)'
				}
			},
			axisLabel: {
				fontSize: 10,
				color: '#8e9cad'
			}
		},
		series: chartdata3,
		color:[ '#4454c3', '#f72d66']
	};
	//var chart5 = document.getElementById('echart1');
	//var barChart5 = echarts.init(chart5);
	//barChart5.setOption(option5);

	/*-----canvasDoughnut-----*/
	if ($('.canvasDoughnut').length){

		var chart_doughnut_settings = {
			type: 'doughnut',
			tooltipFillColor: "rgba(51, 51, 51, 0.55)",
			data: {
				labels: [
					"Completed",
					"Running",
					"Pending",
				],
				datasets: [{
					data: [68, 55, 45],
					backgroundColor: [
						"#2dce89",
						"#4454c3",
						"#f72d66"
					],
					borderColor: [
						"#2dce89",
						"#4454c3",
						"#f72d66"
					]
				}]
			},
			options: {
				legend: false,
				responsive: false,
				cutoutPercentage: 70,
				segmentShowStroke: false
			},
			elements:{
				line:{
					borderWidth:1
				}
			}
		}

		$('.canvasDoughnut').each(function(){

			var chart_element = $(this);
			var chart_doughnut = new Chart( chart_element, chart_doughnut_settings);

		});
	}
	/*-----canvasDoughnut-----*/

	/*----P-scrolling JS ----
	const ps32 = new PerfectScrollbar('#scrollbar', {
	  useBothWheelAxes:true,
	  suppressScrollX:true,
	});
	/*-----P-scrolling JS -----

	/*----P-scrolling JS ----
	const ps33 = new PerfectScrollbar('#scrollbar2', {
	  useBothWheelAxes:true,
	  suppressScrollX:true,
	});
	/-----P-scrolling JS -----*/
	var myVarVal = '#4454c3';
	function canvasDoughnut3() {

		document.querySelector("#canvasDoughnut3.chart-container").innerHTML = '<canvas class="canvasDoughnut3" height="200" width="200"></canvas>';
		if ($('.canvasDoughnut3').length){

			var chart_doughnut_settings = {
				type: 'doughnut',
				tooltipFillColor: "rgba(51, 51, 51, 0.55)",
				data: {
					labels: [
						"Application",
						"Shortlisted",
						"Rejected",
						"On Hold",
						"Finalised"
					],
					datasets: [{
						data: [68, 55, 45, 34, 27],
						backgroundColor: [ myVarVal, '#f72d66','#2dce89', '#45aaf2','#ecb403','#ff5b51'],
						hoverBackgroundColor: [ myVarVal, '#f72d66','#2dce89', '#45aaf2','#ecb403','#ff5b51']
					}]
				},
				options: {
					legend: {
						display: false,
					},
					cutout: "70%",
					responsive: true,
				},
			}

			$('.canvasDoughnut3').each(function(){

				var chart_element = $(this);
				var chart_doughnut = new Chart( chart_element, chart_doughnut_settings);

			});
		}
		/*-----canvasDoughnut-----*/
	}

	function projectTracked() {

		var chartdata3 = [
			{
				name: 'Project In',
				type: 'bar',
				stack: 'Stack',
				barMaxWidth: 18,
				data: [1453, 3425, 7654, 3245, 4532, 5643, 7635, 5465, 6754, 5432, 5435, 6545],
				itemStyle: {
					normal: {
						barBorderRadius: [0] ,
					}
				}
			},
			{
				name: 'Project take',
				type: 'bar',
				stack: 'Stack',
				barMaxWidth:18,
				data: [1123, 2435, 5463, 1245, 3245, 4534, 5435, 3452, 5432, 3452, 2564, 3456 ],
				itemStyle: {
					normal: {
						barBorderRadius: [0] ,
					}
				}
			},
			{
				name: 'On Hold',
				type: 'bar',
				stack: 'Stack',
				barMaxWidth:18,
				data: [330, 990, 2191, 2000, 1287, 1109, 2013, 1322, 1980, 2971, 3089, 1234],
				itemStyle: {
					normal: {
						barBorderRadius: [50, 50, 0, 0] ,
					}
				}
			}
		];

		var option5 = {
			grid: {
				top: '6',
				right: '0',
				bottom: '17',
				left: '40',
			},
			tooltip: {
				show: true,
				showContent: true,
				alwaysShowContent: true,
				triggerOn: 'mousemove',
				trigger: 'axis',
				axisPointer:
				{
					label: {
						show: false,
					}
				}

			},
			xAxis: {
				data: ['Ene','Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
				axisLine: {
					lineStyle: {
						color: 'rgba(67, 87, 133, .09)'
					}
				},
				axisLabel: {
					fontSize: 10,
					color: '#8e9cad'
				}
			},
			yAxis: {
				splitLine: {
					lineStyle: {
						color: 'rgba(67, 87, 133, .09)'
					}
				},
				axisLine: {
					lineStyle: {
						color: 'rgba(67, 87, 133, .09)'
					}
				},
				axisLabel: {
					fontSize: 10,
					color: '#8e9cad'
				}
			},
			series: chartdata3,
			color:[ myVarVal, '#f72d66','#cedbfd']
		};
		var chart5 = document.getElementById('projectTracked');
		var barChart5 = echarts.init(chart5);
		barChart5.setOption(option5);
		window.addEventListener('resize',function(){
			barChart5.resize();
		})

	}



	function projectInvestment() {

		var chartdata3 = [
			{
				name: 'Ventas',
				type: 'line',
				smooth:true,
				data: [7635, 5465, 6754, 5432, 5435, 6545, 4453, 3425, 7654, 3245, 4532, 5643],
				lineStyle:{  
					normal:{  
						opacity:0.8,
						width:4,
						curveness:1
					}
				}
			},
			{
				name: 'Compras',
				type: 'line',
				smooth:true,
				data: [ 5435, 3452, 5432, 3452, 2564, 3456, 3123, 2435, 5463, 1245, 3245, 4534,],
				lineStyle:{  
					normal:{  
						opacity:0.8,
						width:4,
						curveness:1
					}
				}
			}
		];

		var option5 = {
			grid: {
				top: '6',
				right: '0',
				bottom: '17',
				left: '35',
			},
			tooltip: {
				show: true,
				showContent: true,
				alwaysShowContent: true,
				triggerOn: 'mousemove',
				trigger: 'axis',
				axisPointer:
				{
					label: {
						show: false,
					}
				}

			},
			xAxis: {
				data: ['Ene','Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
				axisLine: {
					lineStyle: {
						color: 'rgba(67, 87, 133, .09)'
					}
				},
				axisLabel: {
					fontSize: 10,
					color: '#8e9cad'
				}
			},
			yAxis: {
				splitLine: {
					lineStyle: {
						color: 'rgba(67, 87, 133, .09)'
					}
				},
				axisLine: {
					lineStyle: {
						color: 'rgba(67, 87, 133, .09)'
					}
				},
				axisLabel: {
					fontSize: 10,
					color: '#8e9cad'
				}
			},
			series: chartdata3,
			color:[ myVarVal, '#f72d66']
		};
		var chart5 = document.getElementById('projectInvestment');
		var barChart5 = echarts.init(chart5);
		barChart5.setOption(option5);
		window.addEventListener('resize',function(){
			barChart5.resize();
		})
	}

	projectTracked()
	//projectInvestment()
	canvasDoughnut3()
})( jQuery );

