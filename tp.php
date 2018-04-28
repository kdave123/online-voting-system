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
        
        
if (isset($_POST['submit'])) {

if(isset($_POST['party']))
	{
		$partyName= mysqli_real_escape_string($conn,$_POST['party']);
	    
	    echo $partyName;
	   
		$vote_no = "update choice set $partyName = $partyName +1";
		echo $vote_no;
		
		$run_no = mysqli_query($conn,$vote_no);
		echo $run_no;
		if($run_no)
		{
			echo "<h2 align='center'>Your vote has being Recorded</h2>";
			echo("<script>location.href = 'index1.php';</script>");
        
			}
	}


}
	?>

<html>
<head>
<title>tp</title>
<link rel="stylesheet" href="tp.css"/>
</head>
<body>
<center><fieldset style="width:45%;height:83%;background-color:skyblue";>

<div class="">
	<h2>Poll</h2>
	<p></p>
</div>
<table>

	</table>
<div class="container">

	
	
	
<form action="tp.php" method="POST" enctype="multipart/form-data">	
  <ul>
  
    <li> <!--SAMPLE CODE FOR ADDING PARTY inside <li> </li>-->
    <input type="radio" id="f-option" name="party" value="BJP">
    <label for="f-option">Bharatiya Janata Party</label>
    
    <div class="check"></div>
  </li>
  
  <li>
    <input type="radio" id="f-option" name="party" value="positive">
    <label for="f-option">Indian National Congress</label>
    
    <div class="check"></div>
  </li>
  
  <li>
    <input type="radio" id="s-option" name="party" value="negative">
    <label for="s-option">Bahujan Samaj Party</label>
    
    <div class="check"><div class="inside"></div></div>
  </li>
  <li>
    <input type="radio" id="f-option" name="party" value="AITC">
    <label for="f-option">All India Trinamool Congress</label>
    
    <div class="check"></div>
  </li>
<li>
    <input type="radio" id="f-option" name="party" value="NCP">
    <label for="f-option">Nationalist Congress Party</label>
    
    <div class="check"></div>
  </li>
<li>
    <input type="radio" id="f-option" name="party" value="CPI">
    <label for="f-option">Communist Party of India</label>
    
    <div class="check"></div>
  </li>
  
  
    </ul>
	<table>
	
	
	<tr>
		<td><input type="submit" name="submit" value="Submit" class="but"/></td>
		
	</tr>
	</table>

	</form>
</div>
</fieldset></center> 

	
</body>
</html>