<html>
<head>
<title>tp</title>
<link rel="stylesheet" href="tp.css"/>
</head>
<body>
<center><fieldset style="width:45%;height:83%;background-color:skyblue";>

<div class="">
	<h2>Poll RESULTS</h2>
	<p></p>
</div>
<table>

<?php
$servername = "localhost";
$username = "";
$password = "";
$database = "dbname";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

	
	if(isset($_GET['results']))
	{
	$get_vote = "select * from choice";
	$run_vote = mysqli_query($conn,$get_vote);
	$row_vote = mysqli_fetch_array($run_vote);
	
		$INC = $row_vote['positive'];
		$BSP = $row_vote['negative'];
		$BJP = $row_vote['BJP'];
		$CPI =$row_vote['CPI'];
		$AITC =$row_vote['AITC'];
		$NCP = $row_vote['NCP'];
	
		

		
		echo "
			<div style='background:midnightblue; padding:10px; text-align:center;'>
			<center>
		
			<p style='background:black; color:white; padding:10px; width:500px;'><b>INC:</b> $INC</p>
			<p style='background:black; color:white; padding:10px; width:500px;'><b>BSP:</b> $BSP</p>
			<p style='background:black; color:white; padding:10px; width:500px;'><b>BJP:</b> $BJP</p>
			<p style='background:black; color:white; padding:10px; width:500px;'><b>CPI:</b> $CPI</p>
			<p style='background:black; color:white; padding:10px; width:500px;'><b>AITC:</b> $AITC</p>
			<p style='background:black; color:white; padding:10px; width:500px;'><b>NCP:</b> $NCP</p>
			</div>	
		";
}






	?>
	
</body>
</html>