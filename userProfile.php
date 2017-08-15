
<div class="headingCSS">
<h2> ملفي الشخصي </h2>
</div>
<?php

	
//check if the user is regular user	
if($_SESSION['Permmission'] == "RegularUser")
{
	echo '<table width="600">
		<tr>
			<td> <img src="images/survey_icon.png" > </td>
			<td> <img src="images/last_course_icon.png" > </td> 
			<td> <img src="images/current_course_icon.png" > </td>
			<td> <img src="images/edit_profile.png" > </td>
		</tr>';

		echo'<tr>';
			echo'<td> <a href="index.php?page="> الاستبيانات الغير مكتملة </a> </td>';
			echo'<td> <a href="index.php?page=last_course"> دوراتي السابقة </a> </td> ';
			echo'<td> <a href="index.php?page=current_course"> دوراتي المسجلة </a> </td>';
			echo'<td> <a href="index.php?page=edit_profile"> تعديل ملفي الشخصي </a> </td>';
		echo'</tr>';
  
	echo'</table>';
}
else {
	echo "لا يمكن عرض محتوى الصفحة, يجب ان تكون مستخدم عادي ليتم فتح الصفحة";	
}
?>
