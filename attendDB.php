<!DOCTYPE html>
<html>
<head>
<title>تسجيل دخول</title>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
// connect to the database
include("connect.php");
$CourseID=$_GET['post_id'];
//start if
if(isset($_POST['savebottom'])){
//array of ID
$Attend=$_POST['ID'];
//ues function implode (if the admain check 1,2 user ID it will take these number and update their attend together )	
$StoreAttend=implode(",",$Attend);
//query for update attend 
$sql2="UPDATE registringcourse SET Attend =1 WHERE Course_ID='$CourseID' AND  User_ID IN ($StoreAttend)";		
$result2 = $conn->query($sql2);
//
echo "<p class ='course'>"."تم حفظ الحضور"."</p>";	
}//end if
//else
else{
echo "<p class='course'>"."يوجد خطأ الرجاء العودة إلى الصفحة السابقة"."</p>";	
}


?>
</html>