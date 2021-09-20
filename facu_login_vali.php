<?php
session_start();
?>
<?php
include "connection.php";
$mail=$_POST["un2"]; 
$pwd=$_POST["pwd2"];
$stmt=$conn->prepare("SELECT * from faculty where email=? ");
$stmt->bind_param("s",$mail);
$stmt->execute();
$result=$stmt->get_result();
if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
	$pwd_retved1=$row["password"];//60 characters(database)
	if(password_verify($pwd,$pwd_retved1)){
		echo "password matched";
		$_SESSION["name"]=$row["fname"];
		$_SESSION["lname"]=$row["lastname"];
		$_SESSION["rollno"]=$row["id"];
		$_SESSION["branch"]=$row["department"];
		$_SESSION["pno"]=$row["phonumber"];
		$_SESSION["mail"]=$row["email"];
		header("location:faculty.php");
	}
	else {
		include "login_alert.html";
		include "faculty_login.html";
	}
}
else{
	include "login_alert.html";
	include "faculty_login.html";
}
?>
