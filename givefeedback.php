<?php
session_start();
if(!isset($_SESSION["mail"])){
	header("location:index.html");
}
?>
<html>
	<head>
		<title>Give Feedback - Feedback</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="givefeedback.css">
		<script src="https://kit.fontawesome.com/8a3ba5736f.js" crossorigin="anonymous"></script>
		<base target="_self">
	</head>
	<body>
		<div class="heading">
			<h1>Feedback
			<div class="logout">
				<a href="logout.php">Logout</a>
			</div></h1>
		</div>
		<div class="topnav" id="myTopnav">
			<a href="givefeedback.php" class="active">Give Feedback</a>
			<a href="student.php" >Profile</a>
			<a href="proupdat.php">Update Profile</a>
			<a href="passupdat.php" >Update Password</a>
			<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i class="fa fa-bars"></i>
			</a>
		</div>
		<div class="sidenav">
			<a href="student.php" >Profile</a>
			<a href="proupdat.php">Update Profile</a>
			<a href="passupdat.php">Update Password</a>
			<a href="givefeedback.html" class="active">Give Feedback</a>
		</div>
		<div class="container">
			<div class="header2"><form method="POST" action="givefeedback.php">
			<button type="search" name="searchbtn" class="search_btn"><i class="fas fa-search"></i></button>
			<input type="text" placeholder="Search Faculty..." name="searchbox" required>
			</form>
			<?php		
				if(isset($_POST["searchbtn"])){
					$a=$_POST["searchbox"];
					include "connection.php";//CONCAT(fname,' ',lastname) LIKE
					$sql="select * from faculty where CONCAT(fname,' ',lastname) LIKE '%$a%' ";
					$ret=mysqli_query($conn,$sql);  
					if(mysqli_num_rows($ret)>0){
						$row=mysqli_fetch_array($ret);
						$_SESSION["facultyname"]=$row["fname"];
						echo "<div class='fac_nam'>";
						echo $row['fname']." ".$row["lastname"]  ;
						echo "</div>";
					}
					else{
						echo "<div class='fac_nam'>";
						echo "No Faculty Found.</div>";
					}
				}
				if(isset($_POST["submit-btn"])){
					if(isset($_SESSION["facultyname"])){
						include "connection.php";
						$sql =$conn->prepare("INSERT INTO feedback1(student,yearsection,dep,faculty,score)
						VALUES(?,?,?,?,?)"); 
						$sql->bind_param("ssssi",$smail,$syearsectn,$branch,$facname,$x);
						$smail= $_SESSION["mail"];
						$syearsectn= $_SESSION["yr"].$_SESSION["sectn"];
						$branch=$_SESSION["branch"];
						$facname=$_SESSION["facultyname"];
						$x=$_POST["rd1"]+$_POST["rd2"]+$_POST["rd3"]+$_POST["rd4"]+$_POST["rd5"];
						$f=$sql->execute();
						if($f===false){
							trigger_error($sql->error, E_USER_WARNING);  
						}
						else{
							echo "<div class='fac_nam'>";
							echo "Feedback Submitted.</div>";
							unset($_SESSION["facultyname"]);
						}
					}
					else{
						echo "<div class='fac_nam'>";
						echo "Not Searched For Faculty</div>";
					}
				}
			?>
					
			</div>
			<div class="container2">
			<form method="POST" action="givefeedback.php">
			<table>
			<tr class="row1">
			<th>....</th>
			<th>1</th>
			<th>2</th>
			<th>3</th>
			<th>4</th>
			<th>5</th>
			<th>6</th>
			<th>7</th>
			<th>8</th>
			<th>9</th>
			<th>10</th>
			</tr>
			<tr >
			<th class="col1" >Communication Skills</th>
			<td><input type="radio" name="rd1" value="1" required></td>
			<td><input type="radio" name="rd1" value="2" ></td>
			<td><input type="radio" name="rd1" value="3" ></td>
			<td><input type="radio" name="rd1" value="4" ></td>
			<td><input type="radio" name="rd1" value="5" ></td>
			<td><input type="radio" name="rd1" value="6" ></td>
			<td><input type="radio" name="rd1" value="7" ></td>
			<td><input type="radio" name="rd1" value="8" ></td>
			<td><input type="radio" name="rd1" value="9" ></td>
			<td><input type="radio" name="rd1" value="10" ></td>
			</tr>
			<tr>
			<th class="col1">Board Usage</th>
			<td><input type="radio" name="rd2" value="1" required></td>
			<td><input type="radio" name="rd2" value="2" ></td>
			<td><input type="radio" name="rd2" value="3" ></td>
			<td><input type="radio" name="rd2" value="4" ></td>
			<td><input type="radio" name="rd2" value="5" ></td>
			<td><input type="radio" name="rd2" value="6" ></td>
			<td><input type="radio" name="rd2" value="7" ></td>
			<td><input type="radio" name="rd2" value="8" ></td>
			<td><input type="radio" name="rd2" value="9" ></td>
			<td><input type="radio" name="rd2" value="10" ></td>
			</tr>
			<tr>
			<th class="col1">Doubts Clarification</th>
			<td><input type="radio" name="rd3" value="1" required></td>
			<td><input type="radio" name="rd3" value="2" ></td>
			<td><input type="radio" name="rd3" value="3" ></td>
			<td><input type="radio" name="rd3" value="4" ></td>
			<td><input type="radio" name="rd3" value="5" ></td>
			<td><input type="radio" name="rd3" value="6" ></td>
			<td><input type="radio" name="rd3" value="7" ></td>
			<td><input type="radio" name="rd3" value="8" ></td>
			<td><input type="radio" name="rd3" value="9" ></td>
			<td><input type="radio" name="rd3" value="10" ></td>
			</tr>
			<tr>
			<th class="col1">Interaction</th>
			<td><input type="radio" name="rd4" value="1" required></td>
			<td><input type="radio" name="rd4" value="2" ></td>
			<td><input type="radio" name="rd4" value="3" ></td>
			<td><input type="radio" name="rd4" value="4" ></td>
			<td><input type="radio" name="rd4" value="5" ></td>
			<td><input type="radio" name="rd4" value="6" ></td>
			<td><input type="radio" name="rd4" value="7" ></td>
			<td><input type="radio" name="rd4" value="8" ></td>
			<td><input type="radio" name="rd4" value="9" ></td>
			<td><input type="radio" name="rd4" value="10" ></td>
			</tr>
			<tr>
			<th class="col1">Knowledge in Subject</th>
			<td><input type="radio" name="rd5" value="1" required></td>
			<td><input type="radio" name="rd5" value="2"></td>
			<td><input type="radio" name="rd5" value="3"></td>
			<td><input type="radio" name="rd5" value="4"></td>
			<td><input type="radio" name="rd5" value="5"></td>
			<td><input type="radio" name="rd5" value="6"></td>
			<td><input type="radio" name="rd5" value="7"></td>
			<td><input type="radio" name="rd5" value="8"></td>
			<td><input type="radio" name="rd5" value="9"></td>
			<td><input type="radio" name="rd5" value="10"></td>
			</tr>
			</table>
			<input type="submit" name="submit-btn" class="btn2" value="Submit" >
			</form>
			
			</div>
		</div>
		<footer><p>
			<i class="far fa-copyright"></i> All Rights Are Reserved.</p>
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



<!--$stmt = $dbConnection->prepare('SELECT * FROM employees WHERE name = ?');
$stmt->bind_param('s', $name); // 's' specifies the variable type => 'string'

$stmt->execute();

$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    // Do something with $row
}-->