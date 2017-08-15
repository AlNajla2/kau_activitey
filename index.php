<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <link rel="stylesheet" href="girls/SPages.css">
  <head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<title>المنصة</title>
</head>
<body dir=rtl >
<? include("girls/connect.php");
$page= $_GET['page'];
session_start();
?>
<table width=100%  height=100%>
<tr height=5%><td>   <br></tr>
<tr height=790>
<td class="mainU" width=15% valign="top"> 
	<!-- navigation -->
		<table width=100% border=0>
			<tr>
				<td align="center"><br><a href="indexU.php"><img src="images/logo.png" ></a><br>
			</tr>
			<tr><td><table class="MainNav" width=100%>
			<tr>
				<td class="nav"> أنشطة الوكالة
			</tr>
			<tr>
				<td class="nav"> البرامج
			</tr>
			<tr>
				<td class="nav"> تقييم البرامج التدريبية
			</tr>
			<tr>
				<td class="nav"> الملفات والفيديو
			</tr>
			<tr>
				<td class="nav"> النماذج
			</tr>
			<tr>
				<td class="nav"> بنك الأفكار
			</tr>
			<tr>
				<td class="nav"> سجلي موهبتك
			</tr>
			<tr>
				<td class="nav"> نجمة الجامعة
			</tr>
			<tr>
				<td class="nav"> أسئلة متكررة
			</tr>
		</table></tr></table>
	<!-- End navigation -->
<td width=1%>
<td class="mainU" valign="top" align="center">
	<table width=100%>
		<tr>
			<td align="center" height="100"><table width=100% height=100% class="mainHead"><tr><td class="mainHead" > <img src="images/mainHeader.png" width="350"></tr></table>
		</tr>
	<tr><td>
		<table width=100%>
		<tr><td align="left">
		<?
		if($_SESSION['Name'])
		{
		print "<a href='index.php?page=userProfile'>الملف الشخصي </a>لـ". $_SESSION['Name'];
		print " - <a href='index.php?page=logout'>تسجيل خروج</a>";
		}
		else
		{
		?>
		<a href="index.php?page=login">تسجيل دخول </a>
		- 
		<a href="index.php?page=create_account"> مستخدم جديد </a>
		<?
		}
		?>
		</tr>
<!-- Pages -->
<?switch($page)
{
    case 'login':
	 { print "<tr><td class='inner_page'>";
		include ("girls/login.php");
		"</tr >";
        break;
	 }	
    case 'create_account':
     { print "<tr><td class='inner_page'>";
		include ("girls/create_account.php");
		"</tr >";
        break;
	 }	
    case 'userProfile':
    { print "<tr><td class='inner_page'>";
		include ("girls/userProfile.php");
		"</tr >";
        break;
	}	
	case 'last_course':
    { print "<tr><td class='inner_page'>";
		include ("girls/LastCourse.php");
		"</tr >";
        break;
	}	
	case 'current_course':
    { print "<tr><td class='inner_page'>";
		include ("girls/CurrentCourse.php");
		"</tr >";
        break;
	}	
	case 'logout':
    { print "<tr><td class='inner_page'>";
		include ("girls/Logout.php");
		"</tr >";
        break;
	}	
    default:
	{
?>				
		<tr><td align="center"><?php
		include ("indexAd.html");
		?> </tr>
		<tr><td>
			<table width=100%>
			<tr>
			<td align="center"><br> آخر البرامج
			</tr>
			<tr><td>
			<?php
		include ("latest.php");
		?>
			</tr>
			</table>	
		</tr>
<?
	}
}
?>	
<!-- End Pages -->		
		</table>
	</tr>
	</table>

<td width=7%>  
</tr>

<tr height=50><td><td><td>
<!-- footer -->
<table width=100%>
<tr>
<td class=footer> جميع الحقوق محفوظة لوكالة عمادة شؤون طلاب لأنشطة الطالبات - جامعة الملك عبدالعزيز &copy; 2017
<td align="left" valign="bottom">
	<table>
	<tr>
		<td><a href="mailto:dsag.vdsa.mol@kau.edu.sa"><img src="images/download.png" width=40></a>
		<td><a href=""><img src="images/download2.png" width=40></a>
		<td><a href="https://www.facebook.com/%D9%88%D9%83%D8%A7%D9%84%D8%A9-%D8%B9%D9%85%D8%A7%D8%AF%D8%A9-%D8%B4%D8%A4%D9%88%D9%86-%D8%A7%D9%84%D8%B7%D9%84%D8%A7%D8%A8-%D9%84%D8%A3%D9%86%D8%B4%D8%B7%D8%A9-%D8%A7%D9%84%D8%B7%D8%A7%D9%84%D8%A8%D8%A7%D8%AA-282159401796366/"><img src="images/download3.png" width=40></a>
		<td><a href="http://twitter.com/KAUDesigner"><img src="images/download4.png" width=40></a>
		<td><a href=""><img src="images/download5.png" width=40></a>
	</tr>
	</table>
</tr>
</table>
<!-- End footer -->
<td>
</tr>
</table>
</body>

</html>