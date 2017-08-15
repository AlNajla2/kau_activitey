<?php 
// connect to the database
session_start();
 
include("connect.php");

$Permmission=$_SESSION["Permmission"];
	
	//check if the user is admin
	
	if($Permmission == "Admin")
	{
		
?>
<html>
<header> 
<title> </title>
<meta content="en-gb" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link href="style.css" rel="stylesheet" type="text/css" />
</header>


<body>
<div class="headingCSS">
<h2>إضافة دورة</h2>
</div>

<form method="POST" action="addCourseDB.php" id="register"> 
  <fieldset>
 
	  <label class="blockLabel" for="Course_Name" >          
       <span>*</span> اسم الدورة
      </label>
        <input name="Course_Name"  id = "Course_Name" type="text"  /> 
			<br />
			
		<!-- -->
		 
		<label class="blockLabel" for="Course_StrartDate" >          
         <span>*</span>تاريخ البدء 
		</label>
			<input name="Course_StrartDate" id = "Course_StrartDate" type="text"  /> 
				<br />

		<!-- -->
		 
		<label class="blockLabel" for="Course_EndDate" >          
         <span>*</span>تاريخ الانتهاء 
		</label>
			<input name="Course_EndDate" id = "Course_EndDate" type="text"  /> 
				<br />
				
		<!-- -->
		 
		<label class="blockLabel" for="Course_StartTime" >          
         <span>*</span> وقت البدء  
		</label>
			<input name="Course_StartTime" id = "Course_StartTime" type="text"  /> 
				<br />		

		<!-- -->
		 
		<label class="blockLabel" for="Course_EndTime" >          
         <span>*</span>وقت الانتهاء 
		</label>
			<input name="Course_EndTime" id = "Course_EndTime" type="text"  /> 
				<br />	
				
		<!-- -->
		 
		<label class="blockLabel" for="Course_Location" >          
         <span>*</span>الموقع 
		</label>
			<input name="Course_Location"  id = "Course_Location" type="text"  /> 
				<br />
		 <!-- -->
		<label class="blockLabel" for="Course_Leader" >          
        <span>*</span>اسم المحاضر  
		</label>
			<input name="Course_Leader" id = "Course_Leader" type="text"  /> 
				<br />	

		 <!-- -->
		 
		<label class="blockLabel" for="Course_Limit" >          
         <span>*</span>عدد الاكتفاء 
		</label>
			<input name="Course_Limit" id = "Course_Limit" type="text"  /> 
				<br />		

		<!-- -->
		
		<label class="blockLabel" for="link" >          
         <span>*</span>رابط الصورة المصغرة 
		</label>
			<input name="link" id = "link" type="text"  /> 
				<br />
				
		 <!-- -->
		 
	
		<label class="blockLabel" for="original_link" >	
         <span>*</span>رابط الحجم الاصلي للصورة
		</label>
			<input name="original_link" id = "original_link" type="text"  /> 
				<br />
				
			<!-- -->
			
		<label class="blockLabel" for="description" >          
        ملاحظات  
		</label>
			<textarea name="description" rows="10" cols="30"> </textarea>
	
	<br><br>
    <input type="submit" value="إضافة">
  </fieldset>
</form>

<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
<script type="text/javascript" >

$(document).ready(function() {
	
	// additional method for accepting only alphabetical characters
	jQuery.validator.addMethod("lettersonly", function(value, element) {
	return this.optional(element) || /^[ا-يa-z' ']+$/i.test(value);
	}, "Letters only please");
	
	// additional method for accepting time in this syntax "dd:dd"
	jQuery.validator.addMethod("Time", function(value, element) {
    if (!/^\d{2}:\d{2}$/.test(value)) return false;
    var parts = value.split(':');
    if (parts[0] > 23 || parts[1] > 59 ) return false;
    return true;
	}, "Invalid time format.");
	
	// validate call
	$("#register").validate({
		rules: {
			Course_Name:{
				required: true
			},
			Course_StrartDate: {
				required: true,
				date: true
				},
			Course_EndDate: {
				required: true,
				date: true
				},
			Course_StartTime: {
				required: true,
				Time: true
				},
			Course_EndTime: {
				required: true,
				Time: true
				},
			Course_Location:{
				required: true
				},
			Course_Leader:{
				required: true,
				lettersonly: true
				},
			Course_Limit: {
				required: true,
				number: true
				},
			link: {
				required: true, 
				accept: "jpg|jpeg|png|gif"
				},
			original_link: {
				required: true, 
				accept: "jpg|jpeg|png|gif"
				}
				
		}, // rules close 
		messages: {
			Course_Name:{
				required: 'يرجو كتابة اسم الدورة'
				},
			Course_StrartDate: {
				required: 'يرجى وضع تاريخ البدء',
				date: 'يرجو كتابة التاريخ ابتداء برقم الشهر'
				},
			Course_EndDate: {
				required: 'يرجو وضع تاريخ الانتهاء',
				date: 'يرجو كتابة التاريخ ابتداء برقم الشهر'
				},
			Course_StartTime: {
				required: 'يرجو ادخال رقم',
				Time: 'يسمح فقط بادخال الارقام على هذا النحو (23:59)'
				},
			Course_EndTime: {
				required: 'يرجو ادخال رقم',
				Time: 'يسمح فقط بادخال الارقام على هذا النحو (23:59)'
				},
			Course_Location:{
				required: 'يرجو كتابة اسم الموقع'
				},
			Course_Leader:{
				required: 'يرجو كتابة اسم المحاضر',
				lettersonly: 'يسمح فقط بادخال حروف'
				},
			Course_Limit: {
				required: 'يرجو ادخال رقم',
				number: 'يسمح فقط بادخال ارقام'
				},
			link: {
				required: 'يرجو وضع رابط للصورة',
				accept: 'يرجو وضع رابط الصورة بالصيغة الصحيحة'
			},
			original_link: {
				required: 'يرجو وضع رابط للصورة',
				accept: 'يرجو وضع رابط الصورة بالصيغة الصحيحة'	
			}
		} // messages close
	}); // validate call close
}); // function close
</script>

<?php
 }
else
{
			echo "لايمكن عرض محتوى الصفحة, يجب أن تكون أدمن ليتم فتح الصفحة";
}

 ?>

</body>
</html>