<?php
session_start();
if(!isset($_SESSION["mail"])){
	header("location:index.html");
}
?>

<html>
	<head>
		<title>Profile - Feedback</title>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<link rel='stylesheet' type='text/css' href='student.css'>
		<script src='https://kit.fontawesome.com/8a3ba5736f.js' crossorigin='anonymous'></script>
		<base target='_self'>
	</head>
	<body>
	<div class='heading'>
		<h1>Feedback
		<div class='logout'>
			<a href='logout.php'>Logout</a>
		</div></h1>
	</div>
	<div class="topnav" id="myTopnav">
		<a href="student.php" class="active">Profile</a>
		<a href="proupdat.php">Update Profile</a>
		<a href="passupdat.php">Update Password</a>
		<a href="givefeedback.php" >Give Feedback</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
		</a>
	</div>
		<div class='sidenav'>
			<a href='student.php' class='active'>Profile</a>
			<a href='proupdat.php'>Update Profile</a>
			<a href='passupdat.php'>Update Password</a>
			<a href='givefeedback.php' >Give Feedback</a>
		</div>
		<div class='container'>
		<div class='hi'>
	<h3>Hi&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION["name"];?></h3></div>
			<table>
				<tr>
					<th>Name</th>
					<td><?php echo $_SESSION["name"]."&nbsp&nbsp".$_SESSION["lname"] ; ?></td>
				</tr>
				<tr >
					<th>Roll No.</th>
					<td><?php echo $_SESSION["rollno"]; ?></td>
				</tr>
				<tr>
					<th>Branch</th>
					<td><?php echo $_SESSION["branch"]; ?></td>
				</tr>
				<tr>
					<th>Year/Section</th>
					<td><?php echo $_SESSION["yr"]."&nbsp Year / ".$_SESSION["sectn"]; ?></td>
				</tr>
				<tr>
					<th>Mobile No.</th>
					<td><?php echo $_SESSION["pno"]; ?></td>
				</tr>
				<tr class='asdf'>
					<th>Email ID</th>
					<td ><?php echo $_SESSION["mail"]; ?></td>
				</tr>
			</table>
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
			var x = document.getElementById('myTopnav');
			if (x.className === 'topnav') {
				x.className += ' responsive';
			} else {
				x.className = 'topnav';
			}
		}
	</script>
	</body>
</html>