<?php 
// connect to the database
session_start();
 
include("connect.php");

$Permmission=$_SESSION["Permmission"];
	
	//check if the user is admin
	
	if($Permmission == "Admin")
	{
		
?>
<html>
<head> 
<title> </title>
<meta content="en-gb" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>


<body>
<div class="headingCSS">
<h2>اضافة صورة اعلان</h2>
</div>

<form method="POST" action="addAdvertismentFormDB.php" id="register">
  
  <fieldset>
		<label class="blockLabel" for="image_link" >          
         <span>*</span> رابط الصورة
		</label>
			<input name="image_link" id = "image_link" type="text"  /> 
				<br />
				
	<br><br>
    <input type="submit" value="إضافة">
  </fieldset>
</form>

<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
<script type="text/javascript" >

$(document).ready(function() {
	
	// validate call
	$("#register").validate({
		rules: {

			image_link: {
				required: true, 
				accept: "jpg|jpeg|png|gif"
				}
		}, // rules close 
		messages: {
			image_link: {
				required: 'يرجو وضع رابط للصورة',
				accept: 'يرجو وضع رابط الصورة بالصيغة الصحيحة'
				}
		} // messages close
	}); // validate call close
}); // function close
</script>

<?php
 }
else
{
			echo "لايمكن عرض محتوى الصفحة, يجب أن تكون أدمن ليتم فتح الصفحة";
}

 ?>


</body>
</html>