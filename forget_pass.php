<?php
include("connect.php");

if(isset($_POST['submit'])){
	
	
	$Email=mysqli_real_escape_string($conn,$_POST['Email']);
	
	$query=" select ID from user WHERE  Email = '$Email' ";
	$result = mysqli_query($conn,$query);
	$resultCheck = mysqli_num_rows($result);
	
	 	if ($resultCheck > 0) {
			
			$str="123345678hguytftrxrydcyufgitrdxyjtrdsyjrtsyfuydtyrsrtezfdxyjtrdyjt";
			//This function will randomly shuffle all characters each time.
			$str=str_shuffle($str);
			$str=substr($str,0,10);
			//$Password=sha1($str);
			
			//$url="http://domain.com/Pages/reset_pass.php?Token=$str&Email=$Email";
			//echo $url;
			
			//mail($Email,"إستعادة الرقم السري","لإستعادة الرقم السري الرجاء الضغط على الرابط:$url","From: test@domain.com\r\n ");
			
			
			//$query=" UPDATE user SET Password='$Password' WHERE Email = '$Email' ";
			//echo $Password;
			
			$query=" UPDATE user SET Token='$str' WHERE Email = '$Email' ";
			 mysqli_query($conn,$query);
			 
			
			echo '<script type="text/javascript">alert("الرجاء التحقق من بريدك الإلكتروني")</script>' ;
			
		}else{
			
			echo '<script type="text/javascript">alert("البريد الإلكتروني غير مسجل")</script>';
			
		}
	
}


?>

<html>

<head>

<title>نسيان الرقم السري</title>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>


<h3>نسيت الرقم السري ؟</h3>

<fieldset>

<form action="forget_pass.php" id="forgetform" method="POST">
البريد الإلكتروني: <input type="text" name="Email"><br><br>	

</fieldset>

<input type="submit" value="موافق" name="submit" />

</form>
	
<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script type="text/javascript" >

$(document).ready(function(){
	
$("#forgetform").validate({
		
		rules:{
			
				Email:{
					required:true,
					email:true
				}
				
			},
			
			messages:{
			
				Email:{
				
					required:" هذا الحقل مطلوب" ,
					email:"يُرجى إدخال بريد إلكترونيّ صحيح"
				}
			
			}
			

	});
	
	
});
</script>



</body>

</html>