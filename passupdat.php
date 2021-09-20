<?php
session_start();
if(!isset($_SESSION["mail"])){
	header("location:index.html");
}
?>
<html>
	<head>
		<title>Update Password - Feedback</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="uppas.css">
		<script src="https://kit.fontawesome.com/8a3ba5736f.js" crossorigin="anonymous"></script>
		<base target="_self">
	</head>
	<body>
		<div class='heading'>
		<h1>Feedback
			<div class='logout'>
				<a href='logout.php'>Logout</a>
			</div></h1>
		</div>
		<div class="topnav" id="myTopnav">
			<a href="passupdat.php" class="active">Update Password</a>
			<a href="student.php" >Profile</a>
			<a href="proupdat.php">Update Profile</a>
			<a href="givefeedback.php" >Give Feedback</a>
			<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i class="fa fa-bars"></i>
			</a>
		</div>
		<div class="sidenav">
			<a href="student.php" >Profile</a>
			<a href="proupdat.php">Update Profile</a>
			<a href="passupdat.php" class="active">Update Password</a>
			<a href="givefeedback.php">Give Feedback</a>
		</div>
		<div class="container">
			
			<form class="form-grp"  action="passupdat.php" method="post">
			<div class="form-content">
				<label>New Password:</label>
				<input type="password" name="npwd"  id="myInput1" required/>
			</div>
			<div class="form-content">
				<label>Confirm Password:</label>
				<input type="password" name="cpwd"  id="myInput2" required/><br>
			</div>
				<input type="checkbox"  name="chpwd" onclick="myFunction2()" /><b>Show Password</b><br>
				<button class="submit-btn" name="submit-btn">Submit</button>
			</form>
		</div>	
		<footer>
			<p><i class="far fa-copyright"></i> All Rights Are Reserved.</p>
			<div class="social_icons">
			<label>Follow Us:</label>
			<a href="https://twitter.com/abhishek_040405" class="twitter"><i class="fab fa-twitter"></i></a>
			<a href="https://www.instagram.com/abhishekbommena/" class="insta"><i class="fab fa-instagram"></i></a>
			</div>
		</footer>		
		<script>
			function myFunction() {
				var x = document.getElementById("myTopnav");
				if (x.className === "topnav") {
				x.className += " responsive";
				} else {
					x.className = "topnav";
				}
			}
			
			function myFunction2() {
				var x = document.getElementById("myInput1");
				var y = document.getElementById("myInput2");
				if (x.type === "password" && y.type==="password") {
					x.type = "text";
					y.type = "text";
				} else {
					x.type = "password";
					y.type = "password";
				}
			}
		</script>
	</body>
</html>
<?php
if(isset($_POST["submit-btn"])){
include "connection.php";
$a=$_SESSION["mail"];
$b=$_POST["npwd"];
$c=$_POST["cpwd"];
if($b==$c){
	$hash_default_salt = password_hash($c, PASSWORD_DEFAULT); 
	$stmt =$conn->prepare("update students SET password=? where email=?");
	$stmt->bind_param("ss",$hash_default_salt,$a);
	$result=$stmt->execute();
	if($result===false){
		trigger_error($stmt->error, E_USER_WARNING);  
	} 
	else{
 echo '<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://kit.fontawesome.com/8a3ba5736f.js" crossorigin="anonymous"></script>
		<base target="_self">
		</head>
<style>/* The alert message box */
	.alert {
		position:absolute;
		padding: 20px ;
		background:  #4cadaf; /* Red */
		color: white;
		width:30%;
		margin-left:33%;
		margin-top:0px;
		margin-bottom:-60px;
		text-align:center;
		animation-name: example;
		animation-duration: 5s;  
		animation-fill-mode: forwards;
	}
	@keyframes example {
		from {top: 0px;}
		to {top: 100px; }
	}
@media screen and  (max-width:900px){
	.alert{
		width:60%;	
		padding: 20px 0 20px 0; 
		margin-left:20%;
	}
	@keyframes example {
		from {top: 0px;}
		to {top: 150px; }
	}
}
@media screen and  (max-width:600px){
		.alert{	
			padding: 10px 0 10px 0; 
		}
		@keyframes example {
			from {top: 0px;}
			to {top: 150px;}
		}
	}
</style><div class="alert" id="txt" >
	<strong>Password Updated.</strong>
</div>

<script>
var x=document.getElementById("txt");
setTimeout(function(){ x.style.display="none" },10000);
</script>
</html>';  
	}
}
else{
echo '<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://kit.fontawesome.com/8a3ba5736f.js" crossorigin="anonymous"></script>
		<base target="_self">
		</head>
<style>/* The alert message box */
.alert {
		position:absolute;
		padding: 20px ;
		background: #4cadaf ; /* orangeyellow #ff9800 */
		color: white;
		width:30%;
		margin-left:33%;
		margin-top:0px;
		margin-bottom:-60px;
		text-align:center;
		animation-name: example;
		animation-duration: 5s;  
		animation-fill-mode: forwards;
	}
	@keyframes example {
		from {top: 0px;}
		to {top: 100px; }
	}
@media screen and  (max-width:900px){
	.alert{
		width:60%;	
		padding: 20px 0 20px 0; 
		margin-left:20%;
	}
	@keyframes example {
		from {top: 0px;}
		to {top: 150px; }
	}
}
@media screen and  (max-width:600px){
		.alert{	
			padding: 10px 0 10px 0; 
		}
		@keyframes example {
			from {top: 0px;}
			to {top: 150px;}
		}
	}
.fas{
font-size:25px;
padding-right:5px;

}

</style><div class="alert" id="txt" >
	<i class="fas fa-exclamation-triangle"></i> <strong>Passwords Not Matching.</strong>
</div>

<script>
var x=document.getElementById("txt");
setTimeout(function(){ x.style.display="none" },10000);
</script>
</html>';
}
}	
?>