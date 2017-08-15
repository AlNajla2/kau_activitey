<?php
session_start();
include("connect.php");
?>
<html>
<head> 
<title>اضافة دورة</title>
<meta content="en-gb" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>


<body>
<div class="headingCSS">
<h2>إضافة دورة</h2>
</div>

<div id="main">

<?php
	
	
	$Permmission=$_SESSION["Permmission"];
	
	//check if the user is admin
	
	if($Permmission == "Admin"){
		
		
				
		mysqli_select_db( $conn, "$database");
	
                $Course_Name = $_POST['Course_Name'];
                $Course_StrartDate= $_POST['Course_StrartDate'];
                $Course_EndDate = $_POST['Course_EndDate'];
				$Course_StartTime=$_POST['Course_StartTime'];
                $Course_EndTime=$_POST['Course_EndTime'];
                $Course_Location=$_POST['Course_Location'];
                $Course_Leader= $_POST['Course_Leader'];
                $Course_Limit= $_POST['Course_Limit'];
                $link= $_POST['link'];
				$original_link = $_POST['original_link'];
                $description= $_POST['description'];

                $sl = "INSERT INTO course(Course_Name,Course_StrartDate,Course_EndDate,Course_StartTime,Course_EndTime
				,Course_Location,Course_Leader,Course_Limit,link,original_link,description)
                VALUES('$Course_Name','$Course_StrartDate','$Course_EndDate','$Course_StartTime','$Course_EndTime',
				'$Course_Location','$Course_Leader','$Course_Limit','$link','$original_link','$description')";
				
            

				if ($conn->query($sl) === TRUE) {
				echo ' تم إضافة الدورة بنجاح, اضغط <a href="addCourse.php">هنا</a> للعودة إلى الصفحة السابقة';
				} else {
				echo "يوجد خطأ, أعد المحاولة: " . $sl . "<br>" . $conn->error;
				}		
		}
		else {
				echo "لايمكن عرض محتوى الصفحة, يجب أن تكون أدمن ليتم فتح الصفحة";
		}
                ?>

</div>

</body>
</html>