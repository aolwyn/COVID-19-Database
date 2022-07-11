<!DOCTYPE html>
<html>
	<head>
	<title> COVID-19 Database FP </title>
	<style>
		body{
		background-color: RGB(146, 168, 209);
		font-family: courier new;
		}
		
		
		table, th, td{
			border: 1px solid black;
			padding: 8px;	
		}
		</style>
	</head>

<body>
	<h1 style = "font-family: courier">Find Patient Information</h1>
<hr>
<?php
include 'connectdb.php';
?>
<p> Please select one of the patients below to see their information. If the patient is not present, you may need to record their vaccination.</p>
<form action = "rvac.php">
		<input type="submit" value = "To Record a Vaccination Page"/>
		</form>

<form action = "#" method = "post">
<br>
<br>
<?php
	$query = "SELECT * FROM Patient";
	$result = $connection->query($query);
	while($row = $result->fetch()){
	echo '<input type = "radio" name = "patient" value = "'.$row["LName"].'">';//. "'.$row["LName"]'"
	echo $row["FName"]." " . $row["LName"]."<br>";
	
	}
	?>
	
		<input type="submit" value = "Submit">
</form>
<table>
	<tr>
	<th> First Name</th><th>Last Name</th><th>OHIP</th><th>Company</th><th>Vaccination Date</th></tr>
	
<hr>

<?php

$dummy = $_POST["patient"];
$query = 'SELECT FName, LName, Patient.POHIP, Vaccinate.ClinicName, Vaccinate.Date FROM Patient, Vaccinate WHERE Patient.POHIP = Vaccinate.POHIP AND LName = "'.$dummy.'" ';
$result = $connection->query($query);
while($row = $result->fetch()){
	echo "<tr><td>".$row["FName"]."</td><td>".$row["LName"]."</td><td>".$row["POHIP"]."</td><td>".$row["ClinicName"]."</td><td>".$row["Date"]."</td></tr>";
}

echo "</table>";
?>


<hr>
<form action = "covid.html">
		<input type="submit" value = "Return to mainpage"/>
		</form>



</body>
</html>