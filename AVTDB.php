<!DOCTYPE	php>

<html>
	<head>
		<title> Add Vaccination to Database</title>
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


	<h1>Vaccine Information </h1>
	<p> Please select the vaccination lot ID and the place of vaccination from the dropdown menus.</p>
	
<?php
   echo 'OHIP: <input type="text" name="newOHIP" value="'.$_SESSION["OHIP"].'"><br><br>';
?>
	
	<form action = "SVTDB.php" method = "post">
	<label for = "LIDS"> Select a Lot ID #: </label>
	<select name = "LIDS">
	<option value = "201">201</option>
	<option value = "69">69</option>
	<option value = "111">111</option>
</select> 
<br>
	<label for = "POV"> Select a location: </label>
	<select name = "POV">
	<option value = "Shipped to Home">Shipped to Home</option>
	<option value = "Methodist Church">Methodist Church</option>
	<option value = "Hockey Arena">Hockey Arena</option>
</select> 

Date of vaccination = <input type = "date" name = "newDate">


<br>
<input type = "submit" value = "submit">


</form>






</body>
</html>