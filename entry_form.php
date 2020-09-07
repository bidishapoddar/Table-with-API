<?php
$conn = new mysqli('localhost','root','','project');

if ($conn->connect_error) 
{
  die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST["flag"]))
{
	$flag = $_POST["flag"];
}
if (isset($_POST["name"]))
{
	$name = $_POST["name"];
}
if (isset($_POST["capital"]))
{
	$capital = $_POST["capital"];
}
if (isset($_POST["nativeName"]))
{
	$nativeName = $_POST["nativeName"];
}
if (isset($_POST["region"]))
{
	$region = $_POST["region"];
}

if (!isset($flag_fetch))
{
	$flag_fetch = "";
}
if (!isset($name_fetch))
{
	$name_fetch = "";
}
if (!isset($capital_fetch))
{
	$capital_fetch = "";
}
if (!isset($nativeName_fetch))
{
	$nativeName_fetch = "";
}
if (!isset($region_fetch))
{
	$region_fetch = "";
}

	
	
	
if (isset($_REQUEST['edit_id']))
{
	$edit_id = $_REQUEST['edit_id'];
}
if (!isset($edit_id))
{
	$edit_id = "";
}


function getEntryDetails($primaryKey)
{	
	global $conn,$flag_fetch,$name_fetch,$capital_fetch,$nativeName_fetch,$region_fetch;
	
	$getData_sql = "select * from api_details where id = '$primaryKey'";
	$result = $conn->query($getData_sql);
	
	while($row = $result->fetch_assoc())
	{
		$flag_fetch = $row["flag"];
		$name_fetch = $row["name"];
		$capital_fetch = $row["capital"];
		$nativeName_fetch = $row["nativeName"];
		$region_fetch = $row["region"];
	}
}
if($edit_id!="")
{
	getEntryDetails($edit_id);
}

function updateDetails($primaryKey)
{
	global $conn,$capital,$region;
	
	$updt="UPDATE api_details SET capital = '$capital',region = '$region'
	 where id= '$primaryKey'";
	//print_r($updt);die();
	if ($conn->query($updt) === TRUE) 
	{
	?> 
		<script>
		alert("your data is successfully updated!!!!!");
		window.location.assign("register.php");
		</script>
	<?php
	}
	else 
	{
		echo "Error: " . $updt . "<br>" . $conn->error;
	}
}


if(isset($_POST["submit"]))
{
	if($edit_id!="")
	{
		updateDetails($edit_id);
	}
	$conn->close();
}

?>

<html>
    <head>
        <title>Welcome to ABC</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="./wizer.css">
    </head>
    <body>
        <div class="container-fluid">
        	<form name="form1" action="entry_form.php" method="post">
            	<div class="card-1">
            		<div class="card" style="height:100% ">
               	 		<div class="card-head ">GENERAL INFORMATION</div>
                		<div class="card-body">
                    		<div class="row">
                        		<div class="column col-md-4">
                            		<div class="form-group">
                                		<label>Flag</label>
										<input type="text" class="form-control" name="flag" id="flag" value="<?php echo htmlspecialchars(strip_tags($flag_fetch),ENT_QUOTES); ?>" readonly="readonly">
										<input type= "hidden" id = "edit_id" name = 'edit_id' value = "<?php echo $edit_id; ?>">
									</div>
                       			</div>
								<div class="column col-md-4">
									<div class="form-group">
										<label>Name</label>
										<input type="text" class="form-control" name="name" id="name" value="<?php echo htmlspecialchars(strip_tags($name_fetch),ENT_QUOTES); ?>" readonly="readonly">
									</div>
								</div>
								<div class="column col-md-4">
									<div class="form-group">
										<label>Capital</label>
										<input type="text" class="form-control" name="capital" id="capital" value="<?php echo htmlspecialchars(strip_tags($capital_fetch),ENT_QUOTES); ?>">
									</div>
								</div>
								<div class="column col-md-4">
									<div class="form-group">
										<label>Native Name</label>
										<input type="text" class="form-control" name="nativeName" id="nativeName" value="<?php echo htmlspecialchars(strip_tags($nativeName_fetch),ENT_QUOTES); ?>" readonly="readonly">
									</div>
								</div>
								<div class="column col-md-4">
									<div class="form-group">
										<label>Region</label>
										<input type="text" class="form-control" name="region" id="region" value="<?php echo htmlspecialchars(strip_tags($region_fetch),ENT_QUOTES); ?>">
									</div>
								</div>
							</div>
						</div>
						<?php
						if($edit_id!="")
						{
						?>
							<div class="row">
								<div class="column col-md-5" style="padding-left: 45%; ">
									<div class="form-group">
										<button type="submit" class="btn bt btn-primary" name="submit">Update</button>
									</div>
								</div>
							</div>
						<?php
						}
						?>
					</div>
					
				</div>
			</form>
		
	</div>
    </body>
</html>
