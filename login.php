<?php

if(isset($_POST['submit']))
{
	
	$Password=$_POST['Password'];
	$Email=$_POST['Email'];


		
	         $sql=" select * from user WHERE Password= '$Password' AND Email = '$Email' limit 1";
             $result = mysqli_query($conn,$sql);
	         $resultCheck = mysqli_num_rows($result);
			 //not in db
	 	if ($resultCheck < 1) {
			
			echo '<script type="text/javascript">alert("البريد الإلكتروني او الرقم السري غير صحيح")</script>';
			
			//in db
		} else {
			if ($row = mysqli_fetch_assoc($result)) {

					//Log in the user here
					$_SESSION['Email'] = $row['Email'];
					$_SESSION['Name'] = $row['Name'];
					$_SESSION['ID'] = $row['ID'];
					$_SESSION['Permmission'] = $row['Permmission'];
					 
					
					 //check Permmission
					 //if admin  redirect to admin.php
					 if($Permmission =="Admin"){

                          header("Location:index.php?page=adminPage"); 

                       }else{

                           header("Location:index.php?page=userProfile"); 

                            }
			}
		}
    
}else {
	
} 
?>


<center >





<form action="index.php?page=login" id="loginform" method="POST">
<h3>تسجيل دخول</h3>
<br>
البريد الإلكتروني:<input type="email"    name="Email"     placeholder="البريد الإلكتروني"><br><br>	
الرقم السري:<input type="password" name="Password"  placeholder="الرقم السري"><br><br>
   


<input type="submit" value="دخول" name="submit" /><br>
<a href="index.php?page=forget_pass"> نسيت الرقم السري؟ </a>

</form>

</center>
	
<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script type="text/javascript" >

$(document).ready(function(){
	
$("#loginform").validate({
		
		rules:{
			
			
			Password:{
				required:true,
				minlength:4
			},
		
				Email:{
					required:true,
					email:true
				}
				
			},
			
			messages:{
			
			
			
			Password:{
			
				required:" هذا الحقل مطلوب" ,
				minlength:"يجب أن تكون كلمة المرور الخاصّة بك 4 أحرف على الأقل"
			},
			
				Email:{
				
					required:" هذا الحقل مطلوب" ,
					email:"يُرجى إدخال بريد إلكترونيّ صحيح"
				}
				

			
			}
			

	});
	
	
});
</script>


