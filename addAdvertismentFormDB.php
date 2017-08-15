<?php
session_start();
include("connect.php");
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



<?php

$Permmission = $_SESSION["Permmission"];
	
//check if the user is admin
	if($Permmission == "Admin"){
		
		mysqli_select_db( $conn, "$database");

				$image_link = $_POST['image_link'];
                $sl = "INSERT INTO advertisement(image_link)
                VALUES('$image_link')";

				if ($conn->query($sl) === TRUE) {
				echo ' تم إضافة الصورة بنجاح, اضغط <a href="addAdvertismentForm.php">هنا</a> للعودة إلى الصفحة السابقة';
				} else {
				echo "يوجد خطأ, أعد المحاولة: " . $sl . "<br>" . $conn->error;
				}		
		}	

	else{
		echo "لايمكن عرض محتوى الصفحة, يجب أن تكون أدمن ليتم فتح الصفحة.";
	}
	
?>

</body>


</html>