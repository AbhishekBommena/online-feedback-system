<?php
session_start();

?>
<html>
	<head>
		<title>Check Feedback - Feedback</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="checkfb.css">
		<script src="https://kit.fontawesome.com/8a3ba5736f.js" crossorigin="anonymous"></script>
		<base target="_self">
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	</head>
	<body>
		<div class="heading">
			<h1>Feedback
			<div class="logout">
				<a href="logout.php">Logout</a>
			</div></h1>
		</div>
		<div class="topnav" id="myTopnav">
			<a href="checkfb.php" class="active">Check Feedback</a>
			<a href="faculty.php" >Profile</a>
			<a href="facproup_vali.php">Update Profile</a>
			<a href="facpassup_vali.php">Update Password</a>
			<a href="javascript:void(0);" class="icon" onclick="myFunction2()">
			<i class="fa fa-bars"></i>
			</a>
		</div>
		<div class="sidenav" >
			<a href="faculty.php" >Profile</a>
			<a href="facproup_vali.php">Update Profile</a>
			<a href="facpassup_vali.php">Update Password</a>
			<a href="checkfb.php" class="active">Check Feedback</a>
		</div>
		<form method="POST"  class="myform" action="checkfb.php" >
			<span class="first-row">Select Your Classes.<input type="submit" value="Click Here" name="submit-btn" class="submit-btn" ></span><br>
				<table class="form-content1">
					<tr id="space">
					<td>
						<label class="container2"  >IA
						<input type="checkbox" value="IA" name="checkbox[]" id="mycheck-IA" onclick="myFunction(event)">
						<span class="checkmark" ></span>
						</label>
						<input type="text" name="dep[]" id="field-IA">
					</td>
					<td>
						<label class="container2">IB
						<input type="checkbox" value="IB" name="checkbox[]" id="mycheck-IB" onclick="myFunction(event)">
						<span class="checkmark"></span>
						</label>
						<input type="text" name="dep[]" id="field-IB">
					</td>
					<td>
						<label class="container2">IC
						<input type="checkbox" value="IC" name="checkbox[]" id="mycheck-IC" onclick="myFunction(event)">
						<span class="checkmark"></span>
						</label>
						<input type="text" name="dep[]" id="field-IC">
					</td>
					<td>
						<label class="container2">ID
						<input type="checkbox" value="ID" name="checkbox[]" id="mycheck-ID" onclick="myFunction(event)">
						<span class="checkmark"></span>
						</label>
						<input type="text" name="dep[]" id="field-ID">
					</td></tr>
					<tr id="space2"><td>
						<label class="container2">IIA
						<input type="checkbox" value="IIA" name="checkbox[]" id="mycheck-IIA" onclick="myFunction(event)">
						<span class="checkmark"></span>
						</label>
						<input type="text" name="dep[]" id="field-IIA">
					</td>
					<td>
						<label class="container2">IIB
						<input type="checkbox" value="IIB" name="checkbox[]" id="mycheck-IIB" onclick="myFunction(event)"> 
						<span class="checkmark"></span>
						</label>
						<input type="text" name="dep[]" id="field-IIB">
					</td>
					<td>
						<label class="container2">IIC
						<input type="checkbox" value="IIC" name="checkbox[]" id="mycheck-IIC" onclick="myFunction(event)">
						<span class="checkmark"></span>
						</label>
						<input type="text" name="dep[]" id="field-IIC">
					</td>
					<td>
						<label class="container2">IID
						<input type="checkbox" value="IID" name="checkbox[]" id="mycheck-IID" onclick="myFunction(event)">
						<span class="checkmark"></span>
						</label>
						<input type="text" name="dep[]" id="field-IID">
					</td>
					</tr>
				</table>
				<table class="form-content1">
					<tr id="space">
					<td>
						<label class="container2">IIIA
						<input type="checkbox" value="IIIA" name="checkbox[]" id="mycheck-IIIA" onclick="myFunction(event)">
						<span class="checkmark"></span>
						</label>
						<input type="text" name="dep[]" id="field-IIIA">
					</td>
					<td>
						<label class="container2">IIIB
						<input type="checkbox" value="IIIB" name="checkbox[]" id="mycheck-IIIB" onclick="myFunction(event)" >
						<span class="checkmark" ></span>
						</label>
						<input type="text" name="dep[]" id="field-IIIB">
					</td>
					<td>
						<label class="container2">IIIC
						<input type="checkbox" value="IIIC" name="checkbox[]" id="mycheck-IIIC" onclick="myFunction(event)">
						<span class="checkmark"></span>
						</label>
						<input type="text" name="dep[]" id="field-IIIC">
					</td>
					<td>
						<label class="container2">IIID
						<input type="checkbox" value="IIID" name="checkbox[]" id="mycheck-IIID" onclick="myFunction(event)">
						<span class="checkmark"></span>
						</label>
						<input type="text" name="dep[]" id="field-IIID">
					</td></tr>
					<tr id="space2" ><td>
						<label class="container2">IVA
						<input type="checkbox" value="IVA" name="checkbox[]" id="mycheck-IVA" onclick="myFunction(event)">
						<span class="checkmark"></span>
						</label>
						<input type="text" name="dep[]" id="field-IVA">
					</td>
					<td>
						<label class="container2">IVB
						<input type="checkbox" value="IVB" name="checkbox[]" id="mycheck-IVB" onclick="myFunction(event)">
						<span class="checkmark"></span>
						</label>
						<input type="text" name="dep[]" id="field-IVB">
					</td>
					<td>
						<label class="container2">IVC
						<input type="checkbox" value="IVC" name="checkbox[]" id="mycheck-IVC" onclick="myFunction(event)">
						<span class="checkmark"></span>
						</label>
						<input type="text" name="dep[]" id="field-IVC">
					</td>
					<td>
						<label class="container2">IVD
						<input type="checkbox" value="IVD" name="checkbox[]" id="mycheck-IVD" onclick="myFunction(event)">
						<span class="checkmark"></span>
						</label>
						<input type="text" name="dep[]" id="field-IVD">
					</td>
					</tr>
				</table>
		</form>
		<?php
		include  "connection.php";		
		$a=$_SESSION["name"];
		if(isset($_POST["submit-btn"]) && isset($_POST["checkbox"])){
			$_SESSION["axe"]=array_filter($_POST["dep"]);
			
			$_SESSION["checkbox-array"]=$_POST["checkbox"];
			
			$zipped=array_map(null, $_SESSION["axe"],$_SESSION["checkbox-array"]);
			$i=0;$_SESSION["stn"]=array();
			foreach($zipped as $z){
				$a_arr=explode(",",$z[0]);
				for($j=0;$j<sizeof($a_arr);$j++){
					//echo $a_arr[$j]."<br>";
					$_SESSION["stn"][]=$a_arr[$j];
					//echo sizeof($_SESSION["stn"]);
					$sql=$conn->prepare("SELECT COUNT(score) AS ct,SUM(score) AS total FROM feedback1 WHERE 
					faculty=? AND yearsection=? AND dep=? ");
					$sql->bind_param("sss",$a,$z[1],$a_arr[$j]);
					$sql->execute();
					$result=$sql->get_result();
					if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_array($result)){
							$sum_of_all[]= $row["total"];
							$count_of_student[]= $row["ct"];
							$_SESSION["cos"]=$count_of_student;
							/*while($i<sizeof($vale)){
							echo $_SESSION["vale"][$i];
							$i++;
							}*/
							while($i<sizeof($count_of_student)){
								$x=50*$_SESSION["cos"][$i];
								if($x==0){
									$x=1;
									$y[]=($sum_of_all[$i]*100)/$x;
									$_SESSION["pctn"]=$y;
									//echo $_SESSION["pctn"][$i];
									$i++;
								}
								else{
									$y[]=($sum_of_all[$i]*100)/$x;
									$_SESSION["pctn"]=$y;
									//echo $_SESSION["pctn"][$i];
									$i++;
								}
							}
							$_SESSION["soa"]=$sum_of_all;//total of all students score.
						}
					}
				}
			}
		}
		/*function a1(){
			if(sizeof($_SESSION["checkbox-array"])==1 && sizeof($_SESSION["stn"])>1){
				print_r( $_SESSION["checkbox-array"][0]."  ".$_SESSION["stn"][1]."  "."(".$_SESSION["cos"][1].")" );
			}
			if(sizeof($_SESSION["checkbox-array"])>1 && sizeof($_SESSION["stn"])>1){
				//print_r( $_SESSION["checkbox-array"][0]."  ".$_SESSION["stn"][1]."  "."(".$_SESSION["cos"][1].")" );
				print_r( $_SESSION["checkbox-array"][1]."  ".$_SESSION["stn"][1]."  "."(".$_SESSION["cos"][1].")" );
			}
			else{
				echo "none";
			}
		}
		function a2(){
			if(sizeof($_SESSION["checkbox-array"])==1 && sizeof($_SESSION["stn"])>2){
				print_r( $_SESSION["checkbox-array"][0]."  ".$_SESSION["stn"][2]."  "."(".$_SESSION["cos"][2].")" );
			}
			else{
				echo "none";
			}
		}*/
		?>
		<div class="container" >
			<canvas id="myChart" width="600" height="400"></canvas>
		</div>
		<script>
			function myFunction2() {
				var x = document.getElementById("myTopnav");
				if (x.className === "topnav") {
					x.className += " responsive";
				} else {
					x.className = "topnav";
				}
			}
			function myFunction(event){
				var checkBox = event.target;
				var field = document.getElementById('field-' + checkBox.value);
				if(checkBox.checked == true){
					field.style.display="inline";
				}
				else{
					field.style.display="none";
				}
			}
		</script>
		<script>
			var ctx = document.getElementById('myChart').getContext('2d');
			ctx.canvas.parentNode.style.height = '80vh';
			Chart.defaults.global.defaultFontFamily = 'Lato';
			Chart.defaults.global.defaultFontSize = 14;
			/*var data_array=["<?php echo $_SESSION['total'];?>", 80, 30];*/
			var myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ['<?php if(isset($_POST["submit-btn"]) && isset($_POST["checkbox"])){ echo ($_SESSION["checkbox-array"][0]."  ".$_SESSION["stn"][0]."  "."(".$_SESSION["cos"][0].")");}else echo "none";?>',
							'<?php if(isset($_POST["submit-btn"]) && isset($_POST["checkbox"]) && sizeof($_SESSION["checkbox-array"])>1){print_r( $_SESSION["checkbox-array"][1]."  ".$_SESSION["stn"][1]."  "."(".$_SESSION["cos"][1].")" );}else{echo "none";}?>',
							'<?php if(isset($_POST["submit-btn"]) && isset($_POST["checkbox"]) && sizeof($_SESSION["checkbox-array"])>2){print_r( $_SESSION["checkbox-array"][2]."  ".$_SESSION["stn"][2]."  "."(".$_SESSION["cos"][2].")" );}else{echo "none";}?>',
							'<?php if(isset($_POST["submit-btn"]) && isset($_POST["checkbox"]) && sizeof($_SESSION["checkbox-array"])>3){print_r( $_SESSION["checkbox-array"][3]."  ".$_SESSION["stn"][3]."  "."(".$_SESSION["cos"][3].")" );}else{echo "none";}?>',
							'<?php if(isset($_POST["submit-btn"]) && isset($_POST["checkbox"]) && sizeof($_SESSION["checkbox-array"])>4){print_r( $_SESSION["checkbox-array"][4]."  ".$_SESSION["stn"][4]."  "."(".$_SESSION["cos"][4].")" );}else{echo "none";}?>',
							'<?php if(isset($_POST["submit-btn"]) && isset($_POST["checkbox"]) && sizeof($_SESSION["checkbox-array"])>5){print_r( $_SESSION["checkbox-array"][5]."  ".$_SESSION["stn"][5]."  "."(".$_SESSION["cos"][5].")" );}else{echo "none";}?>'],
					datasets: [{
						label: '%',
						data:[
							<?php if(isset($_POST["submit-btn"])){print_r( $_SESSION["pctn"][0]);}else echo "0";?>,
							<?php if(isset($_POST["submit-btn"]) && sizeof($_SESSION["pctn"])>1){print_r( $_SESSION["pctn"][1]);}else{echo "0";}?>,
							<?php if(isset($_POST["submit-btn"]) && sizeof($_SESSION["pctn"])>2){print_r( $_SESSION["pctn"][2]);}else{echo "0";}?>,
							<?php if(isset($_POST["submit-btn"]) && sizeof($_SESSION["pctn"])>3){print_r( $_SESSION["pctn"][3]);}else{echo "0";}?>,
							<?php if(isset($_POST["submit-btn"]) && sizeof($_SESSION["pctn"])>4){print_r( $_SESSION["pctn"][4]);}else{echo "0";}?>,
							<?php if(isset($_POST["submit-btn"]) && sizeof($_SESSION["pctn"])>5){print_r( $_SESSION["pctn"][5]);}else{echo "0";}?>],
						backgroundColor: [
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(25, 25, 112,0.2)',
							'rgba(34,139,34,0.2)',
							'rgb(0, 0, 0,0.2)'
						],
						borderColor: [
							'rgba(255, 99, 132, 1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(25, 25, 112,1)',
							'rgba(34,139,34,1)',
							'rgb(0, 0, 0,1)'
						],
						borderWidth: 1
					}]
				},
				options: {
					maintainAspectRatio:false,
						title:{
							display:true,
							text:'Result Of The Classes You Selected.',
							fontSize:18
						},
						legend:{
							display:false,//which bar represents what
							position:'right',
							labels:{
								fontColor:'#000'
							}
						},
						scales: {
							yAxes: [{
								ticks: {
									max:100,
									min:0
									
								}
							}]
						}
				}
			});
		</script>
		<footer><p>
			<i class="far fa-copyright"></i> All Rights Are Reserved.</p>
			<div class="social_icons">
				<label>Follow Us:</label>
				<a href="https://twitter.com/abhishek_040405" class="twitter"><i class="fab fa-twitter"></i></a>
				<a href="https://www.instagram.com/abhishekbommena/" class="insta"><i class="fab fa-instagram"></i></a>
			</div>
		</footer>
	</body>
</html>
