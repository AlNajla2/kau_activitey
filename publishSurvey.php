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
<form method="GET" action="/publishSurveyDB.php">
  
  <div class"publish Survey">

  	<?php

	include("connect.php");
	// Select database
	mysqli_select_db( $conn, "$dbname");
	
	// Select Query
	$sql = "SELECT course.Course_Name,course.Course_ID,survey.state FROM survey INNER JOIN course ON survey.Course_ID = course.Course_ID";
	
	// Execute the query
	$result = mysqli_query($conn, $sql) or die('لم يتمكن من ايجاد معلومات المستخدم; ' . mysqli_error($conn));
	
	if (mysqli_num_rows($result) > 0) {
		echo "<table>";
		echo "<tr>";
		while($row = mysqli_fetch_array($result)) 
		{
			//echo "<td valign=top>";
			print_course($row);
		}
		echo "</tr>";
		echo "</table>";
	}
	else {
		echo "لا يوجد استبيان";
	}
	mysqli_close($conn);
	
	function print_course($row) {
		echo "<tr>";
		echo '<td  text-align:center;">'.$row["Course_Name"].'</td>';
		echo '<td><a href="publishSurveyDB.php?Course_ID=' .$row["Course_ID"] .'"> نشر </a></td>';
		echo "</tr>";
	}

?>
</div>

</body>
</html>