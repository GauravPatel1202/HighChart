<html lang="en">

	<head>
		<meta charset="utf-8">

		<title>Highcharts How-To - ONA14</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

		<style>
		iframe.zoom {
		    -ms-zoom: 0.75;
		    -moz-transform: scale(0.75);
		    -moz-transform-origin: 0 0;
		    -o-transform: scale(0.75);
		    -o-transform-origin: 0 0;
		    -webkit-transform: scale(0.75);
		    -webkit-transform-origin: 0 0;
		}
		#charts {
			top:-400px !important;
			background: white;
		}
		#charts_left {
			float:left;
			width: 40%;
		}
		#tools {
			height:350px;
		}
		#javascript {
			float:left;
			width:55%;
			padding-left:5%;
			height:350px;
			background: white;
		}
		#cms {
			height:250px;
		}
		#responses {
			float: left;
			width:55%;
			padding-left:5%;
			background: white;
			height:250px;
			color:#555;
			font-family: sans-serif;
			font-size: 31px;
			font-weight: 100;
			text-align: center;
			line-height: 1.3;
		}
		#responses div {
			margin-bottom: 5px;
		}
		#responses span {
			background: #7CB5EC;
			color:white;
			padding: 0 2px;
		}
		div.toggle {
			margin:10px auto 0;
			overflow: auto;
			display: inline-block;
		}
		.toggle div {
			float:left;
			font-size: 20px;
			padding: 6px 10px;
			border: 1px solid #CCC;
			line-height: 1;
		}
		.toggle div:first-of-type {
			border-right:0;
		}
		.toggle div:not(.active) {
			cursor: pointer;
		}
		.toggle div:not(.active):hover {
			background:#ddd;
		}
		.toggle .active {
			background: #eee;
		}
		.note {
			clear:both;
			padding-top:80px;
			font-family: sans-serif;
			font-weight: 100;
			text-align: center;
			color:#999;
			line-height: 1.5;
		}

		</style>
		<!--[if lt IE 9]>
		<script src="lib/js/html5shiv.js"></script>
		<![endif]-->
	</head>

	<body>




				<div id="charts">
					<div id="charts_left">
						<div id="tools"></div>
						<div id="cms"></div>
					</div>
					<div id="javascript"></div>
					<div id="responses">
						<div class="responses">Data based on <span>0</span> responses</div>
						<div class="time">Last updated <span>0:00:00</span></div>
						<div class="next">Next update in <span>30</span> seconds</div>
						<div class="hash"><a href="https://twitter.com/search?f=realtime&q=%23highcharts">#highcharts</a></div>
						<div class="toggle">
							<div class="all active">All ONA</div>
							<div class="subset">Session Attendees</div>
						</div>
					</div>

				</div>


				<div class="note">This data was collected via an online poll during <a href="http://ona14.journalists.org/">ONA14</a> in Chicago, Sept 25-27, 2014. The results are not scientific.<br />Poll and design by <a href="https://twitter.com/nekolaweb">Adam Nekola</a></p>



		<script src="http://code.highcharts.com/highcharts.js"></script>

		<script>


$(function () {
    $('#tools').highcharts({
        chart: {
            type: 'bar',
            marginBottom: 80
        },
        title: {
            text: 'Tools for data visualization',
            align: 'left'
        },
        subtitle: {
            enabled: false
        },
        xAxis: {
            categories: [
                'Highcharts',
                'Google Charts',
                'D3.js',
                'Raphael.js',
                'Mapbox',
                'Leaflet',
                'CartoDB'
            ],
            title: {
                text: null
            },
            labels: {
                style: {
                	fontSize: '15px'
                }
            }
        },
        yAxis: {
            min: 0,
            max: 100,
            title: {
                text: '% of responders using tool',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' millions'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true,
                    formatter: function(){
                    	return Highcharts.numberFormat(this.y, 1) + "%";
                    }
                }
            }
        },
        legend: {
            enabled: false
        },
        credits: {
            enabled: false
        },
        exporting: {
          enabled: false
        },
        series: [{
            data: [80, 31, 63, 20, 2, 4, 7]
        }]
    });


    $('#javascript').highcharts({
        chart: {
            type: 'column',
            marginBottom: 80
        },
        title: {
            text: 'Javascript and jQuery ability',
            align: 'left'
        },
        subtitle: {
            enabled: false
        },
        xAxis: {
            categories: [
                '0',
                '1',
                '2',
                '3',
                '4',
                '5',
                '6',
                '7',
                '8',
                '9',
                '10'
            ],
            labels: {
                style: {
                	fontSize: '15px'
                }
            }
        },
        yAxis: {
            min: 0,
            max: 100,
            title: {
                text: '% of responders'
            }
        },
        tooltip: {
            
        },
        credits: {
            enabled: false
        },
        exporting: {
          enabled: false
        },
        legend: {
          enabled: false
        },
        plotOptions: {
            column: {
                borderWidth: 0
            }
        },
        series: [{
            data: [15, 20, 10, 10, 7, 8, 8, 4, 5, 2, 1]

        }]
    });


	$('#cms').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            exporting: {
                enabled: false  
            },
            credits: {
                enabled: false  
            },
            title: {
                text: 'Content Management Systems used',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            legend: {
                align: 'left',
                layout: 'vertical',
                itemMarginBottom: 10
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: 'Browser share',
                data: [
                    ['WordPress', 0],
                    ['Drupal',    0],
                    ['Joomla',    0],
                    ['Other',     0]
                ]
            }]
        });


	var tools_chart = $('#tools').highcharts();
	var javascript_chart = $('#javascript').highcharts();
	var cms_chart = $('#cms').highcharts();

	var tick;
	var csvData;

	seconds = 30;

	var checkData = setInterval(function(){

		$('.next span').html(seconds);
		seconds--;

		if ( !$('#charts').is(':visible') ){
        	clearInterval(checkData);
        }

        query = '';
        if ( $('.toggle .subset').hasClass('active') ){
        	query = '?subset=true';
        }

        if (seconds == -1){
	        csvData = $.ajax({
	            type: "GET",
	            url: "results.php"+query
	        })
	        .done(function( data ) {
				dataUpdate(data);
			})
			.fail(function( jqXHR, textStatus ) {
				//console.log( "Request failed: " + textStatus );
			});
			seconds = 30;
		}

    }, 1000);


	csvData = $.ajax({
            type: "GET",
            url: "results.php"
        })
        .done(function( data ) {
			dataUpdate(data);
		});


    function dataUpdate(data){

   		var highcharts = new Array();
			highcharts['Yes'] = 0;
			highcharts['No'] = 0;

		var attendance = new Array();
			attendance['Yes'] = 0;
			attendance['No'] = 0;

		var javascript = new Array();
			javascript[0] = 0;
			javascript[1] = 0;
			javascript[2] = 0;
			javascript[3] = 0;
			javascript[4] = 0;
			javascript[5] = 0;
			javascript[6] = 0;
			javascript[7] = 0;
			javascript[8] = 0;
			javascript[9] = 0;
			javascript[10] = 0;

		var cms = new Array();
			cms['WordPress'] = 0;
			cms['Drupal'] = 0;
			cms['Joomla'] = 0;
			cms['Other'] = 0;

		var cms_other = new Array();

		var dataviz = new Array();
			dataviz['Google Charts'] = 0;
			dataviz['D3.js'] = 0;
			dataviz['Raphael.js'] = 0;
			dataviz['Mapbox'] = 0;
			dataviz['Leaflet'] = 0;
			dataviz['CartoDB'] = 0;
			dataviz['Highcharts'] = 0;

		var total = data.length;

		$.each(data, function( i, val ) {
			if (val.highcharts == 'Yes'){
				dataviz['Highcharts']++;
			}
			attendance[val.attendance]++;
			javascript[val.javascript]++;
			cms[val.cms]++;
			if ( !cms_other[val.cms_other] ) cms_other[val.cms_other] = 0;
			cms_other[val.cms_other]++;
			$.each(val.dataviz, function( id, viztool ) {
				dataviz[viztool]++;
			});
		});

		$('.responses span').html(total);
		var dt = new Date();
		var time = dt.getHours() + ":" + (dt.getMinutes() < 10 ? '0'+dt.getMinutes() : dt.getMinutes()) + ":" + (dt.getSeconds() < 10 ? '0'+dt.getSeconds() : dt.getSeconds());
		$('.time span').html(time);

		

		// Update charts 
		$.each(javascript_chart.series[0].data, function(dataIndex, dataValue){
			javascript_chart.series[0].data[dataIndex].update((javascript[dataIndex]/total)*100, false); 
		});
		javascript_chart.redraw();

		$.each(tools_chart.series[0].data, function(dataIndex, dataValue){			
			tools_chart.series[0].data[dataIndex].update((dataviz[dataValue.category]/total)*100, false); 
		});
		tools_chart.redraw();

		$.each(cms_chart.series[0].data, function(dataIndex, dataValue){	
			cms_chart.series[0].data[dataIndex].update((cms[dataValue.name]/total)*100, false); 
		});
		cms_chart.redraw();

    }

    $('.toggle div').on('click', function(){
    	if ( !$(this).hasClass('active') ){
   			$('.toggle div').toggleClass('active');

   			query = '';
	        if ( $('.toggle .subset').hasClass('active') ){
	        	query = '?subset=true';
	        }

   			csvData = $.ajax({
	            type: "GET",
	            url: "results.php"+query
	        })
	        .done(function( data ) {
				dataUpdate(data);
			});
   		}
    });



});

		</script>


	</body>
</html>