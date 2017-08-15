<!DOCTYPE html>
<?php 
// connect to the database
session_start();

include("connect.php");

?>


<head>
<style>


</style>
<meta content ="en-gh" http-equiv="Content-Language"/>
<meta content ="text/html; charset=utf-8" http-equiv="Content-Type"/>
</head>
<?php
// get the ID
 $id=$_GET['post_id'];

$Permmission=$_SESSION["Permmission"];


//check if is an admin or not 
 if($Permmission =="Admin"){
//the result of this query  is  display all the user and take the attend

$sql = " SELECT User.ID, User.Email, User.Name , User.Permmission,registringcourse.Course_ID, registringcourse.User_ID

FROM User INNER JOIN registringcourse ON User.ID=registringcourse.User_ID 

WHERE registringcourse.Course_ID= '$id'";




//display all the user ID , name , email 
$result = $conn->query($sql);
            //start if for retrieve the result 
			if ($result->num_rows > 0) {
			// start form (save the attend and send variable"$id"Course_ID"" to the next pagge"attendDB.php"  )
			echo"<form action='attendDB.php?post_id=$id' method='post'>";
			//start table	
			echo "<table class='course'>" ;
			echo"<p class='course'> :حضور الدورات </p>";
			echo"<tr>";
			echo"<td> الاسم</td>";
			echo"<td></td>";
			echo"<td></td>";
			echo"<td> الإيميل</td>";
			echo"<td></td>";
			echo"<td></td>";
			echo"<td>تحديد الحضور </td>";
			echo"</tr>";
			echo"<tr></tr>";

			// output data of each row "start while"
			while($row = $result->fetch_assoc()) {
			echo"<tr>";
						echo"<td>".$row["Name"]."</td>";
						echo"<td></td>";
						echo"<td></td>";
						echo"<td>".$row["Email"]."</td>";
						echo"<td></td>";
						echo"<td></td>";
						// array name ID 			
						echo "<td><input type='checkbox' name='ID[]' value='".$row["User_ID"]."'> <label>".$row["User_ID"]."</label></td>";
			echo"</tr>";
			 }//end while
			 
			echo "<td><input type='submit' name='savebottom' Value='حفظ الحضور'/></td>";
			//end table		
			echo"</table>";
			//end form
			echo"</form>";}//end if for retrieve the result 

					
			//there are not any user registering on that course
			 else {
			   echo "<p class='course'>"." لايوجد طلاب مسجلين في هذه الدورة"."</p>";
				}//end else

								 
 }//end if (Admin user)
 
// else the user is  not an admin
 else{
echo "<p class='course'> لا يمكن عرض الحضور </p>";
 }


?>