<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Flood Monitoring System</title>

	<script type="text/javascript" src="{{('SensorLaravel/jquery/jquery.min.js')}}"></script>
	<script type="text/javascript" src="watrelevel/jquery/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="waterlevel/css/bootstrap.min.css">
	<script type="text/javascript" src="waterlevel/js/boostrap.min.js"></script>

	<style type="text/css">
		.tangki {
			border-style: solid;
			width: 300px;
			height: 300px;
			left: 50%;
			transform: translate(-50%);
			position: sticky;
			border-bottom-left-radius: 20px;
			border-bottom-right-radius: 20px;

		}

		.air{
			
			left: 50%;
			bottom: 0px;
			transform: translate(-50%);
			position: absolute;
			border-bottom-left-radius: 10px;
			border-bottom-right-radius: 10px;
			background-color: blue;
		}
	</style>

<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function() {
				$.get("{{ url("bacasuhu") }}", function(data) {
					var tinggi_air = parseFloat(data); // Data received
					var maxHeight = 100; 
					var alertHeight = 90;
					var minHeight = 0; 
					var actualdistance = maxHeight - minHeight; // Calculate the total height range
					var percentage_tinggi_air = 100 - ((tinggi_air - minHeight) / actualdistance) * 100;
					if (percentage_tinggi_air > alertHeight) {
						percentage_tinggi_air = alertHeight; // Set the height to the maximum value if it exceeds the limit
						alert('Water Level Reach Limit');
					}
					$(".air").css("height", percentage_tinggi_air + "%");
				});

				$.get("{{ url("bacatempat") }}", function(data) {
					$("#placename").text(data); // Update the placename
				});
			}, 1000);
		});
	</script>

</head>
<body>

	<!-- Web Application -->
	<div class="container" style="text-align: center;" >
		<!--<img src="images/logo.png" style="width: 200px; margin-top:25px;">-->
		<img src="{{ asset('images/logo.png') }}" style="width: 200px; margin-top:25px;">
		<h3>Water Level Monitoring</h3>
		<h4>Place : <span id="placename"> </span></h4>

			<!-- Body Water Level -->
			<div class="tangki">
				<!-- aiR -->
			
			 	<!--height should be a value from databse-->

				<span class="air" style="width: 100%; color: red;"></span>
    
   	 		</div>

			<br><a href="http://localhost/finalyearproject/public/chart" class="btn btn-primary">Record</a>

		
	</div>

	

</body>
</html>


