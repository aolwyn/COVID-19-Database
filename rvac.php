<!DOCTYPE	php>
<html>
	<head>
		<title>	Record a Vaccination	</title>
		
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
		<h1>Record a Vaccination</h1>
		<hr>
<form action = "covid.html">
		<input type="submit" value = "Return to mainpage"/>
		</form>

	<hr>
<?php
include 'connectdb.php';
?>
	<p> Welcome! Please enter an OHIP number. If we cannot find the number,
		you will be prompted to enter the new patient's information.
	</p>
	
	
	
<form action="#" method="post"><br>
OHIP Number: <input type="text" name="OHIP">
<input type="submit" value="Search Patient"> 
</form>
	
	<table>
		<tr>
			<th>First Name</th><th>Last Name</th><th>OHIP</th><th>Date of Vaccination</th><th>Lot ID</th><th>Vaccination Site</th></tr>
	
	<?php
	session_start();
	$ID = $_POST["OHIP"];
	$_SESSION["OHIP"] =$ID;
	$query = "SELECT FName, LName, POHIP FROM Patient WHERE POHIP = '".$ID."'";
	$queryresult = $connection->query($query);
	$row = $queryresult->fetch();
	
	if(!$row){
	echo '"No results for the entered OHIP number. Please enter the new patient\'s information and vaccination info below."<br>';
	
		echo '<form action = "APTDB.php" method = "post">';
		echo 'OHIP: '.$_SESSION["OHIP"] .'" <br>';
		echo 'First Name: <input type="text" name="newFName"><br>';
		echo 'Last Name:  <input type="text" name="newLName"><br>';
	    echo 'Birthdate:   <input type="date" name="newBDate"><br>';
		echo '<input type = "submit" value = "submit">';
		echo '</form>';
		
			
		
		$connection = NULL;
	}else{
		
		echo '<form action = "AVTDB.php" method = "post">';
		echo "ID detected. Click the button below to continue.";
		echo '<input type = "submit" value = "submit">';
		echo '</form>';
		
		
		
		
	}


?>

<?php
$connection = NULL;

?>

</body>
</html>