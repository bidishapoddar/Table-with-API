<?php
$conn = new mysqli('localhost','root','','project');

if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 

?>

<htmt>
<head>
  <title>Data Table</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 style="text-align:center; margin-bottom:40px ">Web API Details Data Table</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Edit</th></th>
		<th>Flag</th>
        <th>Name</th>
        <th>Capital</th>
		<th>NativeName</th>
		<th>Region</th>
      </tr>
    </thead>
    <tbody>
	<?php
	
	$getData_sql = "SELECT * FROM api_details";
	$result = $conn->query($getData_sql);
	
	
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			$id = $row["id"];
			$flag = $row["flag"];
			$name = $row["name"];
			$capital = $row["capital"];
			$nativeName = $row["nativeName"];
			$region = $row["region"];
		?>
		  <tr>
			<td><button type="submit" class="btn bt btn-primary"><a href="./entry_form.php?edit_id=<?php echo $id; ?>" target="_blank" style="text-decoration:none; color:#FFFFFF ">EDIT</a></button></td>
			<td><?php echo $flag; ?></td>
			<td><?php echo $name; ?></td>
			<td><?php echo $capital; ?></td>
			<td><?php echo $nativeName; ?></td>
			<td><?php echo $region; ?></td> 
		  </tr>
		 <?php
		 }
	}
	?>
    </tbody>
  </table>
</div>

</body>
</html>