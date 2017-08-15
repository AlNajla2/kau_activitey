<?php
include("connect.php");
if(isset($_GET["Email"]) && isset($_GET["Token"])){
	
	$Email=mysqli_real_escape_string($conn,$_GET['Email']);
	$Token=mysqli_real_escape_string($conn,$_GET['Token']);
	
	$query="SELECT ID FROM user WHERE  Email='$Email' AND Token='$Token'";	
	$result = mysqli_query($conn,$query);
	$resultCheck = mysqli_num_rows($result);
	
	 	if ($resultCheck > 0) {
			
			$str="123345678hguytftrxrydcyufgitrdxyjtrdsyjrtsyfuydtyrsrtezfdxyjtrdyjt";
			$str=str_shuffle($str);
			$str=substr($str,0,15);
			$Password=sha1($str);
			
			$query=" UPDATE user SET Password='$Password',Token='' WHERE Email='$Email'";
			mysqli_query($conn,$query);
			
			echo "رقمك السري الجديد هو:$str";
			
			//http://localhost/loginpage%20(3)/loginpage/reset_pass.php?Token=utfyrrxyyd8&Email=noha@noha.com
			
		}else{
			
			echo '<script type="text/javascript">alert(" الرجاء التأكد من الرابط")</script>';
		}	
	
}else{
	
	header("Location:login.php"); 
	exit();
}

?>

<html>

<head>

<title>نسيان الرقم السري</title>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>

</body>

</html>