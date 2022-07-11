<!DOCTYPE	php>

<html>
	<head>
		<title> Add a Person to Database</title>
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
	
	
	
	
	
	<?php
		$newFName = $_POST["newFName"];
		$newLName = $_POST["newLName"];
		$newPDOB = $_POST["newBDate"];
		$enterquery = 'INSERT INTO Patient values("' . $_SESSION["OHIP"] . '" , "' . $newFName . '" ,"' . $newLName . '" ,"' . $newPDOB . '" ,NULL)';
		$rows2 = $connection->exec($enterquery);
		//print statement for successful add?

	include 'AVTDB.php';
?>





</body>
</html>