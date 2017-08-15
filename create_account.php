<?php
	session_start();
	include("connect.php");
	
          if(isset($_POST['register']))
			{
				$Name=$_POST['Name'];
				$Phone_No=$_POST['Phone_No'];
				$Email=$_POST['Email'];
				$Password=$_POST['Password'];
				
				
				//Check duplicate of email
				$query = "select * from user where Email='$Email'";
				
				$query_run = mysqli_query($conn,$query);
				
				if($query_run)
					{
						
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("البريد الإلكتروني مسجل مسبقا!!")</script>';
							
						}
						// insert to db new user
						else
						{
				            $query = "insert into user values('', '$Name', '$Phone_No','$Email','$Password','','');";
							
			                $query_run = mysqli_query($conn,$query);
							
							if($query_run)
							{
								echo '<script type="text/javascript">alert("تم التسجيل بنجاح ...مرحبا")</script>';

							}
							else
							{
								echo '<p class="bg-danger msg-block">لم يتم التسجيل ..مشكلة في النظام .. الرجاء المحاولة مرة أخرى</p>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("مشكلة في قاعدة البيانات")</script>';
					}
				
				
				
			}
			else
			{
			}
?>

<!DOCTYPE html>

<html>

<head>

<title>إنشاء حساب</title>

<link rel="stylesheet" href="css/main.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="en-gb" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />

</head>

<body>

<center>

<h3>إنشاء حساب</h3>

<form action="create_account.php" id="rigesterform" method="POST">

<fieldset>
الإسم الثلاثي:<input type="text" name="Name" placeholder=" الإسم الثلاثي"><br><br><br>
رقم الجوال :<input type="text"  name="Phone_No" placeholder="0xxxxxxxxx "><br><br><br>
البريد الإلكتروني :<input type="email"  name="Email" placeholder=" البريد الإلكتروني"><br><br><br>
الرقم السري :<input type="password"  name="Password" placeholder=" الرقم السري"><br><br><br>
</fieldset>

<button name="register"  type="submit">إنشاء حسابي</button>
<p> مسجل مسبقا؟ <a href="login.php"> تسجيل دخول </a></p>

</form>

</center>

	
<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js""></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>

<script type="text/javascript" >

$(document).ready(function(){
	
    jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[أ-يa-zA-Zءآ]+[ ][أ-يa-zA-Zءآ]+[ ][أ-يa-zA-Zءآ]+$/i.test(value);
    }, "Letters only please");
	
$("#rigesterform").validate({
		
		rules:{
			Name:{
				required:true,
				lettersonly:true
			},
			
			Password:{
				required:true,
				minlength:4
			},
			Phone_No:{
			required:true,
			phoneNL: true
			
			
			},
				Email:{
					required:true,
					email:true
				}
				
			},
			
			messages:{
			
				Name:{
				
				required:" هذا الحقل مطلوب" ,
				lettersonly:"يجب أن تدخل اسمك الثلاثي "
			},
			
			Password:{
			
				required:" هذا الحقل مطلوب" ,
				minlength:"يجب أن تكون كلمة المرور الخاصّة بك 4 أحرف على الأقل"
			},
			Phone_No:{
			
			required:" هذا الحقل مطلوب" ,
			phoneNL: "يرجى إدخال رقم هاتف صحيح " 
			
			
			},
				Email:{
				
					required:" هذا الحقل مطلوب" ,
					email:"يُرجى إدخال بريد إلكترونيّ صحيح"
				}
				
			
			
			
			
			}
			
			
						
			
		
	});
	
	
});
</script>

</body>

</html>
