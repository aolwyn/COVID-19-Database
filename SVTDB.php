<!DOCTYPE	php>

<html>
	<head>
		<title> Save Vaccination to Database</title>
		<style>
		body, h{
			font-family: courier new;
		background-color: RGB(146,168,209);
		
		}
			
		table, th, td{
			border: 1px solid black;
			padding: 8px;
			
		}
		</style>
	</head>
<body>
<?php
include 'connectdb.php';
session_start();
?>

	<h1>Saved information. New Information: </h1>

	
	<?php

	$LID = $_POST["LIDS"];
	$POV = $_POST["POV"];
	$DATE = $_POST["newDate"];
	$queryW = 'INSERT INTO Vaccinate values("'.$_SESSION["OHIP"] . '","' .$POV . '","' .$DATE . '","' .$LID . '")';
	$qwerty = $connection->exec($queryW);




?>


<table>
	<tr>
		<th>Type</th><th>LotID</th><th>Date</th><th>Location</th><tr>


<?php
	$queryM = 'SELECT 	Company, Vaccinate.LotID, Vaccinate.Date, Vaccinate.ClinicName FROM DistributionDates, Vaccinate, VaccineLot WHERE Vaccinate.LotID = DistributionDates.Site AND Vaccinate.LotID = VaccineLot.Lot AND Vaccinate.POHIP = "'.$_SESSION["OHIP"].'"';
	$resultTY = $connection->query($queryM);
	$row = $resultTY->fetch();
	do{
	echo "<tr><td>".$row["Company"]."</td><td>".$row["LotID"]."</td><td>".$row["Date"]."</td><td>".$row["ClinicName"]."</td></tr>";
	}while ($row = $resultTY->fetch());
?>
</table>
<br>
<a href = "covid.html"> Return to Home</a>
</body>
</html>