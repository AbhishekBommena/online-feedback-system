<?php
session_start();
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
.modal input[type=text]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  font-size:18px;
}

/* Add a background color when the inputs get focus */
.modal input[type=text]:focus {
  background-color: #ddd;
  outline: none;
}
a{
background-color:#f44336;
padding:12px 0px 12px 0px;
color:white;
opacity:0.9;
outline:none;
text-align:center;
}
button{
font-family:serif;
font-size:20px;
background-color:#4cadaf;
padding:12px 0px 12px 0px;
color:white;
opacity:0.9;
outline:none;
border:none;
}
a:hover,button:hover{
opacity:1;
}
a,button{
float:left;
width:50%;
cursor:pointer;
}

/* Add padding to container elements */
.modal .container1 {
  padding: 16px;
}

/* The Modal (background) */
.modal {
	
  position: fixed; /* Stay in place */
  /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 80px;
}

/* Modal Content/Box */
 .modal .modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 70%; /* Could be more or less, depending on screen size */
	
}

/* Style the horizontal ruler */
.modal hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 

/* Clear floats */
.modal .clearfix::after {
  content: "";
  clear: both;
  display: table;
}

@media screen and (max-width:900px){
	.modal-content{
		width:90%;
		margin-top:23%;
		}
	}
/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width:600px){
	.modal-content{
		width:93%;
		margin-top:20%;
		}
		button{
		font-size:20px;
		}
}
</style>
</head>
<body>
<div id="id01" class="modal">
  <form class="modal-content" action="facu_rsetmail.php" method="POST">
    <div class="container1">
      <h1>Forgot Password ?</h1>
      <p>Enter Your Email ID.</p>
      <hr>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>
      <div class="clearfix">
		<a class="cancelbtn" onclick="goback()">Cancel</a>
        <button type="submit" class="btn1" name="submit-btn">Submit</button>
      </div>
    </div>
  </form>
 
</div>
<script>
function goback(){

 window.history.back();

}
</script>
</body>
</html>
<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST["submit-btn"])){
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';	
	require 'connection.php';
	if(isset($_POST["email"])){
		$emailto=$_POST["email"];
		$stmt=$conn->prepare("SELECT * from faculty where email=?");
		$stmt->bind_param("s",$emailto);
		$stmt->execute();
		$result=$stmt->get_result();
		if(mysqli_num_rows($result)>0){
			$row = mysqli_fetch_array($result);
			$firstname=$row["fname"];
			$lastname=$row["lastname"];
			$_SESSION["mailid"]=$row["email"];
			$code=uniqid(true);
			$query=mysqli_query($conn,"INSERT INTO resetpassword(email,code) VALUES('$emailto','$code')");
			if(!$query){
				exit("error");
			}	
		$mail = new PHPMailer(true);
		try {
			//Server settings
			$mail->SMTPDebug = 0;                      // Enable verbose debug output
			$mail->isSMTP();                                            // Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'abhishek.bommena22@gmail.com';                     // SMTP username
			$mail->Password   = '2000';                               // SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			//Recipients
			$mail->setFrom('abhishek.bommena22@gmail.com', 'Feedback');
			$mail->addAddress("$emailto", 'Joe User');     // Add a recipient
            // Name is optional
			$mail->addReplyTo('no-reply@gmail.com', 'Information');
			// Attachments
			// Optional name
			// Content
			$url="http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/facu_rset_pwd.php?code=$code";
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'Forgot Password Link';
			$mail->Body    = "<h1 style='color:coral; font-family:serif;'>FEEDBACK</h1>
							<p >Hello"." ".$firstname." ".$lastname.","."</p>
							<p >Please click on the below link to reset your password.</p>
							<a href='$url'>change my password.</a>";
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			$mail->send();
			echo'<html>
					<head>
						<meta name="viewport" content="width=device-width, initial-scale=1.0">
						<script src="https://kit.fontawesome.com/8a3ba5736f.js" crossorigin="anonymous"></script>
						<base target="_self">
					</head>
					<style>/* The alert message box */
						.alert {
							padding: 20px ;
							background:  #F0F8FF; /* Red */
							color: 2F4F4F;
							width:30%;
							margin-left:33%;
							margin-top:50px;
							margin-bottom:-60px;
							text-align:center;
							z-index: 1;
							position:fixed;
							animation-name: example;
							animation-duration: 5s;  
							animation-fill-mode: forwards;
						}
						@keyframes example {
							from {top: 0px;}
							to {top: 40px; }
						}
						@media screen and  (max-width:900px){
							.alert{
								width:80%;	
								margin-left:20px;
							}
						}
					</style>
					<div class="alert" id="txt" >
						<strong>Check Your Inbox and Click The Given Link.</strong>
					</div>
					<script>
						var x=document.getElementById("txt");
						setTimeout(function(){ x.style.display="none" },5000);
					</script>
				</html>';
			include "facu_rsetmail.php";
		}
		catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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
				  padding: 20px ;
				  background:  #F0F8FF; /* Red */
				  color: 2F4F4F;
				  width:30%;
				  margin-left:33%;
				  margin-top:50px;
				  margin-bottom:-60px;
				  text-align:center;
				   z-index: 1;
				   position:fixed;
				   animation-name: example;
				  animation-duration: 5s;  
				  animation-fill-mode: forwards;
				}
				@keyframes example {
				  from {top: 0px;}
				  to {top: 40px; }
				}
				@media screen and  (max-width:900px){
					.alert{
						width:80%;	
						margin-left:20px;
					}
				}


				</style>
				<div class="alert" id="txt" >
				 <i class="fas fa-exclamation-triangle"></i> <strong>Invalid Mail ID.</strong>
				</div>

				<script>
				var x=document.getElementById("txt");
				setTimeout(function(){ x.style.display="none" },5000);
				</script>
				</html>';
		include "facu_rsetmail.php";
	}
}
else{
	echo"hello";
}
}
?>
