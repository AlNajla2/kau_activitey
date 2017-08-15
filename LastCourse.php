
<?php

$ID=$_SESSION["ID"];
$Permmission=$_SESSION["Permmission"];
//check if is a Regular user or not 
 if($Permmission =="RegularUser"){
                       
                      
					  
//the result of this query is all the course that the user have been take it before ( non active "flag=0") 
 
$sql = "SELECT User.ID, COURSE.link, User.Name ,COURSE.Course_ID, COURSE.COURSE_Name

FROM User INNER JOIN registringcourse ON User.ID=registringcourse.User_ID 

INNER JOIN COURSE ON registringcourse.Course_ID= COURSE.Course_ID

WHERE COURSE.Flag =0  AND User.ID='$ID'";

					


$counter = 0;
//display all the last course
$result = $conn->query($sql);
//check if the user have last course or not 
if ($result->num_rows > 0) {
echo"<div>";
echo "<table class='course' >" ;
echo"<tr><td colspan=3> <p class='course'> :الدورات السابقة</p>  </tr>";
echo"<tr>";
// output data of each row
    while($row = $result->fetch_assoc()) {
			if($counter %3==0  && $counter!=0){
			echo "</tr><tr>"; 	
			}
			{
			 echo"<td>"."<img src='".$row["link"]." 'alt='image for course' width='100' height='100'/>";		 				 
			 echo"<br>".$row["COURSE_Name"]."</br>"."</td>";			
			 $counter++; 
			}
			}//end while
			
			
	echo "</tr> </table>"; 
    echo"</div>";	}//end if(the user have last course or not )
		
//the user did not take any course before	
            else {
    echo "<br>"." لا توجد دورات سابقة";
                 }//end else
					 
 }//end if (Regular user)
 
// else the user is an admin
 else{
echo "<p class='course'> لا يمكن عرض الدورات السابقة</p>";;
 }


?>
</body>
</html>
