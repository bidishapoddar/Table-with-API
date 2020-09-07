   
<html>
    <head>
        <title>Welcome</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="./wizer.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    </head>
    <body>
		
		<div class="card-1">
			<div class="card" style="height:100% ">
				<div class="card-body">
					<div class="row">
						<div class="col-md-4 offset-md-5" style="margin-top: 11%;">
							<button id="butlogin" class="btn  btn-primary">Click Here !!</button>
						</div>
						<div class="col-md-4 offset-md-4">
							<p>Click This Button To Insert Data Of Web API</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		
		

        <script>
		$(document).ready(function() {
			$('#butlogin').on('click', function() {
						$.ajax({
							url: "https://restcountries.eu/rest/v2/all",
							type: "GET",
							cache: false,
							success: function(dataResult){
								$.ajax({
									url: "save.php",
									type: "POST",
									data: {
										type:2,
										result: dataResult						
									},
									cache: false,
									success: function(dataResult){
									location.href = "register.php";
								}
							});
						}
					})
				});
			});
		</script>
    </body>
</html>
<!--  -->
