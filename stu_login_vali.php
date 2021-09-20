<?php
session_start();
?>
<?php
	include "connection.php";
	$mail=$_POST["un1"];
	$pwd=$_POST["pwd1"]; 
	$stmt=$conn->prepare("SELECT * from students where email=?");
	$stmt->bind_param("s",$mail);
	$stmt->execute();
	$result=$stmt->get_result();
	if(mysqli_num_rows($result)>0){
		$row = mysqli_fetch_array($result);
		$pwd_retved=$row["password"];
		if(password_verify($pwd,$pwd_retved)){
			$_SESSION["name"]=$row["fname"];
			$_SESSION["lname"]=$row["lastname"];
			$_SESSION["rollno"]=$row["id"];
			$_SESSION["branch"]=$row["department"];
			$_SESSION["yr"]=$row["year"];
			$_SESSION["sectn"]=$row["section"];
			$_SESSION["pno"]=$row["phonumber"];
			$_SESSION["mail"]=$row["email"];
			header("location:student.php");
		}
		else {
			include "login_alert.html";
			include "student_login.html";
		}
	}
	else{
		include "login_alert.html";
		include "student_login.html";
	}
?>
