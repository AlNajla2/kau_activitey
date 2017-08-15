<html>
<header> 
<title> </title>
<meta content="en-gb" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link href="style.css" rel="stylesheet" type="text/css" />
</header>


<body>
<div class="headingCSS">
<h2>نشر استبيان</h2>
<div>
<form method="GET" action="/pagae12_addCourseDB.php">
  
  <div class"publish Survey">

<?php

	include("connect.php");
	mysqli_select_db( $conn, "$dbname");
	
	
	// fetch the course id from the url parameter and store inside $Course_ID variable.
	$Survey_ID = $_REQUEST['Survey_ID'];
	// Select Query
	$s='$Survey_ID';
	$sql2 = "UPDATE survey SET State =1 WHERE  Survey_ID = '$s' ";
	
	// Execute the query	
	$result = mysqli_query( $conn, $sql2 )  or die('لم يتمكن من ايجاد معلومات المستخدم; ' . mysqli_error($conn));
	if(! $result ) {
	        die('لم تتمكن عملية التحديث ' . mysqli_error());

   }
   else {
	
			  echo 'تم التحديث<a href="publishSurvey.php">هنا</a> للعودة إلى الصفحة السابقة';

		
   }
   
?>

</div>

</body>
</html>