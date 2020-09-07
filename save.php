<?php
	$conn = new mysqli('localhost','root','','project');
	
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
	
	
	
	if($_POST['type']==2){
		$result=$_POST['result'];
		for ($i = 0; $i <= count($result); $i+=1){
		
				$flag=$result[$i][flag];
				$capital=$result[$i][capital];
				$name=$result[$i][name];
				$nativeName=$result[$i][nativeName];	
				$region=$result[$i][region];
				$id = $i+1;
				
				$sql = "INSERT INTO `api_details`( `id`, `flag`, `name`, `capital` ,`nativeName`, `region`) 
					VALUES('$id', '$flag' , '$name' , '$capital' , '$nativeName' , '$region')";
				if ($conn->query($sql) === TRUE)
				{
					echo json_encode(array("statusCode"=>200));
				} 
				else 
				{
					echo json_encode(array("statusCode"=>201));
				}
		  	}
		$conn->close();
	}
?>
  
