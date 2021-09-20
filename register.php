<html>
	<head>
		<title>Register - Feedback</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="register.css">
		<script src="https://kit.fontawesome.com/8a3ba5736f.js" crossorigin="anonymous"></script>
		<base target="_self">
	</head>
	<body>
	<?php 
	$fname=$lastname=$id=$prof=$dep=$yr=$sec=$phn=$mail="";
	$Err=$Err2=$Err3=$Err4="";
	if(isset($_POST["submit-btn"])){
		include "connection.php";
		$fname=test_input($_POST["fn"]);
		$phn=test_input($_POST["pno"]);
		$lastname=test_input($_POST["ln"]);
		$id=test_input($_POST["id"]);
		$prof=$_POST["r1"];
		$dep=$_POST["dp"];
		$yr=$_POST["year"];
		$mail=test_input($_POST["email"]);
		if(isset($_POST["r2"])){
			$sec=$_POST["r2"];
		}
		if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
			$Err = "*Only letters are allowed";
		}
		else if(!preg_match("/^[a-zA-Z-' ]*$/",$lastname)){
			$Err2 = "*Only letters are allowed";
		}
		else if(!preg_match("/^[0-9]{10}+$/",$phn)){
			$Err3 = "*Only numbers(10) are allowed";
		}
		else{
			$prof=$_POST["r1"];
			if($prof=="student"){
				$sql=$conn->prepare("INSERT INTO students (fname,lastname,id,
				department,profession,year,section,phonumber,email,password) VALUES(?,?,?,?,?,?,?,?,?,?)");
				$sql->bind_param("sssssssiss",$fname,$lastname,$id,$dep,$prof,$yr,$sec,$phn,$mail,$hash_default_salt);
				
				$hash_default_salt = password_hash($_POST["pwd"],PASSWORD_DEFAULT); 
				$x=$sql->execute();
				if($x===false){
					trigger_error($sql->error, E_USER_WARNING);  
				}
				else{
					header("location:student_login.html");
				}
			}
			else{
				$sql1 = $conn->prepare("INSERT INTO  faculty (fname,lastname,id,
				department,profession,phonumber,email,password) VALUES(?,?,?,?,?,?,?,?)");
				$sql1->bind_param("sssssiss",$fname,$lastname,$id,$dep,$prof,$phn,$mail,$hashpwd);
				//$lastname=$_POST["ln"];
				//$fullname=$fname."  ".$lastname;
				//$id=$_POST["id"];
				//$dep=$_POST["dp"];
				//$prof=$_POST["r1"];
				//$phn=$_POST["pno"];
				//$mail=$_POST["email"];
				$hashpwd=password_hash($_POST["pwd"],PASSWORD_DEFAULT); 
				$y=$sql1->execute();
				if($y===false){
					trigger_error($sql1->error, E_USER_WARNING);  
				}
				else{
					header("location:faculty_login.html"); 
				}
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
	<h1>Registration Form</h1>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="form-grp">
			<div class="form-content">
				<label>First Name</label>
				<input type="text" name="fn"  value="<?php echo $fname;?>" required><br>
				<span class="error"><?php echo $Err;?></span>
				<label>Last Name</label>
				<input type="text" name="ln" value="<?php echo $lastname;?>"required><br>
				<span class="error"><?php echo $Err2;?></span>
				<label>ID</label>
				<input type="text" name="id" value="<?php echo $id;?>" required><br>
			</div>
			<div class="branch">
				<label>Department</label>
				<select name="dp" required>
					<option value="department" name="dp" >select department</option> 
					<option value="CSE" <?php if (isset($dep) && $dep=="CSE") echo "selected";?> name="dp">CSE</option>  
					<option value="ECE" <?php if (isset($dep) && $dep=="ECE") echo "selected";?> name="dp">ECE</option>  
					<option value="EEE" <?php if (isset($dep) && $dep=="EEE") echo "selected";?> name="dp">EEE</option>  
					<option value="ME" <?php if (isset($dep) && $dep=="ME") echo "selected";?>  name="dp">ME</option>  
					<option value="CE" <?php if (isset($dep) && $dep=="CE") echo "selected";?> name="dp">CE</option>  
					<option value="IT" <?php if (isset($dep) && $dep=="IT") echo "selected";?> name="dp">IT</option>  
				</select>
				<span class="radbtn2">
				<label>Profession:</label>
				<input type="radio" name="r1" <?php if (isset($prof) && $prof=="student") echo "checked";?>
				value="student" onclick="fun()" id="student_radio1" required>Student
				<input type="radio" name="r1" <?php if (isset($prof) && $prof=="faculty") echo "checked";?>
				value="faculty" onclick="fun2()" id="facu_radio1" required>Faculty<br>
				</span>
			</div>
			
			<div id="sectnyear_select" >
				<label>Year</label>
				<select name="year" required >  
					<option value="year" name="year">select year</option>
					<option value="I" <?php if (isset($yr) && $yr=="I") echo "selected";?> name="year">I/IV</option>  
					<option value="II" <?php if (isset($yr) && $yr=="II") echo "selected";?> name="year">II/IV</option>  
					<option value="III" <?php if (isset($yr) && $yr=="III") echo "selected";?> name="year">III/IV</option>  
					<option value="IV" <?php if (isset($yr) && $yr=="IV") echo "selected";?> name="year">IV/IV</option>  
				</select><span class="section-button1">  
				<label>Section:</label>
					<input type="radio" name="r2" <?php if (isset($sec) && $sec=="A") echo "checked";?> value="A" >A
					<input type="radio" name="r2" <?php if (isset($sec) && $sec=="B") echo "checked";?> value="B" >B
					<input type="radio" name="r2" <?php if (isset($sec) && $sec=="C") echo "checked";?> value="C" >C
					<input type="radio" name="r2" <?php if (isset($sec) && $sec=="D") echo "checked";?> value="D" >D</span>
			</div>
			<div class="form-content">
				<label>Phone No.</label>
				<input type="text" name="pno" value="<?php echo $phn;?>" required/><br>
				<span class="error"><?php echo $Err3;?></span>
				<label>Email ID</label>
				<input type="email" name="email" value="<?php echo $mail;?>" required><br>
				<label>Password</label>
				<input type="password" name="pwd" id="inp1" required>
				<a href="javascript:void(0);"  onclick="myFunction()"><i class="fas fa-eye" id="icon2"></i></a>
				<a href="javascript:void(0);"  onclick="myFunction()"><i class="fas fa-eye-slash" id="icon3"></i></a><br>
			</div>
			<input type="submit" class="submit-button" name="submit-btn" value="Submit">
		</form>
		<script>
			function fun(){
				if(document.getElementById("student_radio1").checked==true){
					var a=document.getElementById("sectnyear_select");
					
					
					a.style.display="block";
				}
			}
			function fun2(){
				if(document.getElementById("facu_radio1").checked==true){
					var a=document.getElementById("sectnyear_select");
					a.style.display="none";
				}
			}
			function fun3(){
				if(document.getElementById("student_radio2").checked==true){
					var a=document.getElementById("sectnyear_select");
					
					
					a.style.display="block";
				}
			}
			
			function fun4(){
				if(document.getElementById("facu_radio2").checked==true){
					var a=document.getElementById("sectnyear_select");
					a.style.display="none";
				}
			}
			function myFunction(){
				var z=document.getElementById("icon2");
				var y=document.getElementById("icon3");
				var x=document.getElementById("inp1");
				if(x.type==="password"){
					x.type="text";
					y.style.display="none";
					z.style.display="inline";
				}
				else{
					x.type="password";
					y.style.display="inline";
					z.style.display="none";
				}
			}
		</script>
	</body>
</html>
