

		<form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>

<html>
<head>

	<!--<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">-->

	<title>Flood Monitoring System</title>

	<script type="text/javascript" src="{{('SensorLaravel/jquery/jquery.min.js')}}"></script>
	<script type="text/javascript" src="watrelevel/jquery/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="waterlevel/css/bootstrap.min.css">
	<script type="text/javascript" src="waterlevel/js/boostrap.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<style type="text/css">

		.tangki {
			border-style: solid;
			width: 300px;
			height: 300px;
			left: 35%;
			transform: translate(-50%);
			position: sticky;
			border-bottom-left-radius: 20px;
			border-bottom-right-radius: 20px;
			float: left;

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
		.button-container {
    		position: absolute;
   			top: 120%;
    		left: 50%;
    		transform: translate(-50%, -50%);
		}
	


		.tangki2 {
			border-style: solid;
			width: 300px;
			height: 300px;
			left: 110%;
			transform: translate(-50%);
			position: sticky;
			border-bottom-left-radius: 20px;
			border-bottom-right-radius: 20px;
			float: left;
  			margin-left: 10%;
			
			
		}

		.air2 {
			
			left: 50%;
			bottom: 0px;
			transform: translate(-50%);
			position: absolute;
			border-bottom-left-radius: 10px;
			border-bottom-right-radius: 10px;
			background-color: blue;
		}
	
		</style>
	
<!--1st container-->
<script type="text/javascript">

		$(document).ready(function() {
			setInterval(function() {
				$.get("{{ url("bacasuhu") }}", function(data) {
					var tinggi_air = parseFloat(data); 
					var containerHeight = 20; 
      				var actualDistance = 100; 
					var alertHeight = 85;
					var percentage_tinggi_air =100 - ((tinggi_air / containerHeight) * actualDistance).toFixed(2);
					if (percentage_tinggi_air > alertHeight) {
						$.get("{{ url("bacatempat") }}", function(placename) {
								var alertText = "Water Level Reach Limit at " + placename + "!";
								swal({
									title: alertText,
									icon: "warning",
									dangerMode: true
                           		 	
								});
							});
					}
					$(".air").css("height", percentage_tinggi_air + "%");
				});

				$.get("{{ url("bacatempat") }}", function(data) {
					$("#placename").text(data); // Update the placename
				});
			}, 1000);
		});
	</script>


<!--2nd container-->
<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function() {
				$.get("{{ url("bacasuhu2") }}", function(data) {
					var tinggi_air = parseFloat(data); 
					var containerHeight = 20; 
      				var actualDistance = 100; 
					var alertHeight = 85;
					var percentage_tinggi_air =100 - ((tinggi_air / containerHeight) * actualDistance).toFixed(2);
					if (percentage_tinggi_air > alertHeight) {
						$.get("{{ url("bacatempat2") }}", function(placename2) {
							var alertText = "Water Level Reach Limit at " + placename2 + "!";
								swal({
									title: alertText,
									icon: "warning",
									dangerMode: true
								});
							});
					}
					$(".air2").css("height", percentage_tinggi_air + "%");
				});

				$.get("{{ url("bacatempat2") }}", function(data) {
					$("#placename2").text(data); // Update the placename
				});
			}, 1000);
		});
	</script>
	

</head>
<body>

	<!-- Web Application -->
	<div class="container" style="text-align: center;" >
		
		<img src="{{ asset('images/logo.png') }}" style="width: 200px; margin-top:25px;">
		<h3>Water Level Monitoring</h3>

			<!-- 1st -->
			<!-- Body Water Level -->
			<div class="tangki">Place : <span id="placename"> </span>
				<!-- aiR -->
				<span class="air" style="width: 100%; color: red;"></span>
				<div class="button-container">
       				 <a href="http://localhost/finalyearproject/public/chart" class="btn btn-primary">Record</a>
    			</div>
			</div>

				
			<!-- 2nd -->
			<!-- Body Water Level -->
			<div class="tangki2">Place : <span id="placename2"> </span>
				<!-- aiR -->
				<span class="air2" style="width: 100%; color: red;"></span>
				<div class="button-container">
       				 <a href="http://localhost/finalyearproject/public/chart2" class="btn btn-primary">Record</a>
    			</div>
			</div> 
	
	

</body>
</html>


