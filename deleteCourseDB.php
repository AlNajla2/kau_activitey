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
<h2>حذف دورة</h2>
</div>

<form method="GET" action="/pagae12_addCourseDB.php">

<?php

$Permmission = $_SESSION["Permmission"];
	
//check if the user is admin
	
if($Permmission == "Admin"){
		
	mysqli_select_db( $conn, "$$database");
	
	
	// fetch the course id from the url parameter and store inside $Course_ID variable.
	$Course_ID =  $_REQUEST['Course_ID'];
	
	// Select Query
	$sql2 = "DELETE FROM course 
			WHERE  Course_ID = '$Course_ID' ";
	
	// Execute the query	
	$result = mysqli_query( $conn, $sql2 )  or die('لم يتمكن من ايجاد معلومات المستخدم; ' . mysqli_error($conn));
	if(! $result ) {
      die('لم تتمكن عمليةالحذف ' . mysqli_error());
   }
   else {
	
	  echo ' تم حذف الدورة بنجاح, اضغط <a href="deleteCourse.php">هنا</a> للعودة إلى الصفحة السابقة';
		//header("refresh:1; url=deleteCourse.php");
		}
	}
	else{
		echo "لايمكن عرض محتوى الصفحة, يجب أن تكون أدمن ليتم فتح الصفحة.";
	}
?>

</body>
</html>