<?php
session_start();
include("connect.php");
?>

<html>
<header> 
<title>تعديل بيانات دورة </title>
<meta content="en-gb" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link href="style.css" rel="stylesheet" type="text/css" />
</header>


<body>

<div class="headingCSS">
<h2>تعديل بيانات دورة</h2>
<div>

<?php
$Permmission=$_SESSION["Permmission"];
	
//check if the user is admin	
if($Permmission == "Admin")
{
	mysqli_select_db( $conn, "activity_course");
		
		
    $sl ="UPDATE course SET Course_Name = '$_POST[Course_Name]', Course_StrartDate = '$_POST[Course_StrartDate]',
	Course_EndDate = '$_POST[Course_EndDate]', Course_StartTime = '$_POST[Course_StartTime]',
	Course_EndTime = '$_POST[Course_EndTime]', Course_Location = '$_POST[Course_Location]',
	Course_Leader = '$_POST[Course_Leader]', Course_Limit = $_POST[Course_Limit],
	Flag = $_POST[Flag], link = '$_POST[link]',
	description = '$_POST[description]' WHERE Course_ID = $_POST[Course_ID]";


	if ($conn->query($sl) === TRUE)
	{
		echo 'تم تعديل الدورة بنجاح! اذا اردت العودة الى قائمة الدورات اضغط <a href="Courses.php" > هنا </a>';
	}
	/*else 
	{
		echo 'يوجد خطأ, أعد المحاولة: ' . $sl . '<br>' . $conn->error;
		echo '<br>';
		echo ' للعودة الى بيانات الدورة اضغط <a href= "editCourseData.php?post_id=' . $_POST[Course_ID] . ' " > هنا </a>';
	}*/
		
	
}
else
{
	echo "لايمكن عرض محتوى الصفحة, يجب أن تكون أدمن ليتم فتح الصفحة.";
}
?>
               

</body>
</html>