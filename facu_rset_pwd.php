<?php
session_start();
?>
<?php
if(isset($_POST["subtn"])){
	$z= $_POST["npwd"];
	$y= $_POST["cpwd"];
	if($y==$z){
		include "connection.php";
		$x= $_SESSION["mailid"];
		$y=password_hash( $_POST["cpwd"],PASSWORD_DEFAULT);
		$sql=$conn->prepare("UPDATE faculty SET password=? WHERE email=? ");
		
		$sql->bind_param("ss",$y,$x);
		
		$f=$sql->execute();
		if($f===false){
			trigger_error($sql->error, E_USER_WARNING);  
		}
		echo'<html>
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
								to {top: 140px; }
							}
							@media screen and  (max-width:900px){
								.alert{
									width:60%;	
									padding: 20px 0 20px 0; 
									margin-left:20%;
								}
								@keyframes example {
									from {top: 0px;}
									to {top: 140px; }
								}
							}
							@media screen and  (max-width:600px){
								.alert{	
									padding: 10px 0 10px 0; 
								}
								@keyframes example {
									from {top: 0px;}
									to {top: 140px; }
								}
							}
							@media screen and  (max-width:410px){
								.alert{
									font-size:16px;
								}
								@keyframes example {
									from {top: 0px;}
									to {top: 120px; }
								}
							}
					</style>
					<div class="alert" id="txt" >
						<strong>Login With New Details.</strong>
					</div>
					<script>
						var x=document.getElementById("txt");
						setTimeout(function(){ x.style.display="none" },8000);
					</script>
				</html>';
				include"index.html";
exit();
}
else{
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
				 <i class="fas fa-exclamation-triangle"></i> <strong>Passwords Not Matching.</strong>
				</div>

				<script>
				var x=document.getElementById("txt");
				setTimeout(function(){ x.style.display="none" },5000);
				</script>
				</html>';
			
}
}

?>
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		body{
			background-color:#39CCCC;
		}
		h1{padding:16px;}
		hr{margin:-15px 15px 0 15px;}
		.container{
			height:430px;
			width:70%;
			background-color:#ddd;
			margin:8% 15% 0 15%;
		}
		.form-content{
			margin:20px 30px 0 30px;
		}
		label{
			margin-bottom:5px;
			display:block;
			font-weight:bold;
		}
		.form-content input{
			margin:0 0 20px 0;
			border:none;
			outline:none;
			width:100%;
			height:40px;
			padding:15px;
			font-size:18px;
		}
		input:focus{
			background-color:#F0FFF0;
		}
		.form-content input[type=checkbox]{	
			width:20px;
			height:20px;
		}
		a{
			background-color:#f44336;
			padding:11px 0px 11px 0px;
			color:white;
			opacity:0.9;
			outline:none;
			text-align:center;
			margin-top:20px;
			font-size:23px;
		}
		.btn {
			margin-top:20px;
			background-color: #4CAF50;
			color: white;
			border: none;
			cursor: pointer;
			outline:none;
			opacity: 0.9;
			font-family: serif;
			font-size:23px;
			padding:11px 0px 11px 0px;;
		}
		a:hover,.btn:hover{
			opacity:1;
		}

		a,button{
		float:left;
		width:50%;
		cursor:pointer;
		}
		::placeholder{
		font-size:14px;
		}
		@media screen and (max-width:600px){
		.container{
		margin-left:0px;
		width:100%;
		}
		}
		@media screen and (max-width:900px){
		.container{
		margin-top:25%;
		margin-left:0px;
		width:100%;
		}
		}
	</style>
	</head>
	<body>
		<div class="container">
			<form action="facu_rset_pwd.php" method="POST">
				<h1>Reset Password</h1><hr>
				<div class="form-content">
				<label>New Password</label>
				<input type="password" placeholder="New Password" name="npwd" id="inp1" required><br>
				<label>Confirm Password</label>
				<input type="password" placeholder="Confirm Password" name="cpwd" id="inp2" required><br>
				<input type="checkbox"  name="chpwd" onclick="myFunction()" /> <b> Show Password</b><br>
				<a class="cancelbtn" onclick="goback()">Cancel</a>
				<button class="btn" name="subtn">Submit</button><br>
				</div>
			</form>
		</div>
		<script>
			function goback(){
			window.history.back();
			}
			function myFunction() {
				var x = document.getElementById("inp1");
				var y = document.getElementById("inp2");
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
