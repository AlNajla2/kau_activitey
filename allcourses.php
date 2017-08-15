<!DOCTYPE html>
<?php 
// connect to the database
session_start();
include("connect.php");
?>
         
 <?php
 

 
 
 
 
 
//check if is a Regular user or not 

 
//the result of this query  is all the course that the user will be take it later on (active "flag=1")
 
$sql = "SELECT COURSE_Name ,link FROM course WHERE flag=1 ";
 
 
 
 
 
 
$counter = 0;
//display all  courses where (flag=1)
$result = $conn->query($sql);
//check if we have courses or not
if ($result->num_rows > 0) {
echo"<div>";  
echo "<table>" ;
echo"<p> : جميع الدورات </p>";
echo"<tr>   </tr>";
echo"<tr>";
 
    // output data of each row "start while"
   while($row = $result->fetch_assoc())
 {
            if($counter %3==0)
               { echo "</tr>"; 
               }
           

               {//else
             
			 echo"<td>"."<img src='".$row["link"]." 'width='100' height='100'/>";
                          echo"<br>   ".$row["COURSE_Name"].""."";
			  echo "<a href='create_account.php?'> " . " التسجيل في الدورة  " ."</a> </br></td>";
                         echo"<td></td>";
                         echo"<td></td>";
             
                $counter++; 
              }//end else for %3
  }//end while
             
             
    echo "</tr> </table>";
    echo"</div>"; }//end if( if we have coursesor not)
         

 else {//if we don't have courses
    echo "<br>"." لايوجد دورات";
      }//end else
 
   
 
?>

</body>
</html>