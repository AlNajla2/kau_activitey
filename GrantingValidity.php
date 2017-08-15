<?php



// connect to the database
session_start();
  
include("connect.php");
 
$ID=$_SESSION["ID"];
   $Permmission=$_SESSION["Permmission"];
     
    //check if the user is admin
     
    if($Permmission == "RegularUser"){
     
            echo "لايمكن عرض محتوى الصفحة, يجب أن تكون أدمن ليتم فتح الصفحة.";
            header("Location:GrantingValidityDB.php"); 
        }
?>
<html>

<head>
<style>
Body {Direction: rtl;}
.error {color: #FF0000;}

input[type=text1] {
width: 60%;
  height: 100px;
}
input[type=text] {
width: 60%;
  
}
input[type=email] {
width: 50%;
  
}
fieldset{
	width: 60%;
}
</style>
 <meta content="en-gb" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
</head>


<body>

<div  class="headingCSS" >
<p>	<strong> منح صلاحية</strong> </p>	
</div>


 <fieldset>
<p><span class="error">* حقل مطلوب..</span></p>

<form method="POST" action="GrantingValidityDB.php" >

 <p>
<label> البريد الالكتروني : </label>
<input type="text" name="Email" placeholder="" value="" > 
</p>





 </fieldset>
 
  <br><br>
  <input type="submit" name="submit" value="ارسال">  
 
   </form>
  
  	



</body>

</html>