<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Statistics for immigrants per country</title>	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="{{asset('css/components.min.css')}}" rel="stylesheet" type="text/css">	
	<script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('css/bootstrap.bundle.min.js')}}"></script>	
	<script type="text/javascript" src="{{URL::asset('js/echarts.min.js')}}"></script>

</head>
<body>
<div class="col-md-12">
	<h1 class="text-center">Statistics for immigrants per country</h1>
    <div class="col-md-8 col-md-offset-2">
    	<div class="col-xl-6">
    		<div class="card">
    			<div class="card-body">
    				<div class="chart-container">
    					<div class="chart has-fixed-height" id="bars_basic"></div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>	
</div>
</body>
</html>

<script type="text/javascript">
var bars_basic_element = document.getElementById('bars_basic');
if (bars_basic_element) {
    var bars_basic = echarts.init(bars_basic_element);
    bars_basic.setOption({
        color: ['#3398DB'],
        tooltip: {
            trigger: 'axis',
            axisPointer: {            
                type: 'shadow'
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: [
            {
                type: 'category',
                data: ['Tips', 'Contributions','recent'],
                axisTick: {
                    alignWithLabel: true
                }
            }
        ],
        yAxis: [
            {
                type: 'value'
            }
        ],
        series: [
            {
               
                type: 'bar',
                barWidth: '20%',
                data: [
                    {{$dataall['tips_count']}},
                    {{$dataall['contributions_count']}}, 
                    {{$dataall['media_count']}}
                ]
            }
        ]
    });
}
</script>