<?php
// connect to the database
session_start();
include("connect.php");
?>

<html>
<head> 

<meta content="en-gb" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
</head>


<body>
 
  
  





<?php
 $ID=$_SESSION["ID"];
 $Permmission=$_SESSION["Permmission"];
     
    //check if the user is admin
     
if($Permmission == "RegularUser")
        {
            echo "لايمكن عرض محتوى الصفحة, يجب أن تكون أدمن ليتم فتح الصفحة.";
        }
else {
      $s=$_POST['Email'];
      $sql =" UPDATE user SET Permmission = 'admin' WHERE Email= '$s' ";

        // Attempt update query execution
       if($conn->query($sql) === TRUE) {
            echo "تم تحديث السجلات بنجاح .";
                                         }  
       else  {
       echo 'يوجد خطأ, أعد المحاولة: ' . $sql . '<br>' . $conn->error;
       echo '  إضغط  <a href="GrantingValidity.php">هنا</a> للعودة إلى الصفحة السابقة';
            }
    }//end else is admin
// Close connection
//$conn->close();
	
?>


</body>
</html>