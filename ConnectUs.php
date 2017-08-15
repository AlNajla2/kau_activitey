
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
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
	<body>

	

<p>	<strong> تواصل معنا </strong> </p>	

 <fieldset>

 
<p>	 .اهلا بك,يسعدنا أن نستقبل اقتراحاتك و نجيب عن أي استفسار أو سؤال <br>
فضلا قم بتعبئة النموذج التالي لنتمكن من الرد على رسالتك في أقرب وقت  <br></p>
  
  

<p><span class="error">*  حقل مطلوب.</span></p>
<form method="post" action=" ConnectUs.php"id="register"> >  
  <p>الاسم: <input type="text" name="name" id="name"   required >
  <span class="error">* .</span> </p>
  <br><br>
<p>البريد الإلكتروني: <input name="email" type="text"  id="email" required >
<span class="error">* .</span> 
 <br><br>
</p>
<p>
  الرسالة: <textarea name="message" rows="5" cols="40"  id="message" required></textarea>
  <span class="error">* .</span>  <br><br>
  <br><br>
</p>


 </fieldset>
  <br><br>
  <input type="submit" name="submit" value="ارسال">  

 
  

  </form>
 </fieldset>


<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
<script type="text/javascript" >
 
$(document).ready(function() {
     
    // additional method for accepting only alphabetical characters
    jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[أ-ي ]+$/i.test(value);
    }, "Letters only please");
     

     
    // validate call
    $("#register").validate({
        rules: {
            name:{
                required: true,
				 lettersonly: true
            },
			message:{
                required: true
               
                },
           
            email: {
                required: true, 
                email:true 
                }
				  
        },
		// rules close

        messages: {
            name:{
                required: 'يرجو كتابة الاسم',
			  lettersonly: ' يسمح فقط بادخال حروف  '
                },
				  message:{
                required: 'يرجو كتابة الرسالة'

                },
            
            email: {
                required: ' يرجو كتابة البريد',
                email: 'يرجو كتابة البريد بالصيغة الصحيحة'
			
            },
        } // messages close
    }); // validate call close
}); // function close
</script>



<?php
$to = "atheer.fit@gmail.com"; // Recipient (change to your e-mail address) 
	$strSubject = "hi";// Get user inputs
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$strMessage = $_POST["message"];	
   $headers = $_POST['email'];
	//mail($to,$strSubject,$strMessage , $headers );
	echo "Mail Sent.";
	
	}
echo "<h2>Your Input:</h2>";
echo $_POST["name"];
echo "<br>";
echo $_POST["email"];
echo "<br>";
echo $_POST["message"];
	
?>

	
	
	
	
	
	</body>
	</html>
	