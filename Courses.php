<?php
session_start();
include("connect.php");


?>

<html>

<head>
<title> جميع الدورات </title>
<meta content="en-gb" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="headingCSS">
<h2> جميع الدورات </h2>
</div>

<?php
$Permmission = $_SESSION["Permmission"];
	
//check if the user is admin	
if($Permmission == "Admin")
{
	// Select database
	mysqli_select_db($conn, 'activity_course'); 

	//query
	$sql = "SELECT Course_ID, Course_Name FROM course";

	//result of the query
	$result = mysqli_query($conn, $sql) or die('لم يتمكن من ايجاد معلومات المستخدم; ' . mysqli_error($conn));

	if (mysqli_num_rows($result) > 0)
	{
		echo "<table>";
		echo "<tr>";

		// mysqli_fetch_array 
		while ($row = mysqli_fetch_array($result)) 
		{
			echo "<tr>";
			echo '<td>' . $row['Course_Name'] . '</td>';
			echo '<td><a href="editCourseData.php?post_id=' . $row['Course_ID'] . '"> تعديل </a> </td>';
			echo '<td><a href="deleteCourseDB.php?post_id=' . $row['Course_ID'] . '"> حذف </a> </td>';
			echo '<td><a href="attnd.php?post_id=' . $row['Course_ID'] . '"> حضور </a> </td>';
			echo "</tr>";
		}
				
		echo "</tr>";
		echo "</table>";
	}
	else 
	{
		echo "لا توجد أي دورة مسجلة";
	}
}
else
{
	echo "لايمكن عرض محتوى الصفحة, يجب أن تكون أدمن ليتم فتح الصفحة.";
}

?>

</body>
</html>