<!DOCTYPE html>
<html>
	<head>
	<title> COVID-19 Database HCW </title>
	<style>
		body{
		background-color: RGB(146, 168, 209);
		font-family: courier new;
		}
		
		
		table, th, td{
			border: 1px solid black;
			padding: 8px;	
		}
		<!RGB(152, 180, 212), RGB(146, 168, 209)>
		
		</style>
	</head>

<body>
	<h1 style = "font-family: courier">Find a Healthcare Worker</h1>
<hr>
<?php
include 'connectdb.php';
?>

	<h4> Choose a vaccination location: </h4>
	
	<form action = "#" method = "post">
	<?php
	$query = "SELECT * FROM VaccinationSite";
	$result = $connection->query($query);
	while($row = $result->fetch()){
	echo '<input type = "radio" name = "vaccinationsite" value = "'.$row["VName"].'">';
	echo $row["VName"]."<br>";
	
	}
	?>
	<input type="submit" value = "Submit">
	
	</form>	
	<table>
		<tr>
		<th> First Name </th><th>Last Name</th><th>Credential</th></tr> 
	<hr>
	<?php
	
	$dummy = $_POST["vaccinationsite"];
	$query = 'SELECT HealthcareWorker.HWFirstName, HealthcareWorker.HWLastName, Credentials.Credential FROM HealthcareWorker, StaffedBy, Credentials WHERE HealthcareWorker.HID = StaffedBy.EID AND HealthcareWorker.HID = Credentials.Type AND VName = "'.$dummy.'"';
	$result = $connection->query($query);
	while($row = $result->fetch()){
		echo "<tr><td>".$row["HWFirstName"]. "</td><td>".$row["HWLastName"]. "</td><td>".$row["Credential"]."</td></tr>";	
	}
	echo "</table>";
	?>
	
	
	
	
	<hr>
<form action = "covid.html">
		<input type="submit" value = "Return to mainpage"/>
		</form>

</body>
</html>