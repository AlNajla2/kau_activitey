<?php


	session_start();
	include("connect.php");
	
	$password = base64_encode($_POST['password']);
	$username = $_POST['username'];
	
	echo "".$password."</br>";
	$sql = "INSERT INTO login (pass, user)
VALUES ('$password','$username')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully"."</br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo "welcome   :".$username."</br>";
echo "password  :".base64_decode($password)."</br>";
	//if($username && $password){
		
		
		//$sql="select * from login where user='$username' and pass='$password'";
		//$result = $conn->query($sql);
		//$result=mysql_query($query);
		//if ($result->num_rows > 0){
			//echo"welcome : ".$username;
			//$_session['username']=$username;
		//}
	//	else echo "error login";
	//}
	//else echo "Please enter the username and the password";
	
?>
