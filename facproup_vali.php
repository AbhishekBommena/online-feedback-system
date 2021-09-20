<?php
session_start();
if(!isset($_SESSION["mail"])){
	header("location:index.html");
}
?>
<html>
	<head>
		<title>Update Profile - Feedback</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="fupro.css">
		<script src="https://kit.fontawesome.com/8a3ba5736f.js" crossorigin="anonymous"></script>
		<base target="_self">
	</head>
	<body>
		<?php
			$fname=$lname=$phonumber=$department="";
			$Err=$Err2=$Err3="";
			if(isset($_POST["save-btn"])){
				include "connection.php";
				$fname=test_input($_POST["fname"]);
				$lname=test_input($_POST["lname"]);
				$phonumber=test_input($_POST["phno"]);
				if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
					$Err = "*Only letters are allowed";
				}
				else if(!preg_match("/^[a-zA-Z-' ]*$/",$lname)){
					$Err2 = "*Only letters are allowed";
				}
				else if(!preg_match("/^[0-9]{10}+$/",$phonumber)){
					$Err3 = "*Only numbers(10) are allowed";
				}
				else{
					$sql =$conn->prepare("update faculty set fname=?  ,lastname=? ,
					department=? , phonumber=?, email=? where email=?"); 
					$mail=$_SESSION["mail"];
					$sql->bind_param("sssiss",$fname,$lname,$department,$phonumber,$email,$mail);
					$department=strtoupper($_POST["branch"]);
					$email=$_POST["mailid"];
					$f=$sql->execute();
					if($f===false){
						trigger_error($sql->error, E_USER_WARNING);  
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
								to {top: 60px; }
							}
							@media screen and  (max-width:900px){
								.alert{
									width:60%;	
									padding: 20px 0 20px 0; 
									margin-left:20%;
								}
								@keyframes example {
									from {top: 0px;}
									to {top: 110px; }
								}
							}
							@media screen and  (max-width:600px){
								.alert{	
									padding: 10px 0 10px 0; 
								}
								@keyframes example {
									from {top: 0px;}
									to {top: 130px; }
								}
							}
							.fas{
								font-size:25px;
								padding-right:5px;
							}
							</style>
							<div class="alert" id="txt" >
								<strong> Details  Updated. </strong>
							</div>
							<script>
								var x=document.getElementById("txt");
								setTimeout(function(){ x.style.display="none" },10000);
							</script>
						</html>';
					}
				}
			}
			function test_input($data){
				$data=trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
		?>
		<div class="heading">
			<h1>Feedback
				<div class="logout">
				<a href="logout.php">Logout</a>
			</div></h1>
		</div>
		<div class="topnav" id="myTopnav">
			<a href="facproup_vali.php" class="active">Update Profile</a>
			<a href="faculty.php" >Profile</a>
			<a href="facpassup_vali.php">Update Password</a>
			<a href="checkfb.php">Check Feedback</a>
			<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i class="fa fa-bars"></i>
			</a>
		</div>
		<div class="sidenav">
			<a href="faculty.php" >Profile</a>
			<a href="facproup_vali.php" class="active">Update Profile</a>
			<a href="facpassup_vali.php">Update Password</a>
			<a href="checkfb.php">Check Feedback</a>
		</div>
		<div  class="container">
			<form action="facproup_vali.php" method="POST" class="myform">
				<div class="form-group">
					<label >First Name</label>
					<input type="text" name="fname" value="<?php echo $fname;?>" required>
					<span class="error"><?php echo $Err;?></span>
				</div>
				<div class="form-group">
					<label >Last Name</label>
					<input type="text" name="lname" value="<?php echo $lname;?>" required>
					<span class="error"><?php echo $Err2;?></span>
				</div>
				<div class="form-group">
					<label>Department</label>
					<input type="text" name="branch" placeholder="Eg : CSE" id="branch" required>
				</div>
				<div class="form-group">
					<label>Mobile No.</label>
					<input type="text" name="phno" value="<?php echo $phonumber;?>" required>
					<span class="error"><?php echo $Err3;?></span>
				</div>
				<div class="form-group">
					<label>Email Id.</label>
					<input type="email" name="mailid" required>
				</div>
				<button type="submit" class="btn" name="save-btn">Save</button>
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
		</script>
	</body>
</html>