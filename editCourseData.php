<?php
session_start();
include("connect.php");
?>
<html>

<head>
<title> تعديل بيانات دورة </title>
<meta content="en-gb" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link href="style.css" rel="stylesheet" type="text/css" />
<style> Body{Direction:rtl;} </style>
</head>

<body>

<div class="headingCSS">
<h2> تعديل بيانات دورة</h2>
<div>

<?php
$Permmission=$_SESSION["Permmission"];
	
//check if the user is admin
if($Permmission == "Admin")
{
	// Select database
	mysqli_select_db($conn, 'activity_course'); 
	
	// get the ID
	$_GET['post_id'];

	$sql = "SELECT * FROM course WHERE Course_ID = $_GET[post_id] LIMIT 1";

	$result = mysqli_query($conn, $sql) or die('لم يتمكن من ايجاد معلومات المستخدم; ' . mysqli_error($conn));

	$row = mysqli_fetch_assoc($result);

?>


<form method="POST" action="editCourseDataDB.php" id="editCourse" >
    <fieldset>
<p>
<label> اسم الدورة : </label>
<input type="text" name="Course_Name" id = "Course_Name" value="<?php echo $row['Course_Name']; ?>" > 
</p>

<p>
<label> تاريخ البدء : </label>
<input type="text" name="Course_StrartDate" id = "Course_StrartDate" value="<?php echo $row['Course_StrartDate']; ?>">
</p>

<p>
<lable> تاريخ الإنتهاء : </lable> 
<input type="text" name="Course_EndDate" id = "Course_EndDate" value="<?php echo $row['Course_EndDate']; ?>">
</p>

<p>
<lable> وقت البدء : </lable> 
<input type="text" name="Course_StartTime" id = "Course_StartTime" value="<?php echo $row['Course_StartTime']; ?>">
</p>

<p>
<lable> وقت الإنتهاء : </lable> 
<input type="text" name="Course_EndTime" id = "Course_EndTime" value="<?php echo $row['Course_EndTime']; ?>">
</p>

<p>
<lable> الموقع : </lable> 
<input type="text" name="Course_Location" id = "Course_Location" value="<?php echo $row['Course_Location']; ?>">
</p>

<p>
<lable> اسم المحاضر : </lable> 
<input type="text" name="Course_Leader" id = "Course_Leader" value="<?php echo $row['Course_Leader']; ?>">
</p>

<p>
<lable> عدد الإكتفاء : </lable> 
<input type="text" name="Course_Limit" id = "Course_Limit"  value="<?php echo $row['Course_Limit']; ?>">
</p>

<p>
<lable> رابط الصورة : </lable> 
<input type="text" name="link" id = "link" value="<?php echo $row['link']; ?>">
</p>

<p>
<lable> ملاحظات : </lable> 
<textarea type="text" name="description" rows="10" cols="30" value="<?php echo $row['description']; ?>"></textarea> 
</p>

<p>
<lable> تفعيل الدورة : </lable> 
<label for="Flag" class="error"> الرجاء اختيار حالة الدورة </label>
</p>
<p>
  <input type="radio" name="Flag" id="Course_Flag" value="1"> مفعله
  <input type="radio" name="Flag" id="Course_Flag" value="0"> غير مفعلة 
</p> 

<!-- <p> <button type="submit" name="" value="1" > حفظ التغييرات </button> </p> -->
<p> <input type="submit" value="حفظ التغييرات"> </p>
<input type="hidden" name="Course_ID" value="<?php echo $row['Course_ID']; ?>"> <!-- to choose the right row of the table course -->
</fieldset>
</form>

<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
<script type="text/javascript" >

$(document).ready(function() {
	
	// additional method for accepting only alphabetical characters
	jQuery.validator.addMethod("lettersonly", function(value, element) 
	{
		return this.optional(element) || /^[a-z]+$/i.test(value);
	}, "Letters only please");
	
	// additional method for accepting time in this syntax "dd:dd"
	jQuery.validator.addMethod("Time", function(value, element) 
	{
		if (!/^\d{2}:\d{2}$/.test(value)) return false;
		var parts = value.split(':');
		if (parts[0] > 23 || parts[1] > 59 ) return false;
		return true;
	}, "Invalid time format.");

	// validate call
	$("#editCourse").validate
	({
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
			Flag: {
				required: true
				}
		}, // rules close 
		messages: {
			Course_Name:{
				required: '   * يرجى كتابة اسم الدورة'
				},
			Course_StrartDate: {
				required: '   * يرجى وضع تاريخ البدء',
				date: '   * يرجو كتابة التاريخ ابتداء برقم الشهر'
				},
			Course_EndDate: {
				required: '   * يرجى وضع تاريخ الانتهاء',
				date: '   * يرجى كتابة التاريخ ابتداء برقم الشهر'
				},
			Course_StartTime: {
				required: '   * يرجى ادخال رقم',
				Time: '   * يسمح فقط بادخال الارقام على هذا النحو (23:59)'
				},
			Course_EndTime: {
				required: '   * يرجى ادخال رقم',
				Time: '   * يسمح فقط بادخال الارقام على هذا النحو (23:59)'
				},
			Course_Location:{
				required: '   * يرجى كتابة اسم الموقع'
				},
			Course_Leader:{
				required: '   * يرجى كتابة اسم المحاضر',
				lettersonly: '   * يسمح فقط بادخال حروف'
				},
			Course_Limit: {
				required: '   * يرجى ادخال رقم',
				number: '   * يسمح فقط بادخال ارقام'
				},
			link: {
				required: '   * يرجى وضع رابط للصورة',
				accept: '   * يرجى وضع رابط الصورة بالصيغة الصحيحة'
				},
			Flag: {
				required: '   *  يرجى اختيار احدى خيارات تفعيل الدورة'
				}
		} // messages close
	}); // validate call close
}); // function close
</script>

<?php
}
else
{
	echo "لايمكن عرض محتوى الصفحة, يجب أن تكون أدمن ليتم فتح الصفحة.";	
}
?>
</body>


</body>
</html>
