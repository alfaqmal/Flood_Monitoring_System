<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Flood Monitoring System</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/boostrap.min.js"></script>

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

	<!-- Real Time Process -->
	<script type="text/javascript">
		$(document).ready(function()
		{
			setInterval(function()
			{
				$("#data").load('data.php')

			},1000);

		});
				
</script>
</head>
<body>

	<!-- Web Application -->
	<div class="container" style="text-align: center;" >
		<img src="images/logo.png" style="width: 200px; margin-top:25px">
		<h3>Water Level Monitoring</h3>

		<!-- Body Water Level -->
		<div class="tangki">
		<!-- aiR -->
			<div class="air" style="width: 100%; height: 80%; ?>%; color: white; "> <!--height should be a value from databse-->
    
    
   			 </div>
		</div>
	</div>

</body>
</html>