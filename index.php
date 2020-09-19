   
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
							<p id="aftr">Click This Button To Insert Data Of Web API</p>
							<p id="bfr" style="width: 128%;margin-left: -19%;">Please wait until the whole data is not inserted into database !!!</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		
		

        <script>
			$(document).ready(function() {
				$('#bfr').hide();//Added validation//
				
				$('#butlogin').on('click', function() {
					$('#butlogin').prop( "disabled", true );//Added validation//
					$('#aftr').hide();//Added validation//
					$('#bfr').show();//Added validation//
					
						$.ajax({
							url: "https://restcountries.eu/rest/v2/all",
							type: "GET",
							cache: false,
							success: function(dataResult){
								var stringData=JSON.stringify(dataResult)//Added//
								$.ajax({
									url: "save.php",
									type: "POST",
									data: {
										type:2,
										result: stringData	//Modified//					
									},
									cache: true,
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
