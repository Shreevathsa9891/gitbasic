<html>
<head><title>user registration</title></head>
<body>
	<form method="post" action="registration.php">
		<table>
			
			<tr><td>First Name:</td><td><input type="text" name="fname"/><br/></td></tr>
			<tr><td>Email:</td><td><input type="text" name="email"><br/></td></tr>
			<tr><td>Phone No:</td><td><input type="text" name="phno"><br/></td></tr>
			<tr><td>Username:</td><td><input type="text" name="username"/><br/></td></tr>
			<tr><td>Password:</td><td><input type="password" name="password"/><br/></td></tr>
			<tr><td><input type="submit" value="submit"/></td></tr>
		</table>
	</form>
</body>
</html>

<?php
if($_POST){
	$firstName=$_POST["fname"];
	$email=$_POST["email"];
	$mobNo=$_POST["phno"];
	$username=$_POST["username"];
	$password=$_POST["password"];
	
	$serverName = "localhost";
	$database = "transactionlog";
	
	$conn = new mysqli($serverName,"root","",$database);
	
	if($conn->connect_error)
		die("Connecton Failed");
	else
		echo "<br\>Connection Established with MySQL Server";
	
	$sql1 =$conn->query("select mailID from usercredentials where mailID='$email'");
	if(mysqli_num_rows($sql1)>0)
		echo "<br/>User already exists";
	else{
		$sql = "insert into usercredentials(firstName,mailID,mobileNo,userName,passWord) values('$firstName','$email','$mobNo','$username','$password')";
		
		if($conn->query($sql))
			echo "Registration Successful";
		else
			echo "Registration Unsuccessful";
	}
}
?>