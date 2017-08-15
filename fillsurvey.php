<!DOCTYPE html>
<?php 
// connect to the database
session_start();
 
include("connect.php");
?>
 
 
<head>

<meta content ="en-gh" http-equiv="Content-Language"/>
<meta content ="text/html; charset=utf-8" http-equiv="Content-Type"/>
</head>
<?php
 
$ID=$_SESSION["ID"];
//$attendence=$_SESSION["attendence"];
//check if is a attendence is one or not 
$Permmission=$_SESSION["Permmission"];

  if($Permmission =="RegularUser"){
//the result of this query  is all the survey that the user will be take the course
 //,survay.Course_ID 
//
 // 
//
$sql = "SELECT user.ID , registringcourse.User_ID, registringcourse.attendence, registringcourse.Course_ID, course.Course_Name 

FROM user INNER JOIN registringcourse ON user.ID=registringcourse.User_ID 
INNER JOIN COURSE ON registringcourse.Course_ID= COURSE.Course_ID
INNER JOIN survey  ON registringcourse.Course_ID= survey.Course_ID  
 WHERE  registringcourse.attendence = 1 AND user.ID='$ID' ";
 
 
  //if($attendence ="1"){

 
 
 
 
$counter = 0;
//display all the survey 
$result = $conn->query($sql);
//check if the user have current course or not 
if ($result->num_rows > 0) {
echo"<div>";  
echo "<table>" ;
echo"<p> الاستبيانات </p>";
echo"<tr>   </tr>";
echo"<tr>";
 
    // output data of each row "start while"
   while($row = $result->fetch_assoc()) {
            if($counter %3==0){
            echo "</tr>";     
            }
            {
                              
			 echo"<br>".$row["Course_Name"]."</br>"."</td>";
             echo"<td><a href=''>اضغط هنا لتعبئة الاستبيان.....</a></td>";
             echo"<td></td>";
             
             $counter++; 
            }
            }//end while
             
             
    echo "</tr> </table>";
    echo"</div>"; }//end if(the user have current course or not )
         
//the user does not take any course current 
 else {
    echo "<br>"."لم تحضر الدورة";
      }//end else
 
                      
 }//end if (Regular user)
  
// else the user is an admin
else{
	echo"";
}

 
 
?>