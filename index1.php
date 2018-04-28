<html>
<head>
<title>Election</title>
<link rel="stylesheet" type="text/css" media="screen" href="ext.css">
</head>
<body>
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">
			<form action="index1.php" method="POST">
				<div class="group">
					<label for="user" class="label">Email</label>
					<input id="user" type="text"  name="Email" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" name="Password" class="input" data-type="password">
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit"  name="login" class="button" value="Sign In">
				</div>
				<?php
                
                
				if(isset($_POST['login']))
{
	
	$servername = "localhost";
$username = "id5376369_root";
$password = "12345";
$dbname = "id5376369_polling_system";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  $Email = $_POST['Email'];
  $Password = $_POST['Password'];
                    
                
 
            
                

$duplicate=mysqli_query($conn,"select * from id5376369_polling_system.poll_done where email='$Email' ");
if ( mysqli_num_rows($duplicate) >0)
{
//header("Location: polldone.php?message=User name or Email id already exists.");

echo("<script>location.href = 'polldone.php?message=User name or Email id already exists.O';</script>");


exit();
}

  $sql = "SELECT * from registered where Email ='$Email' and Password='$Password'";
$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{
       // echo "id: " . $row["id"]. " - Name: " . $row["email"]. " " . $row["password"]. "<br>";
	   if($Email=$row["Email"]and $Password=$row["Password"])
	   {
		         $stmt = "INSERT INTO poll_done (email) VALUES ('$Email')";

            $run_query = mysqli_query($conn,$stmt);
            
		   echo("<script>location.href = 'tp.php';</script>");
	   }
	   
    }
	} 
	else
	   {
		   echo"<script>alert('login failed....')</script>";
		  
	   }
	
  
$conn->close();
  }

				
				?>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div>
			</div>
			</form>
			<form action="index1.php" method="POST">
			<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" name="Name" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" name="Password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="pass" type="text" name="Email" class="input">
				</div>
				<div class="group">
					<input type="submit"  name="submit" class="button" value="Sign Up">
				</div>
				<?php
if(isset($_POST['submit']))
{
	$servername = "localhost";
$username = "id5376369_root";
$password = "12345";
$dbname = "id5376369_polling_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$Name = $_POST['Name'];
$Password = $_POST['Password'];
$Email = $_POST['Email'];


$stmt = $conn->prepare("INSERT INTO registered (Name,Email,Password) VALUES (?, ?, ?)");
$stmt->bind_param("sss",$Name,$Email,$Password);

// set parameters and execute
$Name=$Name;
$Email=$Email;
$Password=$Password;
$stmt->execute();

echo "<script>alert('New records created successfully')</script>";
header('Location:index1.php');
$stmt->close();
$conn->close();
}
?>

				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</a>
				</div>
			</div>
				</form><!--end registration-->
		</div>
	</div>
</div>
</body>
</html>