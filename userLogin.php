<?php 
echo "
<html>
<head><title>user registration</title></head>
<body>
	<form method=\"post\" action=\"userLogin.php\">
		Username: <input type=\"text\" name=\"username\"/>
		Password: <input type=\"password\" name=\"password\"/>
		<input type=\"submit\" value=\"submit\"/>
	</form>
</body>
</html>"
?>

<?php
if($_POST){
	$username=$_POST["username"];
	$password=$_POST["password"];
	
	$serverName = "localhost";
	$database = "transactionlog";
	
	$conn = new mysqli($serverName,$username,$password,$database);
	
	if($conn->connect_error)
		die("Connecton Failed");
	else
		echo "<br\>Connection Established with MySQL Server";
}
?>