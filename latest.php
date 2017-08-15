<?php
$sql = "SELECT * FROM course WHERE flag=1 order by Course_ID DESC Limit 4";
$result = $conn->query($sql);
?>
<table width=100%><tr>
<?
while($row = $result->fetch_assoc()) {
              
 
             
			 echo"<td align='center'><img src='".$row["link"]." 'width='200' height='200'/>";
            
             echo"<br>   ".$row["Course_Name"];              
            }//end while
?>
</tr></table>