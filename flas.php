<!DOCTYPE html>

<html>
	<head>
	<title> COVID-19 Database FLAS </title>
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

	<h1 style = "font-family: courier">Location and Stock</h1>
<hr>
<?php
include 'connectdb.php';
?>
	<h4> Choose a vaccine type: </h4>
	
	<form action = "#" method = "post">
	<?php
	$query = "SELECT * FROM Company";
	$result = $connection->query($query);
	while($row = $result->fetch()){
	echo '<input type = "radio" name = "company" value = "'.$row["CName"].'">';
	echo $row["CName"]."<br>";

	}
	?>
	
	<input type="submit" value = "Submit">
	</form>
<table>
		<tr>
		<th> Location </th><th>Number of Doses</th><tr> 
	<hr>
	
<?php
	//if($_POST["company"]){
	$dummy = $_POST["company"];
	$query = 'SELECT VaccinationSite.VName, SUM(VaccineLot.Doses) as "SumD" FROM VaccineLot, VaccinationSite, distributiondates  WHERE Site=Lot AND VaccinationSite.VName =Location  AND VaccineLot.Company = "'.$dummy.'"';
	$result = $connection->query($query);
	while($row = $result->fetch()){
		echo "<tr><td>".$row["VName"]. "</td><td>".$row["SumD"]."</td></tr>";	
	}
	echo "</table>";
	//}
	?>


<hr>
<form action = "covid.html">
		<input type="submit" value = "Return to mainpage"/>
		</form>




</body>
</html>