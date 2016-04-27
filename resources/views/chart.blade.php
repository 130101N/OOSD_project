@extends('admin.index')
 
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
			<canvas id="canvas" height="450" width="600"></canvas>
			</div>
			<div class="col-md-4">
				<canvas id="canvas2" height="450" width="600"></canvas>
			</div>
		</div>
	</div>



	<script>
	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
	var  getRandomColor = function() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

	var barChartData = {
		labels : ["January","February","March","April","May","June","July"],
		datasets : [
			{
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,0.8)",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "rgba(220,220,220,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			},
			{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,0.8)",
				highlightFill : "rgba(151,187,205,0.75)",
				highlightStroke : "rgba(151,187,205,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			}
		]

	}
	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myBar = new Chart(ctx).Bar(barChartData, {
			responsive : true
		});

		//2nd chart
		var ctx2 = document.getElementById("canvas2").getContext("2d");
		window.myBar = new Chart(ctx2).PolarArea(data, {
		segmentStrokeColor: "#000000"
		});
	}

	</script>
	<script>
		var data = [
	    {
	        value: 300,
	        color:"#F7464A",
	        highlight: "#FF5A5E",
	        label: "Red"
	    },
	    @foreach($category as $mycategory) 
	    {
	        value: {{ $mycategory->id }}+50,
	        color: getRandomColor,
	        highlight: getRandomColor,
	        label: "Green"
	    },
	    @endforeach
	    {
	        value: 100,
	        color: "#FDB45C",
	        highlight: "#FFC870",
	        label: "Yellow"
	    },
	    {
	        value: 40,
	        color: "#949FB1",
	        highlight: "#A8B3C5",
	        label: "Grey"
	    },
	    {
	        value: 120,
	        color: "#4D5360",
	        highlight: "#616774",
	        label: "Dark Grey"
	    }

		];

	</script>
@stop
